<?php

// src/Controller/ResourceTypesController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

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
		$this->set('resourceTypes', $this->paginate());
	}

    /**
     * Se encarga de agregar un nuevo recurso.
     */
    public function add()
    {
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
        if($this->Auth->user())
        {
            $this->request->allowMethod(['post', 'delete']);

            $resource_type = $this->ResourceTypes->get($id);
            
            try
            {
                if ($this->ResourceTypes->delete($resource_type))
                {
                    $this->Flash->success('Se ha eliminado el tipo de recurso', ['key' => 'deleteResourceTypeSuccess']);
                    return $this->redirect(['action' => 'index']);
                }
            }
            catch(Exception $ex)
            {
                $this->Flash->error('No se ha podido eliminar el tipo de recurso', ['key' => 'deleteResourceTypeError']);
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