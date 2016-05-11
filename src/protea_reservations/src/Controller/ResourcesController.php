<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ResourcesController extends AppController
{    

	public function getResources($resource_type, $start, $end)
	{
        if($this->request->is("POST"))
        {

        /** Obtengo el id del tipo que el usuario escogió **/

            $id = $this->Resources->ResourceTypes->find()
                    ->hydrate(false)
                    ->select(['id'])
                    ->where(['description'=>$resource_type]);

            $id = $id->toArray();

            $id = $id[0]['id'];


            $subquery = $this->Resources->Reservations->find()
                    ->hydrate(false)
                    ->select(['r.resource_name'])
                    ->join([
                         'table'=>'resources',
                         'alias'=>'r',
                         'type' => 'RIGHT',
                         'conditions'=>'r.id = Reservations.resource_id',
                        ])
                    ->andwhere(['r.resource_type'=>$id, 'TIME(Reservations.start_date) >='=>$start, 'TIME(Reservations.end_date) <='=>$end]);



            $query = $this->Resources->Reservations->find()
                    ->hydrate(false)
                    ->select(['resource.resource_name'])
                    ->join([
                         'table'=>'resources',
                         'alias'=>'resource',
                         'type' => 'RIGHT',
                         'conditions'=>'resource.id = Reservations.resource_id',
                        ])
                    ->andwhere(['resource.resource_name NOT IN'=>$subquery, 'resource.resource_type'=>$id])
                    ->group(['resource.resource_name']);


            $query = $query->toArray();



            $query = json_encode($query);

           die($query);
        }

	}

    public function isAuthorized($user)
    {

        // Todos los usuarios se pueden registrar
        
        if ($this->request->action === 'getResources') {
            return true;            
        }

        return parent::isAuthorized($user);

        
    }


}
