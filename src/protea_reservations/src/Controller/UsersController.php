<?php
<<<<<<< HEAD


=======
>>>>>>> 7cbe67bdf6ed4b67a272ad33193d05f3c34cab90
// src/Controller/UsersController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('add');
    }

     public function index()
     {
        $this->set('users', $this->Users->find('all'));
    }

    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
<<<<<<< HEAD
                $this->Flash->success(__('La solicitud de registro se envió con éxito, espere su confirmación.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('No se pudo enviar su solicitud de registro.'));
=======
                $this->Flash->success(__('Su solicitud ha sido procesada, espere la confirmación.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('No ha sido posible procesar su solicitud.'));
>>>>>>> 7cbe67bdf6ed4b67a272ad33193d05f3c34cab90
        }
        $this->set('user', $user);
    }

}

?>