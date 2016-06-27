<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;


class HistoricReservationsController extends AppController
{
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
    
    public function index()
    {
        if ($this->Auth->user())
        {
            $historicReservations = $this->HistoricReservations->find('all');

            $this->set('historicReservations', $this->paginate($historicReservations));
        }
    }
    
    /**
    * Carga el historico de reservaciones para generar el reporte.
    * 
    */
	public function generateReports()
	{
        if ($this->request->is('POST'))
        {
            $query = $this->HistoricReservations->find('all')
                ->join(['resources' => ['table' => 'resources',
                                    'type' => 'INNER',
                                    'conditions' => ['resources.resource_name = HistoricReservations.resource_name']
                                   ],
                        'resources_users' => ['table' => 'resources_users',
                                             'type' => 'INNER',
                                             'conditions' => ['resources.id = resources_users.resource_id']
                                             ],
                        'users' => ['table' => 'users',
                                   'type' => 'INNER',
                                   'conditions' => ['users.id = resources_users.user_id', 'users.id = ' => $this->Auth->User('id')]
                                   ]
                   ]);
            $date = $query->func()->date_format(['reservation_start_date' => 'identifier', "'%d-%m-%y'" => 'literal']);
            $start_time = $query->func()->date_format(['reservation_start_date' => 'identifier', "'%h:%i %p'" => 'literal']);
            $end_time = $query->func()->date_format(['reservation_end_date' => 'identifier', "'%h:%i %p'" => 'literal']);
            $user = $query->func()->concat(['user_first_name' => 'identifier', ' ', 'user_last_name' => 'identifier']);
            
            $query->select([
                'start_date' => $date,
                'start_hour' => $start_time,
                'end_hour' => $end_time,
                'event_name',
                'resource_name',
                'user_comment',
                'user' => $user
            ])
            ->order(['reservation_start_date' => 'ASC', 'reservation_end_date' => 'ASC']);
            
            $query = json_encode($query);
            
            die($query);
        }
	}
    
    public function isAuthorized($user)
    {
        // Cualquier usuario puede ver las reservaciones históricas
        if ($this->request->action === 'index')
            return true;    
        
        // Solo los administradores pueden generar reportes
        if ($this->request->action === 'generateReports' && ($user['role_id'] == 2 || $user['role_id'] == 3))
            return true;
        
        return parent::isAuthorized($user);   
    }
}
