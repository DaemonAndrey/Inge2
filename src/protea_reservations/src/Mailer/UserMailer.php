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
            ->subject($configuration->reservation_accepted_subject)
            ->emailFormat('html')
            ->template() // By default template with same name as method name is used.
            ->layout('default');
    }
    
    /* Se le envía al usuario que rechazaron su solicitud de registro. */
    public function rejectUser($user, $configuration)
    {
        $this
            ->to($user->username)
            ->subject($configuration->registration_rejected_subject)
            ->emailFormat('html')
            ->template() // By default template with same name as method name is used.
            ->layout('default');
    }

    public function confirmReservation($user, $configuration)
    {
        $this
            ->to($user->username)
            ->subject($configuration->reservation_accepted_subject)
            ->emailFormat('html')
            ->template() // By default template with same name as method name is used.
            ->layout('default');
    }
    
    public function rejectReservation($user, $configuration)
    {
        $this
            ->to($user->username)
            ->subject($configuration->reservation_rejected_subject)
            ->emailFormat('html')
            ->template() // By default template with same name as method name is used.
            ->layout('default');
    }

    public function resetPassword($user, $configuration)
    {
        $this
            ->to($user->email)
            ->subject('Reset password')
            ->set(['token' => $user->token]);
    }
}