<?php

namespace App\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{
    public function welcome($user)
    {
        $this
            ->to($user->username)
            ->subject(sprintf('Bienvenid@ %s', $user->first_name))
            ->emailFormat('html')
            ->template() // By default template with same name as method name is used.
            ->layout('default');
    }
    
    public function rejected($user)
    {
        $this
            ->to($user->username)
            ->subject(sprintf('Solicitud rechazada.', $user->first_name))
            ->emailFormat('html')
            ->template() // By default template with same name as method name is used.
            ->layout('default');
    }

    public function confirm($user)
    {
        $this
            ->to($user->username)
            ->subject('Reservaciones PROTEA')
            ->emailFormat('html')
            ->template() // By default template with same name as method name is used.
            ->layout('default');
    }

    public function reject($user)
    {
        $this
            ->to($user->username)
            ->subject('Reservaciones PROTEA')
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