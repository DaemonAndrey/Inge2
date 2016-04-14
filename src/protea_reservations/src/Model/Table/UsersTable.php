<?php
<<<<<<< HEAD
=======

>>>>>>> 7cbe67bdf6ed4b67a272ad33193d05f3c34cab90
// src/Model/Table/UsersTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{

    public function validationDefault(Validator $validator)
    {
        return $validator
<<<<<<< HEAD
            ->notEmpty('username', 'Ingrese su correo')
            ->notEmpty('password', 'Ingrese su contraseña')
            ->notEmpty('first_name', 'Ingrese su nombre')
            ->notEmpty('last_name', 'Ingrese su apellido')
            ->notEmpty('telephone_number', 'Ingrese su telefono')
            ->notEmpty('department', 'Ingrese a la facultad o institución a la que pertenece')
            ->notEmpty('position', 'Seleccione su una de las opciones')
            ->notEmpty('role_id', ' ');
            
    }
    
    public function validationHardened(Validator $validator)
    {
        $validator = $this->validationDefault($validator);

        $validator->add('password', 'length', ['rule' => ['lengthBetween', 8, 100]]);
        return $validator;
=======
            ->notEmpty('username', 'Ingrese un correo')
            ->notEmpty('password', 'Ingrese su contraseña')
            ->notEmpty('first_name','Ingrese su nombre')
            ->notEmpty('last_name','Ingrese su apellido')
            ->notEmpty('telephone_number','Ingrese su número de teléfono')
            ->notEmpty('department','Ingrese el departamento al que pertenece')
            ->notEmpty('position','Ingrese su cargo');
>>>>>>> 7cbe67bdf6ed4b67a272ad33193d05f3c34cab90
    }

}

?>