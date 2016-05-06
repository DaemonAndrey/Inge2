<?php

// src/Controller/UsersController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
//use Cake\Datasource\ConnectionManager;

class ResourcesController extends AppController
{   
    /** 
     * Permite comprobar si hay una sesión activa y verificar los permisos de usuario.
     * @param Event $event
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        $this->set('user_id', $this->Auth->User('id'));
        $this->set('user_username', $this->Auth->User('username'));
        
        $this->loadModel('ResourceTypes');
        $optns = $this->ResourceTypes->find('list',['keyField' => 'id','valueField' => 'description'])->toArray();                              
        $this->set('resource_types', $optns);
                                                    
        $this->Auth->allow(['view']);
    }
    
    public $paginate = array(
		'limit' => 10,
		'order' => array('Resource.resource_name' => 'asc')
	);
    
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    public function index()
	{
		$this->set('resources', $this->paginate());
	}

    /**
     * Se encarga de consultar un recurso
     * @param  integer $id
     */
    public function view($id = null)
    {
        $resource = $this->Resources->get($id);
        $this->set(compact('resource'));
    }

    /**
     * Se encarga de agregar un nuevo recurso.
     */
    public function add()
    {
        if($this->Auth->user())
        {
            $resource = $this->Resources->newEntity();
            
            if ($this->request->is('post'))
            {
                $resource = $this->Resources->patchEntity($resource, $this->request->data);
                $tipoderecurso = $this->request->data['Resources']['resource_type'];
                $resource->resource_type = $tipoderecurso;
                
                try
                {
                    if ($this->Resources->save($resource))
                    {
                        $this->loadModel('ResourcesUsers');
                        $resourcesUser = $this->ResourcesUsers->newEntity();
                        
                        $resourcesUser->resource_id = $resource->id;
                        $resourcesUser->user_id = $this->Auth->User('id');
                        
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
     * Se encarga de asociar un adminsitrador con un recurso.
     */
    public function matchAdmin()
    {
    }
    
    /**
     * Se encarga de actualizar un recurso.
     */
    public function edit()
    {
    }
    
    /**
     * Se encarga de borrar un recurso.
     */
    public function delete()
    {
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