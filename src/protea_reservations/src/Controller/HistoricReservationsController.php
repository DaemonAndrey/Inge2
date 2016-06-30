<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class HistoricReservationsController extends AppController
{
    var $start_date;
    var $end_date;
    var $resource_type;
    var $state;

    public function initialize()
    {
        parent::initialize();
    }

    /** 
     * Paginador de reservaciones históricas.
     */
     
    public $paginate = array('limit' => 10,
                             'order' => array('HistoricReservations.reservation_start_date' => 'asc', 'HistoricReservations.reservation_end_date' => 'asc')
                            );
    
    /*public function index()
    {
        if ($this->Auth->user())
        {
            $historicReservations = $this->HistoricReservations->find('all');

            $this->set('historicReservations', $this->paginate($historicReservations));
        }
    }*/
    
    public function index()
	{
        $user_role = $this->Auth->User('role_id');
        
        if($user_role == 1)
        {
            $historicReservations = $this->HistoricReservations->find('all')
                                                        ->where(['user_username = ' => $this->Auth->User('username')]);
            $this->set('historicReservations', $this->paginate($historicReservations));                                                        
        }
        else
        {        
            //$this->set('user_role', $this->Auth->User('role_id'));
            $this->loadModel('ResourceTypes');
            $options = $this->ResourceTypes->find('list',
                                                  [
                                                      'keyField' => 'id',
                                                      'valueField' => 'description'
                                                  ]
                                                 )->toArray();

            $this->set('resource_types_options', $options);

            if($this->Auth->user())
            {
                // Nueva entidad 'Resource'
                $historic = $this->HistoricReservations->newEntity();

                if ($this->request->is('post'))
                {
                    //Carga la informacion que se obtiene en el formulario    
                    $start_date = $this->request->data['start_date'];
                    $end_date = $this->request->data['end_date'];
                    $resource_type=$this->request->data['resource_type_id'];

                    //Redirigir a la vista de la tabla de reportes
                    if ($start_date != null && $end_date != null && $resource_type != null)
                    {
                        $state = $this->request->data['active'];
                        $state = $state + 1;
                        //Redirigir a la vista de la tabla de reportes
                        $this->redirect(['controller' => 'HistoricReservations','action' => 'generateReports',$start_date,'00:00:00', $end_date,'23:59:00',$resource_type, $state]);
                    }
                }
            }

            $this->set('historic', $historic);
        }
    }
    
	public function generateReports()
    {    
        if ($this->request->data != null)
        {
            $start_date = date('Y-m-d', strtotime(str_replace('/', '-', $this->request->data['start_date'])));
            $end_date = date('Y-m-d', strtotime(str_replace('/', '-', $this->request->data['end_date'])));
            $state = $this->request->data['active'] + 1;

            $historic_reservations = $this->HistoricReservations->find()
                ->hydrate(false)
                ->join(['resources' => ['table' => 'resources',
                                    'type' => 'INNER',
                                    'conditions' => ['resources.resource_name = HistoricReservations.resource_name'
                                                     ]
                                   ],
                        'resources_users' => ['table' => 'resources_users',
                                             'type' => 'INNER',
                                             'conditions' => ['resources.id = resources_users.resource_id']
                                             ],
                        'users' => ['table' => 'users',
                                   'type' => 'INNER',
                                   'conditions' => ['users.id = resources_users.user_id', 'users.id = ' => $this->Auth->User('id')]
                                   ]
                   ])
                ->andWhere(['resources.resource_type_id '=> $this->request->data['resource_type_id'], 'HistoricReservations.state' => $state])
                ->where(["HistoricReservations.reservation_start_date BETWEEN '".$start_date." 00:00:00' AND '".$end_date." 23:59:59'" ]);

                $date = $historic_reservations->func()->date_format(['reservation_start_date' => 'identifier', "'%d-%m-%y'" => 'literal']);
                $start_time = $historic_reservations->func()->date_format(['reservation_start_date' => 'identifier', "'%h:%i %p'" => 'literal']);
                $end_time = $historic_reservations->func()->date_format(['reservation_end_date' => 'identifier', "'%h:%i %p'" => 'literal']);
                $user = $historic_reservations->func()->concat(['user_first_name' => 'identifier', ' ', 'user_last_name' => 'identifier']);

                $historic_reservations
                    ->select([
                        'start_date' => $date,
                        'start_hour' => $start_time,
                        'end_hour' => $end_time,
                        'event_name',
                        'resource_name',
                        'user_comment',
                        'user' => $user
                    ])
                    ->order(['reservation_start_date' => 'ASC', 'reservation_end_date' => 'ASC']);

            // Pagina la tabla de recursos    
            $this->set('historic_reservations', $this->paginate($historic_reservations));
        }
        else
        {
            $this->redirect(['controller' => 'HistoricReservations','action' => 'index']);
        }
    }
    
    public function view($id = null)
    {
        if($id != null)
        {
            $historicReservations = $this->HistoricReservations->find('all')
                             ->select([ 'id',
                                        'reservation_start_date',
                                        'resource_name',
                                        'event_name',
                                        'user_username',
                                        'user_first_name',
                                        'user_last_name',
                                        'user_comment',
                                        'administrator_comment',
                                        'reservation_end_date',
                                        'resource.resource_code'
                             ])
                            ->join(['resource' => ['table' => 'resources',
                                                   'type' => 'INNER',
                                                   'conditions' => ['HistoricReservations.resource_name = resource.resource_name']
                                                  ]
                                   ])
                            ->andWhere(['HistoricReservations.id = ' => $id]);
                            
            $historicReservation = $historicReservations->first();       
            
            $user_role = $this->Auth->User('role_id');
            
            //Si el usuario es administrador
            if($user_role != 1)
            {        
                $this->set('historicReservation', $historicReservation); 
            }    
            //Si el usuario NO es administrador
            else if ($user_role == 1 && $historicReservation['user_username'] == $this->Auth->User('username')) 
            {
                $this->set('historicReservation', $historicReservation); 
            }
            else 
            {
                return $this->redirect(['controller' => 'HistoricReservations', 'action' => 'index']);
            }
        }
    }

    public function isAuthorized($user)
    {
        // Cualquier usuario puede ver las reservaciones históricas
        if ($this->request->action === 'index' && $user['role_id'] == 1)
            return true;    
        
        if ($this->request->action === 'view' && $user['role_id'] == 1)
            return true;
        
        // Solo los administradores pueden generar reportes
        if ($this->request->action === 'generateReports' && ($user['role_id'] == 2 || $user['role_id'] == 3))
            return true;
        
        return parent::isAuthorized($user);   
    }
}
