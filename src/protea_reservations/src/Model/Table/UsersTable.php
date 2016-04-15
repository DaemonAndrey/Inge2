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
            ->notEmpty('username', 'Ingrese su correo')
            ->notEmpty('password', 'Ingrese su contraseña')
            ->add('password', [
                            'length' => [
                                        'rule' => ['minLength', 8],
                                        'message' => 'La contraseña tiene que tener al menos 8 caractéres',
                                        ]
            ])
            ->notEmpty('first_name', 'Ingrese su nombre')
            ->add('first_name', 'validFormat', [
                                    'rule' => array('custom', '/^[a-zA-Z \-]*$/'),
                                    'message' => 'Solo ingresar letras.'
            ])
            ->notEmpty('last_name', 'Ingrese su apellido')
            ->add('last_name', 'validFormat', [
                                    'rule' => array('custom', '/^[a-zA-Z \-]*$/'),
                                    'message' => 'Solo ingresar letras.'
            ])
            ->notEmpty('telephone_number', 'Ingrese su telefono')
            ->add('telephone_number', 'validFormat', [
                                    'rule' => array('custom', '/^[0-9 \-]*$/'),
                                    'message' => 'Solo ingresar números.'
            ])
            ->notEmpty('department', 'Ingrese a la facultad o institución a la que pertenece')
            ->add('department', 'validFormat', [
                                    'rule' => array('custom', '/^[a-zA-Z \-]*$/'),
                                    'message' => 'Solo ingresar letras.'
            ])
            ->notEmpty('position', 'Seleccione una de las opciones');
    }    

}

?>