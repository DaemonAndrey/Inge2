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
        $this->loadModel('ResourceTypes');
        $options = $this->ResourceTypes->find('list',['keyField' => 'id',
                                                      'valueField' => 'description'])->toArray();
        
        $this->set('resource_types_options', $options);
        $this->loadModel('HistoricReservations');
         if($this->Auth->user())
        {
             // Nueva entidad 'Resource'
            $historic = $this->HistoricReservations->newEntity();
            
             if ($this->request->is('post')){
            //Carga la informacion que se obtiene en el formulario    
                $start_date = $this->request->data['start_date'];
                $end_date = $this->request->data['start_date'];
                $resource_type=$this->request->data['resource_type'];
                $debug($resource_type);
                    
                //Redirigir a la vista de la tabla de reportes
                $this->redirect(['controller' => 'HistoricReservations','action' => 'table', $start_date,$end_date,$resource_type]);
             }
             
            $this->set('historic', $historic);
	   }
    }
    public function index2()
	{
        $this->set('user_role', $this->Auth->User('role_id'));
        $this->loadModel('ResourceTypes');
        $options = $this->ResourceTypes->find('list',['keyField' => 'id',
                                                      'valueField' => 'description'])->toArray();
        
        $this->set('resource_types_options', $options);
        $this->loadModel('HistoricReservations');
         if($this->Auth->user())
        {
             // Nueva entidad 'Resource'
            $historic = $this->HistoricReservations->newEntity();
            
             if ($this->request->is('post')){
            //Carga la informacion que se obtiene en el formulario    
                $start_date = $this->request->data['start_date'];
                $end_date = $this->request->data['start_date'];
                $resource_type=$this->request->data['resource_type'];
                    
                //Redirigir a la vista de la tabla de reportes
                $this->redirect(['controller' => 'HistoricReservations','action' => 'table', $start_date,$end_date,$resource_type]);
             }
             
            $this->set('historic', $historic);
	   }
    }
    
    public function table($start_date, $end_date, $resource_type)
	{
        $this->loadModel('HistoricReservations');
        /*$this->loadModel('Users');
        $user*/
        $historic_reservations = $this->HistoricReservations->find()
            ->select(['HistoricReservations.reservation_start_date', 
                  'HistoricReservations.reservation_end_date',
                  'HistoricReservations.resource_name',
                  'HistoricReservations.event_name',
                  'HistoricReservations.user_username',
                  'HistoricReservations.user_first_name',
                  'HistoricReservations.user_last_name'])
            ->where(['HistoricReservations.user_username'=>$this->Auth->User('username')])
            ->where(['HistoricReservations.reservation_start_date BETWEEN :start_date AND :end_date'])
            ->where(['HistoricReservations.reservation_end_date BETWEEN :start_date AND :end_date'])
            ->bind(':start_date', $start_date)
            ->bind(':end_date', $end_date)
            ;
        debug($resource_type);

            // Pagina la tabla de recursos
        $this->set('historic_reservations', $this->paginate($historic_reservations));
    }
    
    public function isAuthorized($user)
    {
        
        // Solo los administradores pueden aceptar las reservaciones pendientes
        if($this->request->action === 'index' && ($user['role_id'] == 2||$user['role_id'] == 3))
            return true;    
        
        return parent::isAuthorized($user);   
    }
}
