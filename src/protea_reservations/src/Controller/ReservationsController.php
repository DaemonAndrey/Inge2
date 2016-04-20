<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ReservationsController extends AppController
{
	public function index()
	{
		$this->loadModel('Users');
		
		$resources = $this->Users->find()
					->hydrate(false);
		/**
		$resources = $resources->toArray();
		$this->set('resources',$resources);
		**/
	}
}
