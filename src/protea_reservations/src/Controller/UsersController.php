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
                    $this->Flash->success('Su solicitud de registro ha sido procesada, por favor espere la confirmación.', ['key' => 'addUserSuccess']);
                    return $this->redirect(['controller' => 'Pages','action' => 'home']);
                }
            }
            catch(Exception $ex)
            {
                $this->Flash->error(__('No ha sido posible procesar su solicitud.'), ['key' => 'addUserError']);
            }
        }
        $this->set('user', $user);
    }    
    
    public function login()
    {
        if ($this->request->is('post'))
        {
            $user = $this->Auth->identify();

            if($user)
            {
                if($this->isAuthorized($user))
                {
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                    //return $this->redirect(['controller' => 'Pages','action' => 'home']);
                }
                else
                {               
                    $this->Flash->error('Su solicitud de registro todavía no ha sido procesada, por favor espere.', ['key' => 'loginPendiente']);
                }
            }
            else
            {
                $this->Flash->error(__('Nombre de usuario o contraseña incorrectos, por favor inténtelo de nuevo.'), ['key' => 'loginError']);
            }
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
    
    public function isAuthorized($user)
    {
        // Todos los usuarios se pueden registrar
        if ($this->request->action === 'add') {
            return true;
        }

        // Solo los usuarios confirmados pueden loguearse exitosamente
        if (in_array($this->request->action, ['login'])) 
        {
            if ($this->Users->registrationConfirmed($user['id'])) 
                return true;
        }

        return parent::isAuthorized($user);
    }
}

?>