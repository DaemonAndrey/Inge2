<?php

// src/Model/Table/RolesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Query;

class RolesTable extends Table
{
    public function initialize(array $config)
    {
        $this->hasMany('Users');
    }
    
    
    
    /*
     * Se encarga de validar los campos para la tabla Roles
     * @param Validator $validator
     */
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('role_name', 'Ingrese el nombre del rol')
            ->add('role_name', [
                            'isUnique' => [
                                            'rule' => 'validateUnique',
                                            'provider' => 'table',
                                            'message' => 'Este rol ya existe.'
                                          ],
                            'validFormat' => [
                                            'rule' => array('custom', '/^[a-zA-Z0-9]+$/'),
                                            'message' => 'Sólo se permiten caracteres alfanuméricos.'
                                            ]
            ]);
    }    
    
    public function findAuth(Query $query, array $options)
    {
        
        
        $query->select(['id', 'role_name']);

        return $query;
    }
}

?>