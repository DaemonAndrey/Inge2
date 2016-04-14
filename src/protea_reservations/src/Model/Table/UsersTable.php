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
            ->notEmpty('username', 'Ingrese un correo')
            ->notEmpty('password', 'Ingrese su contraseña')
            ->notEmpty('first_name','Ingrese su nombre')
            ->notEmpty('last_name','Ingrese su apellido')
            ->notEmpty('telephone_number','Ingrese su número de teléfono')
            ->notEmpty('department','Ingrese el departamento al que pertenece')
            ->notEmpty('position','Ingrese su cargo');
    }

}

?>