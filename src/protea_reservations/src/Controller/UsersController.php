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
    /**
    * Se encarga del inicio de sesión de un usuario y se pasa a la vista de LOGIN.
    * Verifica si el usuario esta debidamente registrado y que los datos ingresados sean correctos.
    */
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
    /**
    * Se encarga del cierre de sesión de un usuario.
    * Se pasa a la pagina principal. 
    */
    public function logout()
    {
        $logout = $this->Auth->logout();
        
        if($logout)
        {
            $this->Flash->success('Se ha cerrado su sesión exitosamente.', ['key' => 'logoutSuccess']);
            return $this->redirect($logout);
        }
    }
    
    /*
     * Verifica si un usuario tiene autorización para poder loguearse o no 
     * @param $user
     */
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