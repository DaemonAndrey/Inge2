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
        /*parent::beforeFilter($event);
        
        $this->set('user_role', $this->Auth->User('role_id'));
        
        $this->pendingReservations = $this->Reservations->find('all')
            ->select(['id', 'start_date', 'end_date', 'resources.resource_name', 'event_name', 'state', 'resources.resource_code'])
            ->join([
                'users' => [
                    'table' => 'users',
                    'type' => 'INNER',
                    'conditions' => 'users.id = reservations.user_id'
                ],
                'resources_users' => [
                    'table' => 'resources_users',
                    'type' => 'INNER',
                    'conditions' => ['resources_users.user_id ='. $this->Auth->User('id'), 'resources_users.resource_id = Reservations.resource_id']
                ],
                'resources' => [
                    'table' => 'resources',
                    'type' => 'INNER',
                    'conditions' => 'resources.id = reservations.resource_id'
                ]
            ])
            ->andWhere(['reservations.state = ' => 0])
            ->order(['start_date' => 'ASC']);*/
    }
    
    /** 
     * Paginador de recursos.
     */
    public $paginate = array('limit' => 10,
                             'order' => array('HistoricReservation.start_date' => 'asc')
                            );
    
    /**
    * Carga el calendario principal con las reservas.
    * 
    */
	public function index()
	{
		
	}
    
    /*
    * Carga las reservaciones pendientes que le corresponden al administrador que está en la sesión
    */
   
    public function isAuthorized($user)
    {
        
        // Solo los administradores pueden aceptar las reservaciones pendientes
        if($this->request->action === 'index' && ($user['role_id'] == 2||$user['role_id'] == 3))
            return true;    
        
        return parent::isAuthorized($user);   
    }
}
