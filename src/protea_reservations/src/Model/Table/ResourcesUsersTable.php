<?php
// src/Model/Table/ResourcesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Query;

class ResourcesUsersTable extends Table
{
    public function initialize(array $config)
    {
    }
    
    /*
     * Se encarga de validar los campos del formulario de agregar recurso
     * @param Validator $validator
     */
    public function validationDefault(Validator $validator)
    {
        return $validator
            
            /* Reglas para el campo id */
            ->add('id', ['isUnique' => ['rule' => 'validateUnique',
                                        'provider' => 'table',
                                        'message' => 'El id debe ser único'
                                       ]
                        ])
            
            /* Reglas para el campo resource_id */
            ->notEmpty('resource_id','Este campo es requerido')
            
            /* Reglas para el campo user_id */
            ->notEmpty('user_id','Este campo es requerido')
    }
    
    public function findAuth(Query $query, array $options)
    {
        $query
            ->select(['id', 'resource_id', 'user_id']);

        return $query;
    }
}

?>