<?php
// src/Model/Table/ResourcesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Query;

class ResourcesTable extends Table
{
    public function initialize(array $config)
    {
        $this->belongsTo('ResourceTypes');
        $this->hasMany('Reservations');
        $this->belongsToMany('Users');
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
                                        'message' => 'El id del recurso debe ser único'
                                       ]
                        ])
            
            /* Reglas para el campo resource_type */
            ->notEmpty('resource_type_id','Este campo es requerido')
            
            /* Reglas para el campo resource_name */
            ->notEmpty('resource_name','Este campo es requerido')
            ->add('resource_name', ['maxLength' =>  ['rule' => ['maxLength', 70],
                                                     'message' => 'Sólo se permiten 70 caracteres'
                                                    ],
                                    'validFormat' =>  ['rule' => array('custom', '/^[0-9a-zA-ZÁáÉéÍíÓóÚúÜüÑñ._\' \-]+$/'),
                                                       'message' => 'Sólo se permiten caracteres alfanuméricos'
                                                      ]
                                   ])
            
            /* Reglas para el campo resource_code */
            ->notEmpty('resource_code','Este campo es requerido')
            ->add('resource_code', ['isUnique' => ['rule' => 'validateUnique',
                                                   'provider' => 'table',
                                                   'message' => 'Esta placa/serie ya existe'
                                                  ]
                                   ])
            
            /* Reglas para el campo description */
            ->notEmpty('description','Este campo es requerido')
            ->add('description', ['maxLength' =>  ['rule' => ['maxLength', 500],
                                                     'message' => 'La descripción es muy larga'
                                                    ],
                                    'validFormat' =>  ['rule' => array('custom', '/^[0-9a-zA-ZÁáÉéÍíÓóÚúÜüÑñ"#$%&:.,_\' \- \n \r]+$/'),
                                                       'message' => 'Hay caracteres no válidos'
                                                      ]
                                   ]);
    }
    
    public function findAuth(Query $query, array $options)
    {
        $query
            ->select(['id', 'resource_type_id', 'resource_name', 'resource_code', 'description', 'active']);

        return $query;
    }
}
?>