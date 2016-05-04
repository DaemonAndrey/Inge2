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
            ->notEmpty('resource_type','Este campo es requerido')
            ->add('resource_type', ['maxLength' =>  ['rule' => ['maxLength', 20],
                                                     'message' => 'Sólo se permiten 20 caracteres'
                                                    ],
                                    'validFormat' =>  ['rule' => array('custom', '/^[0-9a-zA-ZÁáÉéÍíÓóÚúÜüÑñ._\' \-]+$/'),
                                                       'message' => 'Sólo se permiten caracteres alfanuméricos'
                                                      ]
                                   ])
            
            /* Reglas para el campo resource_name */
            ->notEmpty('resource_name','Este campo es requerido')
            ->add('resource_name', ['isUnique' => ['rule' => 'validateUnique',
                                                   'provider' => 'table',
                                                   'message' => 'Este recurso ya existe'
                                                  ]
                                   ])
            ->add('resource_name', ['maxLength' =>  ['rule' => ['maxLength', 70],
                                                     'message' => 'Sólo se permiten 70 caracteres'
                                                    ],
                                    'validFormat' =>  ['rule' => array('custom', '/^[0-9a-zA-ZÁáÉéÍíÓóÚúÜüÑñ._\' \-]+$/'),
                                                       'message' => 'Sólo se permiten caracteres alfanuméricos'
                                                      ]
                                   ])
            
            /* Reglas para el campo description */
            ->add('resource_name', ['maxLength' =>  ['rule' => ['maxLength', 500],
                                                     'message' => 'La descripción es muy larga'
                                                    ],
                                    'validFormat' =>  ['rule' => array('custom', '/^[0-9a-zA-ZÁáÉéÍíÓóÚúÜüÑñ"#$%&:.,_\' \-]+$/'),
                                                       'message' => 'Hay caracteres no válidos'
                                                      ]
                                   ]);
    }
    
    public function findAuth(Query $query, array $options)
    {
        $query
            ->select(['id', 'resource_type', 'resource_name','description']);

        return $query;
    }
}


?>