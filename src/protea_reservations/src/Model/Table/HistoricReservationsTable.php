<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class HistoricReservationsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
    
    /**
    * Se encarga de validar los campos de la tabla HistoricReservations cuando se hace una inserción
    * @param Validor $validator
    */
    public function validationDefault(Validator $validator)
    {
        return $validator
            
            /* Reglas para el campo id */
            ->add('id', [
                'isUnique' => [
                    'rule' => 'validateUnique', 
                    'provider' => 'table', 
                    'message' => 'El id del histórico de la reservación debe ser único'
                ]
            ])
            
            /* Reglas para el campo reservation_start_date */
            ->notEmpty('reservation_start_date', 'Este campo es requerido')
            
            /* Reglas para el campo resource_name */
            ->notEmpty('resource_name', 'Este campo es requerido')
            ->add('resource_name', [
                'maxLength' => [
                    'rule' => ['maxLength', 70],
                    'message' => 'El nombre del recurso es muy extenso.'
                ],
                'validFormat' => [
                    'rule' => array('custom', '/^[0-9a-zA-ZÁáÉéÍíÓóÚúÜüÑñ._\' \-]+$/'), 
                    'message' => 'Hay caracteres no válidos'
                ]
            ])
            
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
            ])
            
            /* Reglas para el campo reservation_end_date */
            ->notEmpty('reservation_end_date', 'Este campo es requerido')
            
            /* Reglas para el campo user_username */
            ->notEmpty('user_username', 'Este campo es requerido')
            ->add('user_username', [
                'maxLength' => [
                    'rule' => ['maxLength', 64], 
                    'message' => 'El nombre de usuario es muy extenso.'
                ], 
                'validFormat' => [
                    'rule' => array('custom', '/^[a-zA-Z0-9._\-]+@ucr.ac.cr$/'), 
                    'message' => 'Debe usar el correo institucional.'
                ]
            ])
            
            /* Reglas para el campo user_first_name */
            ->notEmpty('user_first_name', 'Este campo es requerido')
            ->add('user_first_name', [
                'maxLength' => [
                    'rule' => ['maxLength', 50], 
                    'message' => 'El nombre del usuario es muy extenso.'
                ], 
                'validFormat' => [
                    'rule' => array('custom', '/^[a-zA-ZÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\' \-]+$/$/'), 
                    'message' => 'Debe contener solamente letras.'
                ]
            ])
            
            /* Reglas para el campo user_last_name */
            ->notEmpty('user_last_name', 'Este campo es requerido')
            ->add('user_last_name', [
                'maxLength' => [
                    'rule' => ['maxLength', 50], 
                    'message' => 'El campo de apellidos es muy extenso.'
                ], 
                'validFormat' => [
                    'rule' => array('custom', '/^[a-zA-ZÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\' \-]+$/$/'), 
                    'message' => 'Debe contener solamente letras.'
                ]
            ])
            
            /* Reglas para el campo user_comment */
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
            
            /* Reglas para el campo state */
            
            /* Reglas para el campo confirmation_date */
            ;
    }
}