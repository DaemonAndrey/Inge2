<!-- src/Template/Resources/edit.ctp -->
<?php echo $this->Html->css('registro.css'); ?>

<div class="configurations form">
    <!-- MENSAJES -->
    <div style="text-align:center; color:red">

        
        
        <br>
    </div>
        
    <?= $this->Form->create($configuration) ?>

    <!-- TÍTULO -->
    <div class="row">
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <legend>
                <div class='text-center'>
                    <h2>Configuraciones</h2>
                    <br>
                </div>
            </legend>
        </div>
    </div> <!-- FIN TÍTULO -->

   
    <!-- CAMPOS A LLENAR -->
    <fieldset>
        
        <div class="col-xs-12 text-center">
            <h3>Configuraciones de Registro</h3>
            <br>
        </div>

        
        <div class="row">
            <!-- ASUNTO DEL MENSAJE DE REGISTRO ACEPTADO -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                    <?=
                        $this->Form->input('Configurations.registration_accepted_subject', ['label' => 'Asunto de mensaje de registro aceptado: ',
                                                                                            'class' => 'form-control',
                                                                                            'type' => 'text']);
                    ?>
                <br>
            </div>
            <!-- ASUNTO DEL MENSAJE DE REGISTRO RECHAZADO -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-0 col-sm-offset-0 col-xs-offset-1'>
                    <?=
                        $this->Form->input('Configurations.registration_rejected_subject', ['label' => 'Asunto de mensaje de registro rechazado: ',
                                                                                            'class' => 'form-control',
                                                                                            'type' => 'text']);
                    ?>
                <br>
            </div>
        </div>
                
        
        <div class="row">
            <!-- MENSAJE DE REGISTRO ACEPTADO -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                    <?=
                        $this->Form->input('Configurations.registration_accepted_message', ['label' => 'Mensaje de registro aceptado: ',
                                                                                            'class' => 'form-control',
                                                                                            'type' => 'textarea']);
                    ?>
                <br>
            </div>
            <!-- MENSAJE DE REGISTRO RECHAZADO -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-0 col-sm-offset-0 col-xs-offset-1'>
                    <?=
                        $this->Form->input('Configurations.registration_rejected_message', ['label' => 'Mensaje de registro rechazado: ',
                                                                                            'class' => 'form-control',
                                                                                            'type' => 'textarea']);
                    ?>
                <br>
            </div>
        </div>  
        

        <hr>

        <div class="col-xs-12 text-center">
            <h3>Configuraciones de Reservaciones</h3>
            <br>
        </div>
         
        <div class="row">
            <!-- ASUNTO DEL MENSAJE DE RESERVACION ACEPTADA -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                    <?=
                        $this->Form->input('Configurations.reservation_accepted_subject', ['label' => 'Asunto de mensaje de reservación aceptada: ',
                                                                                            'class' => 'form-control',
                                                                                            'type' => 'text']);
                    ?>
                <br>
            </div>
            <!-- ASUNTO DEL MENSAJE DE RESERVACION RECHAZADA -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-0 col-sm-offset-0 col-xs-offset-1'>
                    <?=
                        $this->Form->input('Configurations.reservation_rejected_subject', ['label' => 'Asunto de mensaje de reservación rechazada: ',
                                                                                            'class' => 'form-control',
                                                                                            'type' => 'text']);
                    ?>
                <br>
            </div>
        </div>
        
        
        <div class="row">
            <!-- MENSAJE DE RESERVACION ACEPTADA -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                    <?=
                        $this->Form->input('Configurations.reservation_accepted_message', ['label' => 'Mensaje de reservación aceptada: ',
                                                                                            'class' => 'form-control',
                                                                                            'type' => 'textarea']);
                    ?>
                <br>
            </div>
            <!-- MENSAJE DE RESERVACION RECHAZADA -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-0 col-sm-offset-0 col-xs-offset-1'>
                    <?=
                        $this->Form->input('Configurations.reservation_rejected_message', ['label' => 'Mensaje de reservación rechazada: ',
                                                                                            'class' => 'form-control',
                                                                                            'type' => 'textarea']);
                    ?>
                <br>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xs-12 text-center">
                <h3>Horario de Reservaciones</h3>
            </div>
            <!-- HORA DE INICIO -->
            <div class='col-md-3 col-sm-2 col-xs-6 col-md-offset-3 col-sm-offset-4 col-xs-offset-3 col-lg-2 col-lg-offset-4'>
                <?= 
                    $this->Form->input('Configurations.reservation_start_hour', ['label' => 'Desde las: ',
                                                                                            'class' => 'form-control']);
                ?>
                <br>
            </div>
            <!-- HORA DE FIN -->
            <div class='col-md-3 col-sm-2 col-xs-6 col-md-offset-0 col-sm-offset-0 col-xs-offset-3 col-lg-2'>
               <?= 
                    $this->Form->input('Configurations.reservation_end_hour', ['label' => 'Hasta las: ',
                                                                                          'class' => 'form-control']);
                ?>
                <br>
            </div>
        </div>
    </fieldset> <!-- FIN CAMPOS A LLENAR -->

    <!-- BOTONES -->
    <div class='row  text-center' id="btnEdit">
        <div class='col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1'>
            <br>
            <?= $this->Form->button('Actualizar', ['class' => 'btn btn-success', 'style' => 'width:90px']); ?>
            <?= $this->Html->link('Regresar', array('controller' => 'reservations','action'=> 'manage'), array( 'class' => 'btn btn-primary', 'style' => 'width:90px')) ?>
        </div>
    </div> <!-- FIN BOTONES -->

    <legend>
        <br>
    </legend>

    <?= $this->Form->end() ?>
</div>