<?php

// src/Model/Table/ConfigurationsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Query;

class ConfigurationsTable extends Table
{
    public function initialize(array $config)
    {

    }
    
    /*
     * Se encarga de validar los campos del formulario de la configuracion
     * @param Validator $validator
     */
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('registration_rejected_subject', 'Ingrese el mensaje de rechazo de registro.')
            ->add('registration_rejected_subject', [
                            'validFormat' => [
                                            'rule' => array('custom', '/^[0-9a-zA-ZÁáÉéÍíÓóÚúÜüÑñ.,;!¡\-()@\' ]+$/'),
                                            'message' => 'Debe usar solamente letras, números o signos (,;.¡!-()@).'
                                            ]
            ])
            
            ->notEmpty('registration_rejected_subject', 'Ingrese el mensaje de rechazo de registro.')
            ->add('registration_rejected_subject', [
                            'validFormat' => [
                                            'rule' => array('custom', '/^[0-9a-zA-ZÁáÉéÍíÓóÚúÜüÑñ.,;!¡\-()@\' ]+$/'),
                                            'message' => 'Debe usar solamente letras, números o signos (,;.¡!-()@).'
                                            ]
            ])
            
            ->notEmpty('registration_rejected_subject', 'Ingrese el mensaje de rechazo de registro.')
            ->add('registration_rejected_subject', [
                            'validFormat' => [
                                            'rule' => array('custom', '/^[0-9a-zA-ZÁáÉéÍíÓóÚúÜüÑñ.,;!¡\-()@\' ]+$/'),
                                            'message' => 'Debe usar solamente letras, números o signos (,;.¡!-()@).'
                                            ]
            ])
            
            ->notEmpty('registration_rejected_subject', 'Ingrese el mensaje de rechazo de registro.')
            ->add('registration_rejected_subject', [
                            'validFormat' => [
                                            'rule' => array('custom', '/^[0-9a-zA-ZÁáÉéÍíÓóÚúÜüÑñ.,;!¡\-()@\' ]+$/'),
                                            'message' => 'Debe usar solamente letras, números o signos (,;.¡!-()@).'
                                            ]
            ])
            
            
            ->notEmpty('registration_rejected_message', 'Ingrese el mensaje de rechazo de registro.')
            ->add('registration_rejected_message', [
                            'validFormat' => [
                                            'rule' => array('custom', '/^[0-9a-zA-ZÁáÉéÍíÓóÚúÜüÑñ.,;!¡\-()@\' ]+$/'),
                                            'message' => 'Debe usar solamente letras, números o signos (,;.¡!-()@).'
                                            ]
            ])
            
            ->notEmpty('registration_accepted_message', 'Ingrese el mensaje de aceptación de registro.')
            ->add('registration_accepted_message', [
                            'validFormat' => [
                                            'rule' => array('custom', '/^[0-9a-zA-ZÁáÉéÍíÓóÚúÜüÑñ.,;!¡\-()@\' ]+$/'),
                                            'message' => 'Debe usar solamente letras, números o signos (,;.¡!-()@).'
                                            ]
            ])
            
            ->notEmpty('reservation_rejected_message', 'Ingrese el mensaje de rechazo de reservación.')
            ->add('reservation_rejected_message', [
                            'validFormat' => [
                                            'rule' => array('custom', '/^[0-9a-zA-ZÁáÉéÍíÓóÚúÜüÑñ.,;!¡\-()@\' ]+$/'),
                                            'message' => 'Debe usar solamente letras, números o signos (,;.¡!-()@).'
                                            ]
            ])
            
            ->notEmpty('reservation_accepted_message', 'Ingrese el mensaje de aceptación de reservación.')
            ->add('reservation_accepted_message', [
                            'validFormat' => [
                                            'rule' => array('custom', '/^[0-9a-zA-ZÁáÉéÍíÓóÚúÜüÑñ.,;!¡\-()@\' ]+$/'),
                                            'message' => 'Debe usar solamente letras, números o signos (,;.!¡-()@).'
                                            ]
            ])
            
            ->notEmpty('reservation_start_hour', 'Ingrese la hora de inicio para las reservaciones.')
            ->add('reservation_start_hour', [
                                    'lengthBetween' => ['rule' => ['lengthBetween', 1, 2],
                                                        'message' => ('Digite una hora válida.')],
                                    'validFormat' =>   ['rule' => array('custom', '/^[0-9 \-\+]+$/'),
                                                        'message' => ('Debe contener solamente números.')]   
            ])
            
            ->notEmpty('reservation_end_hour', 'Ingrese la hora final para las reservaciones.')
            ->add('reservation_start_hour', [
                                    'lengthBetween' => ['rule' => ['lengthBetween', 1, 2],
                                                        'message' => ('Digite una hora válida.')],
                                    'validFormat' =>   ['rule' => array('custom', '/^[0-9 \-\+]+$/'),
                                                        'message' => ('Debe contener solamente números.')]   
            ]);
            
    }
    
    public function findAuth(Query $query, array $options)
    {
        $query
            ->select(['id', 'username', 'password','role_id'])
            ->where(['Users.state' => 1]);

        return $query;
    }
}

?>