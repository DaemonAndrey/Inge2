<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

class ReservationsController extends AppController
{    
	public function index()
	{

		/**El siguiente query obtiene todos los tipos de recursos que existen en la base **/	
			$this->loadModel('ResourceTypes');
        
			$resource_type = $this->ResourceTypes->find()
							->hydrate(false)
							->select(['description']);
							
			$resource_type = $resource_type->toArray();
        
            
        if($this->Auth->user())
        {
            // Nueva entidad 'Reservación'
            $reservation = $this->Reservations->newEntity();  


            if($this->request->is('post'))
            {
                $resources = $this->Reservations->find()
                                ->select(['id','start'=>'start_date','end'=>'end_date','title'=>'reservation_title'])

                                ->hydrate(false);
                                  /*->where(function ($exp, $q) {
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
                
                // Para guardar la reservación en la base de datos

                $reservation = $this->Reservations->pathEntity($reservation, $this->request->data);
                

                try
                {
                    // Si pudo guardar en la tabla 'Reservations'
                    if ($this->Reservations->save($reservation))
                    {
                        $this->Flash->success('Se ha agregado la nueva Reservación', ['key' => 'addReservationSuccess']);
                        return $this->redirect(['controller' => 'Reservations','action' => 'index']);

                    }
                }
                catch(Exception $ex)
                {
                    $this->Flash->error('No se ha podido agregar la reservación', ['key' => 'addReservationError']);
                }

            }
            $this->set('types',$resource_type);
            $this->set('reservation', $reservation);
        }
    }

    public function isAuthorized($user)
    {

        // Todos los usuarios se pueden registrar
        
        if ($this->request->action === 'index') {
            return true;            
        }

        return parent::isAuthorized($user);

        
    }


}
