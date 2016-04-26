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
    
    public function initialize()
    {
        parent::initialize();


        //$this->Auth->config('authorize',['Users']);
        /**
        $this->loadComponent('Auth', [
            'authorize' => 'Users',
        ]);
        **/
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
        if(!$this->Auth->user())
        {
            $user = $this->Users->newEntity();
            
            if ($this->request->is('post'))
            {
                $user = $this->Users->patchEntity($user, $this->request->data);
                
                try
                {
                    if ($this->Users->save($user))
                    {
                        $this->Flash->success('Su registro está siendo procesado, la confirmación será enviada a su correo', ['key' => 'addUserSuccess']);
                        return $this->redirect(['controller' => 'Pages','action' => 'home']);
                    }
                }
                catch(Exception $ex)
                {
                    $this->Flash->error(__('No se ha podido procesar su solicitud'), ['key' => 'addUserError']);
                }
            }
            $this->set('user', $user);            
        }
        else
        {
            return $this->redirect(['controller'=>'pages','action'=>'home']);
        }

    }    
    
    public function login()
    {
        if(!$this->Auth->user())
        {
            if ($this->request->is('post'))
            {
                $this->Auth->userScope = array('User.state'=>1);
                $user = $this->Auth->identify();

                if($user)
                {
                   // if($this->isAuthorized($user))
                  //  {
                        $this->Auth->setUser($user);
                        return $this->redirect($this->Auth->redirectUrl());
                        //return $this->redirect(['controller' => 'Pages','action' => 'home']);
                  //  }
                  //  else
                  //  {               
                        //$this->Flash->error('Su registro aún no ha sido procesado, por favor espere', ['key' => 'loginPendiente']);
                  //  }
                }
                else
                {
                    $this->Flash->error(__('Nombre de usuario o contraseña incorrectos, inténtelo otra vez'), ['key' => 'loginError']);
                }
            }            
        }
        else
        {
            return $this->redirect(['controller'=>'pages','action'=>'home']);
        }

    }

    public function logout()
    {
        $logout = $this->Auth->logout();
        
        if($logout)
        {
            $this->Flash->success('Se ha cerrado su sesión exitosamente', ['key' => 'logoutSuccess']);
            return $this->redirect($logout);
        }
    }
    
    public function isAuthorized($user)
    {

        // Todos los usuarios se pueden registrar
        
        if ($this->request->action === 'view') {
            return false;            
        }

        if ($this->request->action === 'index') {
            return true;            
        }
        

        // Solo los usuarios confirmados pueden loguearse exitosamente
        

        /** Creo que ya no es necesario
        if (in_array($this->request->action, ['login'])) 
        {
            if ($this->Users->registrationConfirmed($user['id'])) 
                return true;
        }
**/
        return parent::isAuthorized($user);

        
    }
}

?>