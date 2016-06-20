<?php
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
        
        // Nomre de usuario y rol de usuario loggeado
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
                        'Roles.role_name'
                       ]);
        
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
                       'Roles.role_name'
                      ]);
        
        $this->set('user', $user->first());
    }

    use MailerAwareTrait;

    /**
     * Se encarga del registro de usuarios, se pasa a la vista de REGISTRO.
     * Indica si se proceso la solicitud de registro o no.
     */
    public function add()
    {
        // Si no está loggeado o si es SuperAdmin
        if(!$this->Auth->user() || ($this->Auth->user() && $this->Auth->User('role_id') == 3))
        {
            $user = $this->Users->newEntity();
            
            if ($this->request->is('post'))
            {
                $user = $this->Users->patchEntity($user, $this->request->data);
                
                // Si SuperAdmin agrega a usuario, se acepta de una vez.
                if ($this->Auth->user() && $this->Auth->User('role_id') == 3)
                {
                    $user->state = 1;
                }
                
                try
                {                  
                    if ($this->Users->save($user))
                    {
                        // Si soy SuperAdmin
                        if ($this->Auth->user() && $this->Auth->User('role_id') == 3)
                        {
                            $this->Flash->success('Usuario agregado.',
                                                  ['key' => 'success']);
                            
                            return $this->redirect(['controller' => 'Users','action' => 'index']);
                        }
                        
                        $this->Flash->success('Procesando solicitud de registro. Confirmación enviada al correo electrónico.',
                                              ['key' => 'success']);
                        
                        return $this->redirect(['controller' => 'Pages','action' => 'home']);                        
                    }
                }
                catch(Exception $ex)
                {
                    $this->Flash->error(__('Solicitud de registro NO procesada.'),
                                        ['key' => 'error']);
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

                    $user = $secondAuth[0];

                    $this->Auth->setUser($user);


                    
                    // Si soy Administrador o SuperAdministrador
                    if($user['role_id'] == 2 || $user['role_id'] == 3)
                    {
                        return $this->redirect(['controller' => 'Reservations','action' => 'manage']);
                    }
                    // Si soy Usuario regular
                    else if($user['role_id'] == 1)
                    {
                        return $this->redirect(['controller' => 'Reservations','action' => 'index']);
                    }

                }
                else
                {
                    $this->Flash->error(__('Nombre de usuario o contraseña incorrectos. Por favor, inténtelo de nuevo.'),
                                        ['key' => 'error']);
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
            $this->Flash->success('Sesión cerrada.',
                                  ['key'=>'success']);
            
            return $this->redirect($logout);
        }
    }
    
    /*
     * Verifica si un usuario tiene autorización para poder loguearse o no 
     * @param $user
     */
    public function isAuthorized($user)
    {
        // Si no soy SuperAdministrador y la acción es VER Usuario
        if ($this->request->action === 'view' && $user['role_id'] != 3)
        {
            return false;            
        }
        
        // Si soy Administrador y la acción es INDICE de Usuarios
        if ($this->request->action === 'index' && $user['role_id'] == 2)
        {
            return false;            
        }
        
        // Si la acción es ACTUALIZAR Usuario
        if ($this->request->action === 'edit')
        {
            // Recupera el id enviado por url    
            $user_id = $this->request->pass[0];       
            
            // Si soy SuperAdministrador o es mi propia cuenta
            if ($user['role_id'] == 3 || $user['id'] == $user_id )
            {
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
        $this->loadModel('Configurations');
        $configuration = $this->Configurations->get(1);
        
        // Si el usuario tiene permisos
        if($this->Auth->user())
        {
            $this->request->allowMethod(['post', 'delete']);
            $user = $this->Users->get($id);
            try
            {
                if ($this->Users->delete($user))
                {
                    $this->getMailer('User')->send('rejectUser', [$user, $configuration]);

                    $this->Flash->success('Solicitud rechazada. Usuario eliminado del sistema.',
                                          ['key' => 'success']);

                    return $this->redirect(['controller' => 'Users','action' => 'index']);
                } 
            }
            catch(Exception $ex)
            {
                $this->Flash->error('Solicitud NO rechazada. Por favor, inténtelo de nuevo.',
                                    ['key' => 'error']);
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

                    $this->Flash->success('Solicitud aceptada.',
                                          ['key' => 'success']);

                    return $this->redirect(['controller' => 'Users','action' => 'index']);
                }
                else
                {
                    $this->Flash->error('Solicitud NO aceptada. Por favor, inténtelo de nuevo.',
                                        ['key' => 'error']);
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
        $options = $this->Roles->find('list',['keyField' => 'id',
                                              'valueField' => 'role_name'])->toArray();
        
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
                    $this->Flash->success('Datos actualizados.',
                                          ['key' => 'success']);

                    return $this->redirect(['controller' => 'Users','action' => 'index']);                    
                }
                else
                {
                    $this->Flash->error('Datos NO actualizados. Por favor, inténtelo de nuevo.',
                                        ['key' => 'error']);
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
                    $this->Flash->success('Usuario eliminado.',
                                          ['key' => 'success']);
                    return $this->redirect(['controller' => 'Users','action' => 'index']);
                } 
            }
            catch(Exception $ex)
            {
                $this->Flash->error('Usuario NO eliminado. Por favor, inténtelo de nuevo.',
                                    ['key' => 'error']);
            }
        }
        else
        {  
            return $this->redirect(['controller'=>'pages','action'=>'home']);
        }
    }
}
?>