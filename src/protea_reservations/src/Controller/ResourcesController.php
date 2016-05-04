<?php

// src/Controller/UsersController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

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
        $this->Auth->allow(['ver']);
    }
    
    public function initialize()
    {
        parent::initialize();
    }

    public function index()
    {
        $this->set('resources', $this->Resources->find('all'));
    }

    /**
     * Se encarga de consultar un recurso
     * @param  integer $id
     */
    public function ver($id)
    {
        $resource = $this->Resources->get($id);
        $this->set(compact('resource'));
    }

    /**
     * Se encarga de agregar un nuevo recurso.
     */
    public function agregar()
    {
        if($this->Auth->user())
        {
            $resource = $this->Resources->newEntity();
            
            if ($this->request->is('post'))
            {
                $resource = $this->Resources->patchEntity($resource, $this->request->data);
                
                try
                {
                    if ($this->Resources->save($resource))
                    {
                        $this->Flash->success('Se ha agregado el nuevo recurso', ['key' => 'addResourceSuccess']);
                        return $this->redirect(['controller' => 'Resources','action' => 'index']);
                    }
                }
                catch(Exception $ex)
                {
                    $this->Flash->error(__('No se ha podido agregar el recurso'), ['key' => 'addResourceError']);
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
     * Se encarga de actualizar un recurso.
     */
    public function actualizar()
    {
    }
    
    /**
     * Se encarga de borrar un recurso.
     */
    public function borrar()
    {
    }
    
    /*
     * Verifica si un usuario tiene autorización para poder agregar, actualizar, borrar o ver un recurso
     * @param $user
     */
    public function isAuthorized($user)
    {
        if ($this->request->action === 'agregar' )
        {
            return true;
        }

        return parent::isAuthorized($user);
    }
}

?>