<?php

// src/Controller/UsersController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;

class ResourcesController extends AppController
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
        $this->Auth->allow(['view']);
    }
    
    /** 
     * Paginador de recursos.
     */
    public $paginate = array('limit' => 10,
                             'order' => array('Resource.resource_name' => 'asc')
                            );
    
    /** 
     * Carga todos los recursos de la base de datos y los pagina en una tabla.
     */
    public function index()
	{        
        // Carga el modelo de 'ResourceTypes' para sacar la descripción del tipo de recurso
        $this->loadModel('ResourceTypes');                             
        $this->set('resource_types', $this->ResourceTypes->find('all'));
        
        // Carga el modelo de 'ResourcesUsers' para mostrar sólo les recursos que puedo administrar
        // $this->loadModel('ResourcesUsers');                             
        // $this->set('relations', $this->ResourcesUsers->find('all'));
        
        // Pagina la tabla de recursos
        $this->set('resources', $this->paginate());
	}

    /**
     * Muestra información más detallada sobre un recurso específico.
     * @param  integer $id
     */
    public function view($id)
    {
        // Saca el recurso específico
        $resource = $this->Resources->get($id);
        $this->set(compact('resource'));
        
        // Saca la descripción del tipo de ese recurso específico
        $connection = ConnectionManager::get('default');
        $result = $connection
                    ->execute('SELECT description FROM resource_types WHERE id = :id', ['id' => $resource->resource_type])
                    ->fetchAll('assoc');
        $this->set('r_type', $result);
    }

    /**
     * Agrega un nuevo recurso a la base de datos.
     * Asocia al administrador actualmente en sesión como encargado default de ese nuevo recurso.
     */
    public function add()
    {
        // Carga todos los tipos de recursos para el DropDown
        $this->loadModel('ResourceTypes');
        $options = $this->ResourceTypes->find('list',['keyField' => 'id','valueField' => 'description'])->toArray();                              
        $this->set('resource_types_options', $options);
        
        // Si el usuario tiene permisos
        if($this->Auth->user())
        {
            // Nueva entidad 'Resource'
            $resource = $this->Resources->newEntity();
            
            if ($this->request->is('post'))
            {
                // Guarda en la entidad toda la información ingresada en el formulario
                $resource = $this->Resources->patchEntity($resource, $this->request->data);
                
                // Guarda en la entidad el id del tipo de recurso
                $tipoderecurso = $this->request->data['Resources']['resource_type'];
                $resource->resource_type = $tipoderecurso;
                
                try
                {
                    // Si pudo guardar en la tabla 'Resources'
                    if ($this->Resources->save($resource))
                    {
                        // Nueva entidad 'ResourceUser'
                        $this->loadModel('ResourcesUsers');
                        $resourcesUser = $this->ResourcesUsers->newEntity();
                        
                        // Guarda en la entidad los ids del recurso y del usuario actual
                        $resourcesUser->resource_id = $resource->id;
                        $resourcesUser->user_id = $this->Auth->User('id');
                        
                        // Si pudo guardar en la tabla 'ResourcesUsers'
                        if ($this->ResourcesUsers->save($resourcesUser))
                        {
                            $this->Flash->success('Se ha agregado el nuevo recurso', ['key' => 'addResourceSuccess']);
                            return $this->redirect(['controller' => 'Resources','action' => 'index']);
                        }
                    }
                }
                catch(Exception $ex)
                {
                    $this->Flash->error('No se ha podido agregar el recurso', ['key' => 'addResourceError']);
                }
            }
            $this->set('resource', $resource);            
        }
        else
        {
            return $this->redirect(['controller'=>'pages','action'=>'home']);
        }
    }  
    
    /**
     * Asocia a un administrador como encargado de un recurso.
     * @param  integer $id
     */
    public function matchAdmin($id)
    {
        // Saca la descripción del tipo de ese recurso específico
        $connection = ConnectionManager::get('default');
        $result = $connection
                    ->execute('SELECT id, username FROM users WHERE role_id = :role', ['role' => 1])
                    ->fetchAll('assoc');
        $this->set('admins', $result);
    }
    
    /**
     * Actualiza la información de un recurso.
     * @param  integer $id
     */
    public function edit($id)
    {
    }
    
    /**
     * Elimina un recurso de la base de datos.
     * @param  integer $id
     */
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $resource = $this->Resources->get($id);
        if ($this->Resources->delete($resource))
        {
            $this->Flash->success(__('El recurso ha sido eliminado éxitosamente.'));
        } 
        else 
        {
            $this->Flash->error(__('El recurso no pudo ser eliminado. Por favor inténtelo de nuevo.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    /*
     * Revisa cuáles funciones puede hacer un usuario con cierto rol
     * @param $user
     */
    public function isAuthorized($user)
    {
        return parent::isAuthorized($user);
    }
}

?>