<?php

// src/Controller/UsersController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->set('user_username', $this->Auth->User('username'));
        $this->Auth->allow(['add', 'logout']);
    }

     public function index()
     {
        $this->set('users', $this->Users->find('all'));
    }

    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        
        if ($this->request->is('post'))
        {
            $user = $this->Users->patchEntity($user, $this->request->data);
            
            try
            {
                if ($this->Users->save($user))
                {
                    $this->Flash->success('Su solicitud de registro ha sido procesada, por favor espere la confirmación.');
                    return $this->redirect(['controller' => 'Pages','action' => 'home']);
                }
            }
            catch(Exception $ex)
            {
                $this->Flash->error(__('No ha sido posible procesar su solicitud.'));
            }
        }
        $this->set('user', $user);
    }    
    
    public function login()
    {
        if ($this->request->is('post'))
        {
            $user = $this->Auth->identify();
            
            if ($user)
            {
                $this->Auth->setUser($user);
                return $this->redirect(['controller' => 'Pages','action' => 'home']);
            }
            
            $this->Flash->error(__('Nombre de usuario o contraseña incorrectos, intenta de nuevo.'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}

?>