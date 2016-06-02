<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class ReservationsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        //$this->loadComponent('Paginator');
    }
    
    /**
    * Establece variables importantes de usuario.
    * @param Event $event
    */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        
        $this->query = $this->Reservations->find('all')
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
            ])
            ->andWhere(['Reservations.state = ' => 1]);
            //->hydrate(false);
    }
    
    /** 
     * Paginador de recursos.
     */
    public $paginate = array('limit' => 10,
                             'order' => array('Reservation.start_date' => 'asc')
                            );
    
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
			die($events);
			
		}
		
		$this->set('types',$resource_type);
        
        
	}
    
    /*
    * Carga las reservaciones pendientes que le corresponden al administrador que está en la sesión
    */
    public function manage()
    {
        // Pagina la tabla de recursos
        $this->set('reservations', $this->paginate($this->query));
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
    * la acepta o la rechaza. También agrega los comentarios del administrador
    * en caso que hayan.
    * @param integer $idReservacion
    */
    public function edit($id = null)
    {
        if($this->Auth->user())
        {
            // Carga la reservación que se desea editar
            $reservation = $this->Reservations->get($id, [
                'contain' => ['Users', 'Resources'],
                'fields' => ['id', 'start_date', 'end_date', 'user_comment', 'course_id', 'course_name', 'Users.first_name', 'Users.last_name', 'Resources.resource_name']
            ]);
            
            $reservacionPermitida = false;
            foreach($this->query as $item)
            {
                if($item['id'] == $reservation['id'])
                {
                    $reservacionPermitida = true;
                    break;
                }
            }
            
            if($reservacionPermitida)
            {
                if($this->request->is(array('post', 'put')))
                {
                    $this->Reservations->patchEntity($reservation, $this->request->data);
                    
                    if($this->request->data['accion'] == 'Aceptar')
                        $this->accept($id, $this->request->data['Reservations']['admin_comment']);
                    elseif($this->request->data['accion'] == 'Rechazar')
                        $this->reject($id, $this->request->data['Reservations']['admin_comment']);
                }

                $this->set('reservation', $reservation);
            }
            else
            {
                $this->Flash->error('No se puede acceder a esa reservación', ['key' => 'editReservationError']);
                return $this->redirect(['controller' => 'Reservations','action' => 'manage']);
            }
        }
    }
    
    /*
    * Método auxiliar que cambia el estado de la reservación aceptada.
    * @param integer $id
    * @param string $adminComment
    */
    public function accept($id = null, $adminComment = null)
    {
        if($id != null)
        {
            $reservation = $this->Reservations->get($id);
            $reservation->administrator_comment = $adminComment;
            $reservation->state = 2;

            if($this->Reservations->save($reservation))
            {
                $this->Flash->set(__('La reservación fue aceptada exitosamente'), ['clear' => true, 'key' => 'acceptReservationSuccess']);
                //$this->Flash->success('La reservación fue aceptada exitosamente', ['key', 'acceptReservationSuccess']);
                return $this->redirect(['controller' => 'Reservations', 'action' => 'manage']);
            }
            else
            {
                $this->Flash->set(__('La reservación no se pudo aceptar, inténtelo más tarde'), ['clear' => true, 'key' => 'acceptReservationError']);
                //$this->Flash->error('La reservación no se pudo aceptar, inténtelo más tarde', ['key', 'acceptReservationError']);
                return $this->redirect(['controller' => 'Reservations', 'action' => 'manage']);
            }
        }
    }
    
    /*
    * Método auxiliar que cambia el estado de la reservación rechazada
    * @param integer $id
    * @param string $adminComment
    */
    public function reject($id = null, $adminComment = null)
    {        
        if($id != null)
        {
            $reservation = $this->Reservations->get($id);
            $reservation->administrator_comment = $adminComment;
            $reservation->state = 3;
            
            if($this->Reservations->save($reservation))
            {
                $this->Flash->set(__('La reservación fue rechazada exitosamente'), ['clear' => true, 'key' => 'rejectReservationSuccess']);
                //$this->Flash->success('La reservación fue rechazada exitosamente', ['key', 'rejectReservationSuccess']);
                return $this->redirect(['controller' => 'Reservations', 'action' => 'manage']);
            }
            else
            {
                $this->Flash->set(__('La reservación no se pudo rechazar, inténtelo más tarde'), ['clear' => true, 'key' => 'rejectReservationError']);
                //$this->Flash->error('La reservación no se pudo rechazar, inténtelo más tarde', ['key', 'rejectReservationError']);
                return $this->redirect(['controller' => 'Reservations', 'action' => 'manage']);
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
