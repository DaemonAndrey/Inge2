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
        $this->set('user_role', $this->Auth->User('role_id'));
        
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
        $this->loadModel('HistoricReservations');
        $historicReservation = $this->HistoricReservations->find('all');
        $historicReservation->toArray();
        
		
	}
    
    public function isAuthorized($user)
    {
        
        // Solo los administradores pueden aceptar las reservaciones pendientes
        if($this->request->action === 'index' && ($user['role_id'] == 2||$user['role_id'] == 3))
            return true;    
        
        return parent::isAuthorized($user);   
    }
}
