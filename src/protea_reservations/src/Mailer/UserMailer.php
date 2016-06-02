<?php

namespace App\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{
    /* Se le envía al usuario que aceptaron su solicitud de registro. */
    public function welcome($user)
    {
        $this
            ->to($user->username)
            ->subject(sprintf('Bienvenid@ %s al sistema de Reservas', $user->first_name))
            ->emailFormat('html')
            ->template() // By default template with same name as method name is used.
            ->layout('default');
    }

    public function confirm($user)
    {
        $this
            ->to($user->username)
            ->subject('Solicitud de Registro de Cuenta (Reservaciones Facultad de Educación-UCR)')
            ->emailFormat('html')
            ->template() // By default template with same name as method name is used.
            ->layout('default');
    }

    /* Se le envía al usuario que rechazaron su solicitud de registro. */
    public function reject($user)
    {
        $this
            ->to($user->username)
            ->subject('Solicitud de Registro de Cuenta (Reservaciones Facultad de Educación-UCR)')
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