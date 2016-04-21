<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ReservationsController extends AppController
{
	public function index()
	{
		if($this->request->is('post'))
		{
			$resources = $this->Reservations->find()
							->select(['id','start'=>'start_date','end'=>'end_date','title'=>'user_comment'])

							->hydrate(false)
							  ->where(function ($exp, $q) {
        			return $exp->notEq('user_comment', "");
    				});
					
			
			$resources = $resources->toArray();



			$events = array();
			array_push($events, $resources);

			$events =  json_encode($events);

			$events = str_replace(".",",",$events);
			//$events = str_replace("]","",$events);		
			//$events = str_replace("[","",$events);	
			$events = substr($events, 1,strlen($events)-2);
			die($events);			
		}
	
	}
}
