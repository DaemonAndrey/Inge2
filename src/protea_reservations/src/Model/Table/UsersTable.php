<?php

// src/Model/Table/UsersTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('username', 'Ingrese su correo institucional')
            ->add('username', 'validFormat', [
                                    'rule' => array('custom', '/^[a-zA-Z0-9._ \-]*@ucr.ac.cr$/'),
                                    'message' => 'Debe usar el correo institucional.'
            ])
            ->notEmpty('password', 'Ingrese su contraseña')
            ->add('password', [
                            'length' => [
                                        'rule' => ['minLength', 8],
                                        'message' => 'Debe contener mínimo 8 caracteres.',
                                        ]
            ])
            ->notEmpty('first_name', 'Ingrese su nombre')
            ->add('first_name', 'validFormat', [
                                    'rule' => array('custom', '/^[a-zA-ZÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\' \-]*$/'),
                                    'message' => 'Debe contener solamente letras.'
            ])
            ->notEmpty('last_name', 'Ingrese su apellido')
            ->add('last_name', 'validFormat', [
                                    'rule' => array('custom', '/^[a-zA-ZÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\' \-]*$/'),
                                    'message' => 'Debe contener solamente letras.'
            ])
            ->notEmpty('telephone_number', 'Ingrese su telefono')
            ->add('telephone_number', 'validFormat', [
                                    'rule' => array('custom', '/^[0-9 \-]*$/'),
                                    'rule' => ['minLength', 8],
                                    'message' => 'Debe contener al menos 8 dígitos'
            ])
            ->notEmpty('department', 'Ingrese a la facultad o institución a la que pertenece')
            ->add('department', 'validFormat', [
                                    'rule' => array('custom', '/^[a-zA-ZÁÉÍÓÚÑáéíóúñ\' \-]*$/'),
                                    'message' => 'Debe contener solamente letras.'
            ])
            ->notEmpty('position', 'Seleccione una opción.');
    }    
    
    public function registrationConfirmed($userId)
    {
        $user = $this->get($userId);
        
        // Si el usuario tiene estado 0 es porque todavía está pendiente su solicitud de registro
        if($user['state'] == 0)
            return false;
        
        return true;
    }
}

?>