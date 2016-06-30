<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ReservationsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->belongsTo('Users');
        $this->belongsTo('Resources');
    }
    
    /**
    * Se encarga de validar los campos del formulario de agregar una reservación
    * @param Validator $validator
    */
    public function validationDefault(Validator $validator)
    {
        return $validator
            
            /* Reglas para el campo id */
            ->add('id', [
                'isUnique' => [
                    'rule' => 'validateUnique', 
                    'provider' => 'table', 
                    'message' => 'El id de la reservación debe ser único'
                ]
            ])
            
            /* Reglas para el campo start_date */
            ->notEmpty('start_date', 'Este campo es requerido')
            
            /* Reglas para el campo end_date */
            ->notEmpty('end_date', 'Este campo es requerido')
            
            /* Reglas para el campo resource_id */
            ->notEmpty('resource_id', 'Este campo es requerido')
            
            /* Reglas para el campo user_comment */
            ->allowEmpty('user_comment')
            ->add('user_comment', [
                'maxLength' => [
                    'rule' => ['maxLength', 500], 
                    'message' => 'El comentario es muy extenso.'
                ], 
                'validFormat' => [
                    'rule' => array('custom', '/^[0-9a-zA-ZÁáÉéÍíÓóÚúÜüÑñ"#$%&:.,_\' \- \n \r]*$/'), 
                    'message' => 'Hay caracteres no válidos'
                ]
            ])
            
            /* Reglas para el campo administrator_comment */
            ->allowEmpty('administrator_comment')
            ->add('administrator_comment', [
                'maxLength' => [
                    'rule' => ['maxLength', 500], 
                    'message' => 'El comentario es muy extenso.'
                ], 
                'validFormat' => [
                    'rule' => array('custom', '/^[0-9a-zA-ZÁáÉéÍíÓóÚúÜüÑñ"#$%&:.,_\' \- \n \r]*$/'), 
                    'message' => 'Hay caracteres no válidos'
                ]
            ])
            
            /* Reglas para el campo user_id */
            ->notEmpty('user_id', 'Este campo es requerido')
            
            /* Reglas para el campo event_name */
            ->notEmpty('event_name', 'Este campo es requerido')
            ->add('event_name', [
                'maxLength' => [
                    'rule' => ['maxLength', 70], 
                    'message' => 'El evento o nombre del curso es muy extenso.'
                ], 
                'validFormat' => [
                    'rule' => array('custom', '/^[0-9a-zA-ZÁáÉéÍíÓóÚúÜüÑñ._\' \-]+$/'), 
                    'message' => 'Hay caracteres no válidos'
                ]
            ]);
            
            /* Reglas para el campo state */
    }
    
    /*
     * Se encarga de validar los campos del formulario de editar reservaciones
     * @param Validator $validator
     */
    public function validationUpdate(Validator $validator)
    {
        return $validator
            /* Reglas para el campo user_comment */
            ->allowEmpty('user_comment')
            ->add('user_comment', [
                'maxLength' => [
                    'rule' => ['maxLength', 500], 
                    'message' => 'El comentario es muy extenso.'
                ], 
                'validFormat' => [
                    'rule' => array('custom', '/^[0-9a-zA-ZÁáÉéÍíÓóÚúÜüÑñ"#$%&:.,_\' \- \n \r]*$/'), 
                    'message' => 'Hay caracteres no válidos'
                ]
            ])
            
            /* Reglas para el campo administrator_comment */
            ->allowEmpty('administrator_comment')
            ->add('administrator_comment', [
                'maxLength' => [
                    'rule' => ['maxLength', 500], 
                    'message' => 'El comentario es muy extenso.'
                ], 
                'validFormat' => [
                    'rule' => array('custom', '/^[0-9a-zA-ZÁáÉéÍíÓóÚúÜüÑñ"#$%&:.,_\' \- \n \r]*$/'), 
                    'message' => 'Hay caracteres no válidos'
                ]
            ]);
    }
}
