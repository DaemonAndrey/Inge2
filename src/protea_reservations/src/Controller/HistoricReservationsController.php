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
    * Establece variables importantes de usuario.
    * @param Event $event
    */
    public function beforeFilter(Event $event)
    {
        $this->set('user_role', $this->Auth->User('role_id'));
        
        // Consulta para recuperar reservaciones pendientes
        $this->loadModel('HistoricReservations');
        $this->historicReservation = $this->HistoricReservations->find('all');
        
        
    }
    
    /** 
     * Paginador de recursos.
     */
     
    public $paginate = array('limit' => 10,
                             'order' => array('HistoricReservations.reservation_start_date' => 'asc')
                            );
    
    /**
    * Carga el historico de reservaciones para generar el reporte.
    * 
    */
	public function index()
	{
        //$this->set('user_role', $this->Auth->User('role_id'));
        
        /*$start_date = $this->request->data['start_date'];
        $end_date = $this->request->data['start_date'];
        
        $this->hReservations = $this->historicreservations->find('all')
        ->select(['HistoricReservations.reservation_start_date', 
                  'HistoricReservation.reservation_end_date',
                  'HistoricReservation.resource_name',
                  'HistoricReservation.event_name',
                  'HistoricReservation.user_username',
                  'HistoricReservation.user_first_name',
                  'HistoricReservation.user_last_name'])
        ->where(['HistoricReservations.reservation_start_date BETWEEN :$start_date AND :$end_date']);;*/
        
        /*$this->loadModel('HistoricReservations');
        $historicReservation = $this->HistoricReservations->find('all');
        $historicReservation->toArray();*/
        if ($this->request->is('POST'))
        {
            $this->loadModel('HistoricReservations');
            $query = $this->HistoricReservations->find('all');
            $date = $query->func()->date_format(['reservation_start_date' => 'identifier', "'%d-%m-%y'" => 'literal']);
            $start_time = $query->func()->date_format(['reservation_start_date' => 'identifier', "'%H:%i'" => 'literal']);
            $end_time = $query->func()->date_format(['reservation_end_date' => 'identifier', "'%H:%i'" => 'literal']);
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
            
            $resources = $query;
            $resources = json_encode($resources);
            
            die($resources);
        }
	}
    
    public function isAuthorized($user)
    {
        // Solo los administradores pueden aceptar las reservaciones pendientes
        if ($this->request->action === 'index' && ($user['role_id'] == 2 || $user['role_id'] == 3))
            return true;    
        
        return parent::isAuthorized($user);   
    }
}
