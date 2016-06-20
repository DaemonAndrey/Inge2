<?php

// src/Controller/UsersController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController
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
        $this->set('user_username', $this->Auth->User('username'));
        $this->Auth->allow(['add', 'logout']);
    }
    
    public function initialize()
    {
        parent::initialize();

    }

    public function index()
    {
        $this->set('users', $this->Users->find('all'));
    }

    /**
     * Para futuras vistas
     * @param  integer $id
     */
    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    /**
     * Se encarga del registro de usuarios, se pasa a la vista de REGISTRO.
     * Indica si se proceso la solicitud de registro o no.
     */
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
    /**
    * Se encarga del inicio de sesión de un usuario y se pasa a la vista de LOGIN.
    * Verifica si el usuario esta debidamente registrado y que los datos ingresados sean correctos.
    */
    public function login()
    {
        if(!$this->Auth->user())
        {
            if ($this->request->is('post'))
            {
               
                $user = $this->Auth->identify();

                $secondAuth = $this->Users->validateUserState($user[0]);
                unset($secondAuth['state']);

                if($user && $secondAuth)
                {

                    $secondAuth = $secondAuth[0];

                    $this->Auth->setUser($secondAuth);




                    return $this->redirect($this->Auth->redirectUrl());

                }
                else
                {
                    //TODO: Mostar $this->Flash->error('Su registro aún no ha sido procesado, por favor espere', ['key' => 'loginPendiente']);

                    //Se puede hacer con un if que verifique los datos de $this->request->data['username'] contra la base

                    $this->Flash->error(__('Nombre de usuario o contraseña incorrectos, inténtelo otra vez'), ['key' => 'loginError']);
                    
                }
            }            
        }
        else
        {
            return $this->redirect(['controller'=>'pages','action'=>'home']);
        }

    }
    /**
    * Se encarga del cierre de sesión de un usuario.
    * Se pasa a la pagina principal. 
    */
    public function logout()
    {
        $logout = $this->Auth->logout();
        
        if($logout)
        {
            $this->Flash->success('Se ha cerrado su sesión exitosamente', ['key' => 'logoutSuccess']);
            return $this->redirect($logout);
        }
    }
    
    /*
     * Verifica si un usuario tiene autorización para poder loguearse o no 
     * @param $user
     */
    public function isAuthorized($user)
    {
        if ($this->request->action === 'view') {
            return false;            
        }

        if ($this->request->action === 'index' && $user['role_id'] == 2) {
            return false;            
        }
        
        return parent::isAuthorized($user);
    }
}

?>