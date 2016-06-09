<?php

// src/Controller/UsersController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\MailerAwareTrait;
use Cake\Mailer\Email;

class UsersController extends AppController
{   
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }
    
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
        $this->set('user_role', $this->Auth->User('role_id'));
        $this->Auth->allow(['add', 'logout']);
    }
    
    /** 
     * Paginador de usuarios.
     */
    public $paginate = array('limit' => 10);
    
    
    /** 
     * Carga todos los usuarios de la base de datos y los pagina en una tabla.
     */
    public function index()
	{        
        // Carga el modelo de 'Roles' para sacar el rol del usuario
        $this->loadModel('Roles');                             
        
        // Consulta Join de usuarios con roles
        $query = $this->Users->find('all');
        
        $query->innerJoinWith('Roles')
              ->select(['Users.id',
                        'Users.username',
                        'Users.first_name',
                        'Users.last_name',
                        'Users.role_id',
                        'Users.state',
                        'Roles.role_name']);
        
        // Pagina la consulta
        $this->set('users', $this->paginate($query));
	}

    /**
     * Para futuras vistas
     * @param  integer $id
     */
    
    public function view($id)
    {
        // Carga el modelo de 'Roles' para sacar el rol del usuario
        $this->loadModel('Roles');
        
        //$user = $this->Users->get($id);
        $user = $this->Users->find('all')
                            ->where(['Users.id' => $id]);
        
        $user->innerJoinWith('Roles')
             ->select(['Users.username',
                       'Users.first_name',
                       'Users.last_name',
                       'Users.telephone_number',
                       'Users.department',
                       'Users.position',
                       'Roles.role_name']);
        
        $this->set('user', $user->first());
    }

    use MailerAwareTrait;

    /**
     * Se encarga del registro de usuarios, se pasa a la vista de REGISTRO.
     * Indica si se proceso la solicitud de registro o no.
     */
    public function add()
    {
        if(!$this->Auth->user() || ($this->Auth->user() && $this->Auth->User('role_id') == 3))
        {
            $user = $this->Users->newEntity();
            
            if ($this->request->is('post'))
            {
                $user = $this->Users->patchEntity($user, $this->request->data);
                
                try
                {                  
                    if ($this->Users->save($user))
                    {
                        if ($this->Auth->user() && $this->Auth->User('role_id') == 3)
                        {
                            $this->Flash->success('El registro está siendo procesado, la confirmación será enviada al correo ingresado',
                                                  ['key' => 'addUserSuccess']);
                            
                            return $this->redirect(['controller' => 'Users','action' => 'index']);
                        }
                        $this->Flash->success('Su registro está siendo procesado, la confirmación será enviada a su correo',
                                              ['key' => 'addUserSuccess']);
                        
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

                if($user)
                {                    
                    $this->Auth->setUser($user);
                    if($user['role_id'] == 2 || $user['role_id'] == 3)
                    {
                        return $this->redirect(['controller' => 'Reservations','action' => 'manage']);
                    }
                    else if($user['role_id'] == 1)
                    {
                        return $this->redirect(['controller' => 'Reservations','action' => 'index']);
                    }
                    //return $this->redirect($this->Auth->redirectUrl());  
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
        if ($this->request->action === 'view' && $user['role_id'] != 3) {
            return false;            
        }

        if ($this->request->action === 'index' && $user['role_id'] == 2) {
            return false;            
        }
        
        if ($this->request->action === 'edit'){
            // Recupera el id enviado por url    
            $user_id = $this->request->pass[0];            
            if ($user['role_id'] == 3 || $user['id'] == $user_id ) {
                return true;
            }
            else return false;
        } 
        
        return parent::isAuthorized($user);
    }
    
    /**
    * Se rechaza la solicitud de registro de un usuario y se envía un correo, aparte se elimina el usuario de la BD.
    * Se pasa a la pagina principal. 
    */
    public function reject($id=null)
    {
        // Si el usuario tiene permisos
        if($this->Auth->user())
        {
            $this->request->allowMethod(['post', 'delete']);
            $user = $this->Users->get($id);
            try
            {
                if ($this->Users->delete($user))
                {
                    $this->getMailer('User')->send('rejectUser', [$user]);
                    $this->Flash->success('La solicitud ha sido rechazada correctamente, y el usuario eliminado del sistema.', ['key' => 'rejectUserSuccess']);
                    return $this->redirect(['controller' => 'Users','action' => 'index']);
                } 
            }
            catch(Exception $ex)
            {
                $this->Flash->error('La solicitud no fue rechazada. Por favor inténtelo de nuevo', ['key' => 'rejectUserError']);
            }
        }
        else
        {  
            return $this->redirect(['controller'=>'pages','action'=>'home']);
        }
    }
    
    /**
    * Se acepta la solicitud de registro de un usuario y se envía un correo.
    * Se pasa a la pagina principal. 
    */
    public function confirm($id=null)
    {
         if($this->Auth->user())
        {
            //Carga el usuario se desea editar
            $user = $this->Users->get($id);
            $username = $user->username;
             
            if($this->request->is(array('post', 'put')))
		    {
                // Se cambia el estado a 1 que e aceptado por el  administrador.
                $user->state = 1;
                
                //Guarda el usuario con la nueva informacion modificada
                if ($this->Users->save($user))
                {
                    $this->getMailer('User')->send('confirmUser', [$user]);
             
                    //Muestra el mensaje de que ha sido modificado correctamente y redirecciona a la pagina principal de editar
                    $this->Flash->success('Se ha aceptado la solicitud con éxito.', ['key' => 'confirmUserSuccess']);
                    return $this->redirect(['controller' => 'Users','action' => 'index']);
                }
                else
                {
                    //En caso de que no se haa podido actualizar la nformacion despliega un mensaje indicando que hubo error.
                    $this->Flash->error('No se ha podido aceptar la solicitud. Por favor inténtelo de nuevo', ['key' => 'confirmUserError']);
                }
            }
        }
        else
        {
            return $this->redirect(['controller'=>'pages','action'=>'home']);
        }
    }    
    
    /**
    * Actualiza la información de un usuario.
    * @param  integer $id
    */
    public function edit($id=null)
    {
        // Carga todos roles para el DropDown
        $this->loadModel('Roles');
        $options = $this->Roles->find('list',['keyField' => 'id','valueField' => 'role_name'])->toArray();                              
        $this->set('roles_options', $options);
          
        // Si el usuario tiene permisos
        if($this->Auth->user())
        {
            //Carga el usuario que se desea editar
            $user = $this->Users->get($id);
            
            if($this->request->is(array('post', 'put')))
		    {
                //Carga la informacion que se obtiene en el formulario
                $this->Users->patchEntity($user, $this->request->data,['validate' => 'update']);
                   
	                //Guarda el recurso con la nueva informacion modificada
                if ($this->Users->save($user))
                {
                    //Muentra el mensaje de que ha sido modificado correctamente y redirecciona a la pagina principal de editar
                    $this->Flash->success('Se han editado correctamente los datos del usuario', ['key' => 'editUserSuccess']);
                    if($user['role_id'] == 3 ){
                        return $this->redirect(['controller' => 'Users','action' => 'index']);
                    }
                    else{
                        return $this->redirect(['controller' => 'Users','action' => 'edit']);
                    }
                    
                }
                else
                {
                    //En caso de que no se ha podido actualizar la nformacion despliega un mensaje indicando que hubo error.
                    $this->Flash->error('No se han podido editar los datos el usuario', ['key' => 'editUserError']);
                }
            }
            $this->set('user', $user);
        }
        else
        {
            //Si no se encuentra logueado la persona entonces redirecciona a home
            return $this->redirect(['controller'=>'pages','action'=>'home']);
        }
    }
     /**
     * Elimina un usuario de la base de datos.
     * @param  integer $id
     */
    public function delete($id)
    {
        // Si el usuario tiene permisos
        if($this->Auth->user())
        {
            $this->request->allowMethod(['post', 'delete']);
            $user = $this->Users->get($id);
            try
            {
                if ($this->Users->delete($user))
                {
                    $this->Flash->success('El usuario ha sido eliminado éxitosamente', ['key' => 'deleteUserSuccess']);
                    return $this->redirect(['controller' => 'Users','action' => 'index']);
                } 
            }
            catch(Exception $ex)
            {
                $this->Flash->error('El usuario no pudo ser eliminado. Por favor inténtelo de nuevo', ['key' => 'deleteUserError']);
            }
        }
        else
        {  
            return $this->redirect(['controller'=>'pages','action'=>'home']);
        }
    }
}

?>