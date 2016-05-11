<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ReservationsController extends AppController
{    
	public function index()
	{

		/**El siguiente query obtiene todos los tipos de recursos que existen en la base **/	
			$this->loadModel('ResourceTypes');
			$resource_type = $this->ResourceTypes->find()
							->hydrate(false)
							->select(['description']);
							
			$resource_type = $resource_type->toArray();
			
        
		if($this->request->is('post'))
		{
			$resources = $this->Reservations->find()
							->select(['id','start'=>'start_date','end'=>'end_date','title'=>'reservation_title'])

							->hydrate(false);
							  /*->where(function ($exp, $q) {
        			return $exp->notEq('reservation_title', "");
    				});
					*/
			
			$resources = $resources->toArray();
		


			$events = array();
			array_push($events, $resources);

			$events =  json_encode($events);

			$events = str_replace(".",",",$events);
	
			$events = substr($events, 1,strlen($events)-2);
			die($events);
			
		}
		
		$this->set('types',$resource_type);
	
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
