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
    
    public function manage()
    {
        $query = $this->Reservations->find('all')
                    ->select(['Reservations.id', 'Reservations.start_date', 'Reservations.end_date', 'Resources.resource_name', 'Reservations.reservation_title', 'Reservations.state'])
                    ->join([
                        'users' => [
                            'table' => 'Users',
                            'type' => 'INNER',
                            'conditions' => 'users.id = Reservations.user_id'
                        ],
                        'resources_users' => [
                            'table' => 'Resources_Users',
                            'type' => 'INNER',
                            'conditions' => ['resources_users.user_id ='. $this->Auth->User('id'), 'resources_users.resource_id = Reservations.resource_id']
                        ],
                        'resources' => [
                            'table' => 'Resources',
                            'type' => 'INNER',
                            'conditions' => 'resources.id = Reservations.resource_id'
                        ]
                    ]);
        
        // Pagina la tabla de recursos
        $this->set('reservations', $this->paginate($query));
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
    
    /**
    * Actualiza el estado de la reservación dependiendo de si el administrador
    * la acepta o la rechaza.
    * @param integer $idReservacion
    */
    public function edit($id = null, $accion = null)
    {
        if($this->Auth->user())
        {
            // Carga la reservación que se desea editar
            $reservation = $this->Reservations->get($id);
            
            if($this->request->is(array('post', 'put')))
            {
                // Carga la información que se obtiene en el formulario
                $this->Reservations->patchEntity($reservation, $this->request->data);
                /*
                // Guarda la reservación con la nueva información modificada
                if($this->Reservations->save($reservation))
                {
                    // Muestra el mensaje indicando que la reservación se modificó correctamente y se redirecciona a la vista principal de Administrar Reservaciones
                    $this->Flash->success('Se ha modificado correctamente la reservación', ['key', 'editReservationSuccess']);
                    return $this->redirect(['controller' => 'Reservations', 'action' => 'index']);
                }
                else
                {
                    // En caso de que no se haya podido modificar la información, despligue un mensaje indicando que hubo error
                    $this->Flash->error('No se ha podido modificar la reservación', ['key' => 'editReservationError']);
                }*/
            }
            
            $this->set('reservation', $reservation);
        }
    }
    
    public function accept($id = null, $adminComment = null)
    {
        debug($id);
    }
    
    public function reject($id = null, $adminComment = null)
    {        
        debug($adminComment);
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
