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
			
        
		if($this->request->is('post'))
		{
            /** Consulta para mostrar en el calendarios solo las reservacionesque corresponden a recursos tipo sala 
            y que esten aceptadas o pendientes **/
            $resources = $this->Reservations->find('all')
            ->select(['id', 'start'=>'Reservations.start_date', 'end'=>'Reservations.end_date', 
                      'title'=>'Reservations.event_name','state'])
            ->join([
                'resources' => [
                    'table' => 'Resources',
                    'type' => 'INNER',
                    'conditions' => ['resources.id = Reservations.resource_id', 'resources.resource_type_id' => 1 ]
                ]
            ])
            ->where([ 
                'Reservations.state IN' => [1,2] 
            ]);
            
			$resources = $resources->toArray();
            
		
			$events = array();
			array_push($events, $resources);
            
            $events = $events[0];
            
            foreach($events as $key)
            {
                $bordercolor = '#FAAC58';
                $backgroundcolor = '#FAAC58';
                if($key['state'] == 2)
                {
                    $backgroundcolor = '#91BB1B';
                    $bordercolor = '#91BB1B';
                }
                $key['backgroundColor'] = $backgroundcolor; //array('backgroundColor'=>'#00000');  
                $key['borderColor'] = $bordercolor;
                    
                
            }
            
           // debug($events);
            
			$events =  json_encode($events);

			$events = str_replace(".",",",$events);
	
			//$events = substr($events, 1,strlen($events)-2);
            
            
            
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
                
                /*if(isset($_POST['check'])){ 
                $this->Reservation->save($reservation);
                } */

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
