<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ReservationsController extends AppController
{    
    
    /**
    * Carga el calendario principal con las reservas.
    * 
    */
	public function index()
	{

		/**El siguiente query obtiene todos los tipos de recursos que existen en la base **/	
        $this->loadModel('ResourceTypes');
        $resource_type = $this->ResourceTypes->find()
                        ->hydrate(false)
                        ->select(['description']);

        $resource_type = $resource_type->toArray();
        
        /** Esta consulta obtiene todos los recursos que son del tipo sala**/
        $this->loadModel('Resources');
        $resource = $this->Resources->find()
                                    ->select(['id'])
                                    ->where(['resource_type_id' => 1]);
        $resource = $resource->toArray();
			
        
		if($this->request->is('post'))
		{

            
			$resources = $this->Reservations->find()
							->select(['id','start'=>'start_date','end'=>'end_date','title'=>'event_name'])
							->hydrate(false)
				            /*->where(['state' => 2])*/;

                                    /*{
        			return $exp->notEq('reservation_title', "");
    				});
					*/
			
			$resources = $resources->toArray();
            
            //debug($resources);
            
		
			$events = array();
			array_push($events, $resources);

			$events =  json_encode($events);

			$events = str_replace(".",",",$events);
	
			$events = substr($events, 1,strlen($events)-2);
            
            $events = 
            
            //$events = backrgroundColor('#378006');
			die($events);
			
		}
		
		$this->set('types',$resource_type);
        
	}

    /**
    * Guarda los datos asociados a una reservación en la BD.
    * Indica si se realizó la reservación con éxito.
    */
	public function add()
	{
        if($this->Auth->user())
        {
            $reservation = $this->Reservations->newEntity();
            
            if($this->request->is('post'))
            {
                $start_date = $this->request->data['start_date'];
                $reservation->start_date = $start_date;
                $end_date = $this->request->data['end_date'];
                $reservation->end_date = $end_date;
                $event_name = $this->request->data['event_name'];
                $reservation->event_name = $event_name;
                $user_comment = $this->request->data['user_comment'];
                $reservation->user_comment = $user_comment;

                $resource = $this->request->data['resource'];
                $this->loadModel('Resources');
                $resource_id = $this->Resources->find()
                                            ->select(['id'])
                                            ->where(['resource_name =' => $resource]);

                $reservation->resource_id = $resource_id;
                $reservation->user_id = $this->Auth->User('id');
                print($reservation);

                if ($this->Reservations->save($reservation))
                {
                        $this->response->statusCode(200);
                }
                else
                {
                    $this->response->statusCode(404);   
                }
            }
        }
                
	}
    /**
    * Verifica si el usuario esta autorizado.
    * @param user
    */
    public function isAuthorized($user)
    {
        // Todos los usuarios se pueden registrar
        
        if (($this->request->action === 'index') || ($this->request->action === 'add')) 
        {
            return true;            
        }

        return parent::isAuthorized($user);   
    }
}
