<?php

// src/Controller/ResourceTypesController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;

class ResourceTypesController extends AppController
{   
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }
    
    /** 
     * Verifica algunos permisos de usuario y establece variables importantes de usuario.
     * @param Event $event
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        
        // Establece el id y el username del usuario actualmente en sesión
        $this->set('user_id', $this->Auth->User('id'));
        $this->set('user_role', $this->Auth->User('role_id'));
        
        // Cualquier tipo de usuario puede acceder al método 'view' de recursos
        //$this->Auth->allow(['view']);
    }
    
    /** 
     * Paginador de recursos.
     */
    public $paginate = array('limit' => 10,
                             'order' => array('ResourceType.description' => 'asc')
                            );

    public function index()
	{    
        // $this->set('resourceTypes', $this->paginate());
        
        // Carga los tipos de recurso que están relacionados con el administrador actual
        $this->loadModel('Resources');
        $this->loadModel('Users');
        $u_id = $this->Auth->User('id');
        
        $innerQuery = $this->Resources->find()
                                      ->select(['Resources.id']);
        
        $innerQuery->innerJoinWith('Users', function ($q) use ($u_id){
                                                    return $q->where(['Users.id' => $u_id]);
                                                });
        
        $query2 = $this->ResourceTypes->find()
                                      ->select(['id', 'description', 'days_before_reservation']);
        
        $query2->innerJoinWith('Resources')
                                ->where(function ($q) use ($innerQuery){
                                        return $q->In('Resources.id', $innerQuery);
                                        });
        $query2->group('ResourceTypes.id', 'ResourceTypes.description', 'ResourceTypes.days_before_reservation');
        $query2->order(['ResourceTypes.description' => 'ASC']);
        
        $this->set('resourceTypes', $this->paginate($query2));
	}

    /**
     * Se encarga de agregar un nuevo recurso.
     */
    public function add()
    {
        // Si el usuario tiene permisos
        if($this->Auth->user())
        {
            $resourceType = $this->ResourceTypes->newEntity();
            
            if ($this->request->is('post'))
            {
                $resourceType = $this->ResourceTypes->patchEntity($resourceType, $this->request->data);
                
                try
                {
                    if ($this->ResourceTypes->save($resourceType))
                    {
                        $this->Flash->success('Se ha agregado el nuevo tipo de recurso', ['key' => 'addResourceTypeSuccess']);
                        return $this->redirect(['controller' => 'ResourceTypes','action' => 'index']);
                    }
                }
                catch(Exception $ex)
                {
                    $this->Flash->error('No se ha podido agregar el tipo de recurso', ['key' => 'addResourceTypeError']);
                }
            }
            $this->set('resourceType', $resourceType);
        }
        else
        {
            return $this->redirect(['controller'=>'pages','action'=>'home']);
        }
    }  
    
    /**
     * Se encarga de actualizar un recurso.
     * @param  integer $id
     */
    public function edit($id = null)
    {
        // Si el usuario tiene permisos
        if($this->Auth->user())
        {
            //Carga el tipo especifico de recurso que se desea modificar
            $resource_type = $this->ResourceTypes->get($id);

            if ($this->request->is(['post', 'put']))
            {
                //Carga la informacion que se obtiene en el formulario
                $this->ResourceTypes->patchEntity($resource_type, $this->request->data);
                
                try
                {
                    if ($this->ResourceTypes->save($resource_type))
                    {
                        //Si la información fue guardada correctamente entonces despliega un mensaje de confirmación
                        $this->Flash->success('Se ha actualizado el tipo de recurso', ['key' => 'updateResourceTypeSuccess']);
                        return $this->redirect(['action' => 'index']);
                    }
                }
                catch(Exception $ex)
                {
                    //Si no se ha podido actualizar correctamente el tipo del recurso despliega un mensaje indicando que hubo error
                    $this->Flash->error('No se ha podido actualizar el tipo de recurso', ['key' => 'updateResourceTypeError']);
                }
            }

            $this->set('resource_type', $resource_type);
        }
        else
        {
            return $this->redirect(['controller'=>'pages','action'=>'home']);
        }
    }
    
    /**
     * Se encarga de borrar un recurso.
     * @param  integer $id
     */
    public function delete($id)
    {
        // Saca los tipos de recurso que están relacionados con el administrador actual
        $this->loadModel('Resources');
        $this->loadModel('Users');
        $u_id = $this->Auth->User('id');
        
        $query = $this->Resources->find()
                                      ->select(['Resources.id'])
                                      ->where(['Resources.resource_type_id' => $id]);
        $query->innerJoinWith('Users')
                        ->where(['Users.id' => $u_id]);
        
        // Para saber si se eliminó el tipo de recurso
        $tipoEliminado = false;
        
        // Cantidad total de recursos a eliminar
        $cantTotal = $query->count();
        $cantActual = 0;
        
        // Si el usuario tiene permisos
        if($this->Auth->user())
        {
            $this->request->allowMethod(['post', 'delete']);
            
            try
            {
                // Elimina cada recurso que me pertenece, y por cascade se elimina la relación de resources_users
                foreach ($query as $element):
                {
                    $recurso = $this->Resources->get($element['id']);
                    if($this->Resources->delete($recurso))
                    {
                        $cantActual++;
                    }
                }
                endforeach;
                unset($element);
                
                /* 
                 * Si al eliminar mis recursos no quedan recursos de este tipo,
                 * el tipo de recurso también se elimina
                 */
                
                // Saca los recursos de este tipo
                $query2 = $this->Resources->find()->select(['Resources.id'])
                                                  ->where(['Resources.resource_type_id' => $id]);
                
                // Carga este tipo de recurso específico
                $r_type = $this->ResourceTypes->get($id);

                // Si no quedan recursos de este tipo
                if( 0 == $query2->count())
                {
                    // Elimina el tipo de recurso
                    if($this->ResourceTypes->delete($r_type))
                    {
                        $tipoEliminado = true;
                    }
                }
                
                // Si se eliminaron solo los recursos
                if($tipoEliminado == false)
                {
                    if( $cantActual == $cantTotal)
                    {
                        $this->Flash->success('Se han eliminado todos sus recursos de tipo '.$r_type->description,
                                              ['key' => 'deleteResourceRelationSuccess']);
                    }
                }
                // Si se eliminó el tipo de recurso
                else
                {
                    $this->Flash->success('Se ha eliminado el tipo de recurso '.$r_type->description.' junto con todos sus recursos de este tipo',
                                          ['key' => 'deleteResourceTypeSuccess']);
                }
                
                return $this->redirect(['action' => 'index']);
            }
            catch(Exception $ex)
            {
                $this->Flash->error('No se ha podido eliminar el tipo de recurso',
                                    ['key' => 'deleteResourceTypeError']);
            }
        }
        else
        {
            return $this->redirect(['controller'=>'pages','action'=>'home']);
        }
    }
    
    /*
     * Verifica si un usuario tiene autorización para poder agregar, actualizar, borrar o ver un recurso
     * @param $user
     */
    public function isAuthorized($user)
    {
        return parent::isAuthorized($user);
    }
}

?>