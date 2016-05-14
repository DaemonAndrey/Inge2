<?php
// src/Model/Table/ResourceTypesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Query;

class ResourceTypesTable extends Table
{
    public function initialize(array $config)
    {
        $this->hasMany('Resources');
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
                                        'message' => 'El id del tipo debe ser único'
                                       ]
                        ])
            
            /* Reglas para el campo resource_name */
            ->notEmpty('description','Este campo es requerido')
            ->add('description', ['isUnique' => ['rule' => 'validateUnique',
                                                 'provider' => 'table',
                                                 'message' => 'Ya existe este recurso'
                                                ]
                        ])
            ->add('description', ['maxLength' =>  ['rule' => ['maxLength', 20],
                                                     'message' => 'Sólo se permiten 20 caracteres'
                                                    ],
                                    'validFormat' =>  ['rule' => array('custom', '/^[0-9a-zA-ZÁáÉéÍíÓóÚúÜüÑñ._\' \-]+$/'),
                                                       'message' => 'Sólo se permiten caracteres alfanuméricos'
                                                      ]
                                   ]);
    }
    
    public function findAuth(Query $query, array $options)
    {
        $query
            ->select(['id', 'description']);

        return $query;
    }
}
?>