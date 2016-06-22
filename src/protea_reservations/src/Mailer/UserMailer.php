<?php

namespace App\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{
    /* Se le envía al usuario que aceptaron su solicitud de registro. */
    public function confirmUser($user, $configuration)
    {
        $this
            ->to($user->username)
            ->subject($configuration->registration_accepted_subject)
            ->emailFormat('html')
            ->template('default_message') // By default template with same name as method name is used.
            ->layout('default')
            ->viewVars(['mensaje' => $configuration->registration_accepted_message]);
            
    }
    
    /* Se le envía al usuario que rechazaron su solicitud de registro. */
    public function rejectUser($user, $configuration)
    {
        $this
            ->to($user->username)
            ->subject($configuration->registration_rejected_subject)
            ->emailFormat('html')
            ->template('default_message') // By default template with same name as method name is used.
            ->layout('default')
            ->viewVars(['mensaje' => $configuration->registration_rejected_message]);
    }

    public function confirmReservation($userEmail, $configuration)
    {
        $this
            ->to($userEmail)
            ->subject($configuration->reservation_accepted_subject)
            ->emailFormat('html')
            ->template('default_message') // By default template with same name as method name is used.
            ->layout('default')
            ->viewVars(['mensaje' => $configuration->reservation_accepted_message]);
    }
    
    public function rejectReservation($userEmail, $configuration)
    {
        $this
            ->to($userEmail)
            ->subject($configuration->reservation_rejected_subject)
            ->emailFormat('html')
            ->template('default_message') // By default template with same name as method name is used.
            ->layout('default')
            ->viewVars(['mensaje' => $configuration->reservation_rejected_message]);
    }

    public function resetPassword($user, $configuration)
    {
        $this
            ->to($user->email)
            ->subject('Reset password')
            ->set(['token' => $user->token]);
    }
}