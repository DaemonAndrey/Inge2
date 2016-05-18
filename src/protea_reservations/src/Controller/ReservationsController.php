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

							->hydrate(false)
				            /*->where(['state' => 2])*/;

                                    /*{
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
                $reservation_title = $this->request->data['reservation_title'];
                $reservation->reservation_title = $reservation_title;
                $user_comment = $this->request->data['user_comment'];
                $reservation->user_comment = $user_comment;
                $course_name = $this->request->data['course_name'];
                $reservation->course_name = $course_name;
                $course_id = $this->request->data['course_id'];
                $reservation->course_id = $course_id;

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
