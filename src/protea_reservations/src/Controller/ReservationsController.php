<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Mailer\MailerAwareTrait;
use Cake\Mailer\Email;

class ReservationsController extends AppController
{    
    public function initialize()
    {
        parent::initialize();
    }
    
    /**
    * Establece variables importantes de usuario.
    * @param Event $event
    */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        
        // Para recuperar el role del usuario loggeado
        $this->set('user_role', $this->Auth->User('role_id'));
        
        // Consulta para recuperar reservaciones pendientes
        $this->pendingReservations = $this->Reservations->find('all')
            ->select(['id',
                      'start_date',
                      'end_date',
                      'resources.resource_name',
                      'event_name',
                      'state',
                      'resources.resource_code'
                     ])
            ->join(['users' => ['table' => 'users',
                                'type' => 'INNER',
                                'conditions' => 'users.id = reservations.user_id'
                               ],
                    'resources_users' => ['table' => 'resources_users',
                                          'type' => 'INNER',
                                          'conditions' => ['resources_users.user_id ='. $this->Auth->User('id'),
                                                           'resources_users.resource_id = Reservations.resource_id'
                                                          ]
                                         ],
                    'resources' => ['table' => 'resources',
                                    'type' => 'INNER',
                                    'conditions' => 'resources.id = reservations.resource_id'
                                   ]
                   ])
            ->andWhere(['reservations.state = ' => 0])
            ->order(['start_date' => 'ASC']);
    }
    
    /** 
     * Paginador de recursos.
     */
    public $paginate = array('limit' => 10,
                             'order' => array('Reservation.start_date' => 'asc')
                            );
    
    /**
    * Carga el calendario principal con las reservas.
    */
	public function index()
	{
		// Consulta para recuperar todos los tipos de recursos que existen en la base
        $this->loadModel('ResourceTypes');
        
        $resource_type = $this->ResourceTypes->find()
                        ->hydrate(false)
                        ->select(['description']);

        $resource_type = $resource_type->toArray();	

        /**El siguiente query obtiene la tupla con las configuraciones**/
        $this->loadModel('Configurations');
        $configuration = $this->Configurations->get(1);
        
        
		if($this->request->is('post'))
		{
            // Consulta para mostrar en calendario sólo reservaciones pendientes o aceptadas de Tipo Sala
            $resources = $this->Reservations->find('all')
            ->select(['id',
                      'start'=>'Reservations.start_date',
                      'end'=>'Reservations.end_date', 
                      'title'=>'Reservations.event_name',
                      'state'
                     ])
            ->join(['resources' => ['table' => 'resources',
                                    'type' => 'INNER',
                                    'conditions' => ['resources.id = Reservations.resource_id',
                                                     'resources.resource_type_id' => 1
                                                    ]
                                   ]
                   ]);
            
			$resources = $resources->toArray();
            
			$events = array();
			array_push($events, $resources);
            
            $events = $events[0];
            
            foreach($events as $key)
            {
                $bordercolor = '#FAAC58';           // Color de reservaciones pendientes
                $backgroundcolor = '#FAAC58';
                
                // Si estado de reservacion es 'aceptada'
                if($key['state'] == 1)
                {
                    $backgroundcolor = '#91BB1B';   // Color de reservaciones aceptadas
                    $bordercolor = '#91BB1B';
                }
                
                $key['backgroundColor'] = $backgroundcolor; //array('backgroundColor'=>'#00000');  
                $key['borderColor'] = $bordercolor;    
            }
            
			$events =  json_encode($events);
			$events = str_replace(".",",",$events);
	
			//$events = substr($events, 1,strlen($events)-2);
			die($events);
		}
		
		$this->set('types',$resource_type);
        $this->set('configuration', $configuration);        
	}
    
    /*
    * Carga las reservaciones pendientes que le corresponden al administrador que está en la sesión
    */
    public function manage()
    {
        // Si es administrador solo ve las reservaciones pendientes
        if($this->Auth->User('role_id') != 1)
        {
            // Pagina la tabla de recursos
            $this->set('reservations', $this->paginate($this->pendingReservations));
        }
        // Si es usuario regular puede ver todas las reservaciones pendientes, aceptadas, rechazadas y canceladas
        else
        {   
            $userReservations = $this->Reservations->find('all')
                ->select(['id',
                          'start_date',
                          'end_date',
                          'resources.resource_name',
                          'event_name',
                          'state',
                          'resources.resource_code'
                         ])
                ->join(['resources' => ['table' => 'resources',
                                        'type' => 'INNER',
                                        'conditions' => 'resources.id = reservations.resource_id'
                                       ]
                       ])
                ->andWhere(['reservations.user_id = ' => $this->Auth->User('id'),
                            'reservations.start_date > NOW()'
                           ])
                ->order(['start_date' => 'ASC']);
               
            // Pagina la tabla de recursos
            $this->set('reservations', $this->paginate($userReservations));
        }
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
                
                if($this->Auth->User('role_id') == 2 || $this->Auth->User('role_id') == 3)
                {                        
                    $reservation->state = 1;
                    
                    $this->loadModel('Users');
                    $loggedUser = $this->Users->find('all')
                        ->select(['first_name', 'last_name'])
                        ->where(['username = ' => $this->Auth->User('username')]);
                    
                    $user = $loggedUser->first();
                    
                    $this->loadModel('HistoricReservations');
                    $historicReservation = $this->HistoricReservations->newEntity();
                    $historicReservation->reservation_start_date = $start_date;
                    $historicReservation->reservation_end_date = $end_date;
                    $historicReservation->resource_name = $resource;
                    $historicReservation->event_name = $event_name;
                    $historicReservation->user_username = $this->Auth->User('username');
                    $historicReservation->user_first_name = $user['first_name'];
                    $historicReservation->user_last_name = $user['last_name'];
                    $historicReservation->user_comment = $user_comment;
                    $historicReservation->administrator_comment = $adminComment;
                    $historicReservation->state = 1;
                    
                    if ($this->Reservations->save($reservation) && $this->HistoricReservations->save($historicReservation))
                        $this->response->statusCode(200);
                    else
                        $this->response->statusCode(404); 
                }
                else
                {                    
                    if ($this->Reservations->save($reservation))
                        $this->response->statusCode(200);
                    else
                        $this->response->statusCode(404);   
                }
            }
        }            
	}
    
    use MailerAwareTrait;
    
    /**
    * Actualiza el estado de la reservación dependiendo de si el administrador
    * la acepta o la rechaza. También agrega los comentarios del administrador
    * en caso que hayan.
    * @param integer $idReservacion
    */
    public function edit($id = null)
    {
        if($id != null)
        {
            if($this->Auth->user())
            {        
                $reservations = $this->Reservations->find('all')
                    ->select(['id',
                              'start_date',
                              'end_date',
                              'user_comment',
                              'event_name',
                              'user.username',
                              'user.first_name',
                              'user.last_name',
                              'resource.resource_name',
                              'resource.resource_code'
                             ])
                    ->join(['resource' => ['table' => 'resources',
                                           'type' => 'INNER',
                                           'conditions' => ['reservations.resource_id = resource.id']
                                          ],
                            'user' => ['table' => 'users',
                                       'type' => 'INNER',
                                       'conditions' => ['reservations.user_id = user.id']
                                      ]
                           ])
                    ->andWhere(['reservations.id = ' => $id]);
                
                $reservation = $reservations->first();
                
                $reservacionPermitida = false;
                
                foreach($this->pendingReservations as $item)
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
                        
                        // Si la acción es aprobar la reservación
                        if($this->request->data['accion'] == 'Aprobar')
                        {
                            $this->accept($reservation, $this->request->data['Reservations']['admin_comment']);
                        }
                        // Si la acción es rechazar la reservación
                        else if($this->request->data['accion'] == 'Rechazar')
                        {
                            $this->reject($reservation, $this->request->data['Reservations']['admin_comment']);
                        }
                        // Si la acción es cancelar la reservación
                        else if($this->request->data['accion'] == 'Cancelar')
                        {
                            $this->cancel($reservation);
                        }
                    }
                    $this->set('reservation', $reservation);
                }
                else
                {
                    $this->Flash->error('No se puede acceder a esa reservación.', ['key' => 'error']);

                    return $this->redirect(['controller' => 'Reservations','action' => 'manage']);
                }
            }
        }
        else
        {
            $this->Flash->set(__('No se puede editar la reservación porque no existe.'), ['clear' => true, 'key' => 'error']);
            return $this->redirect(['controller' => 'Reservations', 'action' => 'manage']);
        }
    }
    
    //Metodo qu mostrara los reportes de reservaciones
    
    public function reporte($id = null)
    {
        if($id != null)
        {
            
        }
    }
    
    /*
    * Método auxiliar que cambia el estado de la reservación aceptada.
    * @param integer $id
    * @param string $adminComment
    */
    public function accept($reservation = null, $adminComment = null)
    {
        if($reservation != null)
        {
            if($this->Auth->user())
            {
                $this->loadModel('HistoricReservations');
                $historicReservation = $this->HistoricReservations->newEntity();
                $historicReservation->reservation_start_date = $reservation['start_date'];
                $historicReservation->reservation_end_date = $reservation['end_date'];
                $historicReservation->resource_name = $reservation['resource']['resource_name'];
                $historicReservation->event_name = $reservation['event_name'];
                $historicReservation->user_username = $reservation['user']['username'];
                $historicReservation->user_first_name = $reservation['user']['first_name'];
                $historicReservation->user_last_name = $reservation['user']['last_name'];
                $historicReservation->user_comment = $reservation['user_comment'];
                $historicReservation->administrator_comment = $adminComment;
                $historicReservation->state = 1;
                $reservation->state = 1;
                
                $this->loadModel('Users');
                $userEmail = $reservation['user']['username'];
                
                if($this->HistoricReservations->save($historicReservation) && $this->Reservations->save($reservation))
                {
                    $this->getMailer('User')->send('confirmReservation', [$userEmail]);
                    
                    $this->Flash->set(__('Reservación aceptada.'), ['clear' => true, 'key' => 'success']);
                    return $this->redirect(['controller' => 'Reservations', 'action' => 'manage']);
                }
                else
                {
                    $this->Flash->set(__('Reservación NO aceptada. Por favor, inténtelo de nuevo.'), ['clear' => true, 'key' => 'error']);

                    return $this->redirect(['controller' => 'Reservations', 'action' => 'manage']);
                }
            }
        }
        else
        {
            $this->Flash->set(__('No se puede aceptar la reservación porque no existe.'), ['clear' => true, 'key' => 'error']);

            return $this->redirect(['controller' => 'Reservations', 'action' => 'manage']);
        }
    }
    
    /*
    * Método auxiliar que cambia el estado de la reservación rechazada
    * @param integer $id
    * @param string $adminComment
    */
    public function reject($reservation = null, $adminComment = null)
    {        
        if($reservation != null)
        {
            if($this->Auth->user())
            {
                $this->loadModel('HistoricReservations');
                $historicReservation = $this->HistoricReservations->newEntity();
                $historicReservation->reservation_start_date = $reservation['start_date'];
                $historicReservation->reservation_end_date = $reservation['end_date'];
                $historicReservation->resource_name = $reservation['resource']['resource_name'];
                $historicReservation->event_name = $reservation['event_name'];
                $historicReservation->user_username = $reservation['user']['username'];
                $historicReservation->user_first_name = $reservation['user']['first_name'];
                $historicReservation->user_last_name = $reservation['user']['last_name'];
                $historicReservation->user_comment = $reservation['user_comment'];
                $historicReservation->administrator_comment = $adminComment;
                $historicReservation->state = 2;
                
                $this->loadModel('Users');
                $userEmail = $reservation['user']['username'];
                
                if($this->HistoricReservations->save($historicReservation) && $this->Reservations->delete($reservation))
                {
                    $this->getMailer('User')->send('rejectReservation', [$userEmail]);
                    
                    $this->Flash->set(__('Reservación rechazada.'), ['clear' => true, 'key' => 'success']);
                    return $this->redirect(['controller' => 'Reservations', 'action' => 'manage']);
                }
                else
                {
                    $this->Flash->set(__('Reservación NO rechazada. Por favor, inténtelo de nuevo.'), ['clear' => true, 'key' => 'error']);

                    return $this->redirect(['controller' => 'Reservations', 'action' => 'manage']);
                }
            }
        }
        else
        {
            $this->Flash->set(__('No se puede rechazar la reservación porque no existe.'), ['clear' => true, 'key' => 'error']);

            return $this->redirect(['controller' => 'Reservations', 'action' => 'manage']);
        }
    }
    
    /**
    * Permite al usuario visualizar la información de su reservación
    * @param integer $id
    */
    public function view($id = null)
    {
        if($id != null)
        {
            if($this->Auth->user())
            {
                // Carga la reservación que se desea editar                
                $reservations = $this->Reservations->find('all')
                ->select(['id',
                          'start_date',
                          'end_date',
                          'user_comment',
                          'administrator_comment',
                          'event_name',
                          'user_id',
                          'resource_id',
                          'user.username',
                          'user.first_name',
                          'user.last_name',
                          'resource.resource_name',
                          'event_name',
                          'state',
                          'resource.resource_code',
                          'resourceType.days_before_reservation'
                         ])
                ->join(['resource' => ['table' => 'resources',
                                       'type' => 'INNER',
                                       'conditions' => 'resource.id = reservations.resource_id'
                                      ],
                        'user' => ['table' => 'users',
                                   'type' => 'INNER',
                                   'conditions' => ['user.id = reservations.user_id']
                                  ],
                        'resourceType' => ['table' => 'resource_types',
                                           'type' => 'INNER',
                                           'conditions' => ['resource.resource_type_id = resourceType.id']
                                          ]
                       ])
                ->andWhere(['reservations.id = ' => $id]);
                $reservation = $reservations->first();
                
                $reservacionPermitida = ($this->Auth->user('id') == $reservation['user_id']) ? true : false;
                
                if($reservacionPermitida)
                {
                    if($this->request->is(array('post', 'put')))
                    {
                        $this->Reservations->patchEntity($reservation, $this->request->data);
                                                
                        if($this->request->data['accion'] == 'Cancelar')
                            $this->cancel($reservation);
                    }
                    $this->set('reservation', $reservation);
                }
                else
                {
                    $this->Flash->error('No se puede acceder a esa reservación.', ['key' => 'error']);

                    return $this->redirect(['controller' => 'Reservations','action' => 'manage']);
                }
            }
        }
        else
        {
            $this->Flash->set(__('No se puede editar la reservación porque no existe.'), ['clear' => true, 'key' => 'error']);

            return $this->redirect(['controller' => 'Reservations', 'action' => 'manage']);
        }
    }
    
    /**
    * Método que cancela la reservación de un usuario, la guarda en la tabla HistoricReservations con estado 3 y además la elimina
    * de la tabla Reservations.
    * @param 
    */
    public function cancel($reservation = null)
    {
        if($reservation != null)
        {
            if($this->Auth->user())
            {
                $this->loadModel('Resources');
                $resources = $this->Resources->find('all')
                    ->select(['id',
                              'resource_type_id',
                              'resource_name',
                              'resource_code',
                              'description',
                              'active',
                              'resourceTypes.days_before_reservation'
                             ])
                    ->join(['resourceTypes' => ['table' => 'resource_types',
                                                'type' => 'INNER',
                                                'conditions' => ['resources.id = ' => $reservation['resource_id'],
                                                                 'resourceTypes.id = resources.resource_type_id'
                                                                ]
                                               ]
                           ]);
                
                $resource = $resources->first();
                $dias = $resource['resourceTypes']['days_before_reservation'].' days';    
                $startDate = date_format($reservation['start_date'], 'Y/m/d');            
                $fecha = date_create($startDate);
                $fechaLimite = date_sub($fecha, date_interval_create_from_date_string($dias));
                $fechaLimiteCancelacion = date_format($fechaLimite, 'Y/m/d');
                
                if( date('Y/m/d') <= $fechaLimiteCancelacion )
                {
                    if($reservation['state'] != 1)
                    {
                        $this->loadModel('HistoricReservations');
                        $historicReservation = $this->HistoricReservations->newEntity();
                        $historicReservation->reservation_start_date = $reservation['start_date'];
                        $historicReservation->reservation_end_date = $reservation['end_date'];
                        $historicReservation->resource_name = $reservation['resource']['resource_name'];
                        $historicReservation->event_name = $reservation['event_name'];
                        $historicReservation->user_username = $reservation['user']['username'];
                        $historicReservation->user_first_name = $reservation['user']['first_name'];
                        $historicReservation->user_last_name = $reservation['user']['last_name'];
                        $historicReservation->user_comment = $reservation['user_comment'];
                        $historicReservation->administrator_comment = $reservation['administrator_comment'];
                        $historicReservation->state = 3;

                        if($this->HistoricReservations->save($historicReservation) && $this->Reservations->delete($reservation))
                        {
                            $this->Flash->set(__('Reservación cancelada.'), ['clear' => true, 'key' => 'success']);
                            return $this->redirect(['controller' => 'Reservations', 'action' => 'manage']);
                        }
                        else
                        {
                            $this->Flash->set(__('Reservación NO cancelada. Por favor, inténtelo de nuevo.'), ['clear' => true, 'key' => 'error']);
                            return $this->redirect(['controller' => 'Reservations', 'action' => 'manage']);
                        }
                    }
                    else
                    {
                        $this->loadModel('HistoricReservations');
                        $historicReservations = $this->HistoricReservations->find('all')
                            ->select('id',
                                     'reservation_start_date',
                                     'resource_name',
                                     'user_username',
                                     'state'
                                    )
                            ->andWhere(['reservation_start_date = ' => $reservation['start_date'],
                                        'resource_name = ' => $reservation['resource']['resource_name'],
                                        'user_username' => $this->Auth->user('username')
                                       ]);
                
                        $historicReservation = $historicReservations->first();
                        debug($historicReservation);
                        
                        $historicReservationsTable = TableRegistry::get('HistoricReservations');
                        $historicReservation2 = $historicReservationsTable->get($historicReservation['id']); // Return article with id 12
                        $historicReservation2->state = 4;
                        
                        debug($historicReservation2);

                        if($this->Reservations->delete($reservation) && $this->HistoricReservations->save($historicReservation2))
                        {
                            $this->Flash->set(__('Reservación cancelada.'), ['clear' => true, 'key' => 'success']);
                            return $this->redirect(['controller' => 'Reservations', 'action' => 'manage']);
                        }
                        else
                        {
                            $this->Flash->set(__('Reservación no cancelada. Por favor, inténtelo de nuevo.'), ['clear' => true, 'key' => 'error']);
                            return $this->redirect(['controller' => 'Reservations', 'action' => 'manage']);
                        }
                    }
                }
                else
                {
                    $this->Flash->set(__('Esta reservación ya no se puede cancelar.'), ['clear' => true, 'key' => 'error']);
                    
                    return $this->redirect(['controller' => 'Reservations', 'action' => 'manage']);
                }
            }
        }
        else
        {
            $this->Flash->set(__('No se puede cancelar la reservación porque no existe.'), ['clear' => true, 'key' => 'error']);

            return $this->redirect(['controller' => 'Reservations', 'action' => 'manage']);
        }
    }
    
    /**
    * Verifica si el usuario esta autorizado.
    * @param user
    */
    public function isAuthorized($user)
    {
        // Todos los usuarios pueden ingresar a la vista de administración de reservaciones ('manage')
        if($this->request->action === 'manage')
            return true;
        
        // Solo los administradores pueden aceptar las reservaciones pendientes
        if($this->request->action === 'accept' && $user['role_id'] == 1)
            return false;
        
        // Solo los administradores pueden rechazar las reservaciones pendientes
        if($this->request->action === 'reject' && $user['role_id'] == 1)
            return false;
        
        // Solo los administradores pueden ingresar a la vista de 'edit'
        if($this->request->action === 'edit' && $user['role_id'] != 1)
            return true;
        
        // Los usuarios pueden revisar y cancelar sus reservaciones ingresando a la vista 'view'
        if($this->request->action === 'view' && $user['role_id'] == 1)
            return true;
        
        // Todos los usuarios pueden cancelar una reservación que les pertenezca o administren
        if($this->request->action === 'cancel')
            return true;
        
        // 
        if($this->request->action === 'index')
            return true;
        
        //
        if ($this->request->action === 'add')
            return true;            
        
        return parent::isAuthorized($user);   
    }
}
