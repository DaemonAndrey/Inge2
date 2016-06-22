<?php

// src/Controller/ConfigurationsController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;

class ConfigurationsController extends AppController
{
    public function edit()
    {
        // Si el usuario tiene permisos
        if($this->Auth->user())
        {
            //Carga el usuario que se desea editar
            $configuration = $this->Configurations->get(1);
            
            if($this->request->is(array('post', 'put')))
		    {
		        //Carga la informacion que se obtiene en el formulario
                $this->Configurations->patchEntity($configuration, $this->request->data);
                
                try
                {
                    if ($this->Configurations->save($configuration))
                    {
                        //Si la información fue guardada correctamente entonces despliega un mensaje de confirmación
                        $this->Flash->success('Se ha actualizado la configuración', ['key' => 'updateConfigurationSuccess']);
                        return $this->redirect(['controller' => 'reservations','action'=> 'manage']);
                    }
                }
                catch(Exception $ex)
                {
                    //Si no se ha podido actualizar correctamente el tipo del recurso despliega un mensaje indicando que hubo error
                    $this->Flash->error('No se ha podido actualizar la configuración', ['key' => 'updateConfigurationError']);
                }
		    }
		    $this->set('configuration', $configuration);
        }
        else
        {
            //Si no se encuentra logueado la persona entonces redirecciona a home
            return $this->redirect(['controller'=>'pages','action'=>'home']);
        }
    }
    
    
    /**
    * Verifica si el usuario esta autorizado.
    * @param user
    */
    public function isAuthorized($user)
    {
        // Solo los administradores pueden aceptar las reservaciones pendientes
        if($this->request->action === 'edit' && $user['role_id'] != 1)
            return true;
       
        
        return parent::isAuthorized($user);   
    }
}
