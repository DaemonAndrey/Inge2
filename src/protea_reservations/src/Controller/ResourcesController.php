<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ResourcesController extends AppController
{    

	public function getResources($resource_type)
	{

	}

    public function isAuthorized($user)
    {

        // Todos los usuarios se pueden registrar
        
        if ($this->request->action === 'index') {
            return true;            
        }

        return parent::isAuthorized($user);

        
    }


}
