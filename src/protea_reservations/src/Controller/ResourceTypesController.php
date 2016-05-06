<?php

// src/Controller/ResourceTypesController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class ResourceTypesController extends AppController
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
        //$this->Auth->allow(['view']);
    }
    
    public $paginate = array(
		'limit' => 10,
		'order' => array('ResourceTypes.description' => 'asc')
	);
    
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

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
            $resource = $this->ResourceTypes->newEntity();
            
            if ($this->request->is('post'))
            {
                $resourceType = $this->Resources->patchEntity($resourceType, $this->request->data);
                
                try
                {
                    if ($this->Resources->save($resourceType))
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