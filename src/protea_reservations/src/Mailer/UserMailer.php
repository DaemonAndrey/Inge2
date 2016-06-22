<?php

namespace App\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{
    /* Se le envía al usuario que aceptaron su solicitud de registro. */
    public function confirmUser($user)
    {
        $this
            ->to($user->username)
            ->subject(sprintf('Bienvenid@ %s al sistema de Reservas', $user->first_name))
            ->emailFormat('html')
            ->template() // By default template with same name as method name is used.
            ->layout('default');
    }
    
    /* Se le envía al usuario que rechazaron su solicitud de registro. */
    public function rejectUser($user, $configuration)
    {
        $this
            ->to($user->username)
            ->subject($configuration->registration_rejected_message)
            ->emailFormat('html')
            ->template() // By default template with same name as method name is used.
            ->layout('default');
    }

    public function confirmReservation($user)
    {
        $this
            ->to($user->username)
            ->subject('Solicitud de Reservación ACEPTADA (Reservaciones Facultad de Educación-UCR)')
            ->emailFormat('html')
            ->template() // By default template with same name as method name is used.
            ->layout('default');
    }
    
    public function rejectReservation($user)
    {
        $this
            ->to($user->username)
            ->subject('Solicitud de Reservación RECHAZADA (Reservaciones Facultad de Educación-UCR)')
            ->emailFormat('html')
            ->template() // By default template with same name as method name is used.
            ->layout('default');
    }

    public function resetPassword($user)
    {
        $this
            ->to($user->email)
            ->subject('Reset password')
            ->set(['token' => $user->token]);
    }
}