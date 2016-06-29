<?php echo $this->Html->css('reservations.css'); ?>

<div class="historicReservations form">
    <?= $this->Form->create($historicReservation) ?>
    
    <!-- TÍTULO -->
    <div class="row">
        <div class="col-xs-12">
            <legend>
                <div class="text-center">
                    <h2>Reservación de <?= $this->Form->label('HistoricReservations.resource_name', $historicReservation['resource_name']); ?></h2>
                    <br>
                </div>
            </legend>
        </div>
    </div>
    <!-- FIN DE TÍTULO -->
    
    <!-- CAMPOS A MOSTRAR -->
    <fieldset>
        <div class="row">        
            <!-- PLACA / MODELO DEL RECURSO -->
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="col-md-8 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                    <?= $this->Form->label('HistoricReservations.resource_code', 'Placa / Modelo:'); ?>
                </div>
                <div class="col-md-8 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                    <?= $this->Form->label('HistoricReservations.resource_id', 
                                           $historicReservation['resource']['resource_code'], 
                                           ['class' => 'form-control',
                                            'style' => 'display:inline-table;',
                                            'readonly' => 'readonly',
                                            'templates' => ['formGroup' => '<div>{{label}}</div>']
                                           ]);
                    ?>
                </div>
                <div class="col-xs-12">
                    <br>
                </div>
            </div>

            <!-- FECHA DE RESERVACIÓN -->
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="col-md-8 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                    <?= $this->Form->label('HistoricReservations.reservation_start_date', 'Fecha de reservación:'); ?>
                </div>
                
                <div class="col-md-8 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                    <?php 
                        $mesIngles = strftime('%b', strtotime($historicReservation->reservation_start_date));
                        $mesEspanol = '';    

                        switch($mesIngles)
                        {
                            case 'Jan':
                                $mesEspanol = 'ene';
                                break;
                            case 'Feb':
                                $mesEspanol = 'feb';
                                break;
                            case 'Mar':
                                $mesEspanol = 'mar';
                                break;
                            case 'Apr':
                                $mesEspanol = 'abr';
                                break;
                            case 'May':
                                $mesEspanol = 'may';
                                break;
                            case 'Jun':
                                $mesEspanol = 'jun';
                                break;
                            case 'Jul':
                                $mesEspanol = 'jul';
                                break;
                            case 'Aug':
                                $mesEspanol = 'ago';
                                break;
                            case 'Sep':
                                $mesEspanol = 'set';
                                break;
                            case 'Oct':
                                $mesEspanol = 'oct';
                                break;
                            case 'Nov':
                                $mesEspanol = 'nov';
                                break;
                            case 'Dec':
                                $mesEspanol = 'dic';
                                break;
                        }

                        //$fechaEspanol = date_format($reservation->start_date, 'd').$mesEspanol.$date_format($reservation->start_date, 'Y');
                        $fechaEspanol = strftime('%d', strtotime($historicReservation->reservation_start_date)).'/'.$mesEspanol.'/'.strftime('%Y', strtotime($historicReservation->reservation_start_date));
                    ?>
                    <?= $this->Form->label('HistoricReservations.start_date', 
                                           $fechaEspanol, 
                                           [
                                               'class' => 'form-control',
                                               'style' => 'display:inline-table;',
                                               'readonly' => 'readonly',
                                               'templates' => ['formGroup' => '<div>{{label}}</div>']
                                           ]); 
                    ?>
                </div>
                <div class="col-xs-12">
                    <br>
                </div>
            </div>
        </div>
        
        <div class="row">
            <!-- HORA DE INICIO -->
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="col-md-8 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                    <?= $this->Form->label('HistoricReservations.start_date', 'Hora de inicio:'); ?>
                </div>
                <div class="col-md-8 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                    <?= $this->Form->label('HistoricReservations.start_date', 
                                           date_format($historicReservation->reservation_start_date, 'h:i a'), 
                                           [
                                               'class' => 'form-control',                                        
                                               'style' => 'display:inline-table;',                                            
                                               'readonly' => 'readonly',                                            
                                               'templates' => ['formGroup' => '<div>{{label}}</div>']
                                           ]); 
                    ?>
                </div>
                <div class="col-xs-12">
                    <br>
                </div>
            </div>
            
            <!-- FECHA DE FIN -->
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="col-md-8 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                    <?= $this->Form->label('HistoricReservations.end_date', 'Hora de fin:'); ?>
                </div>
                <div class="col-md-8 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                    <?= $this->Form->label('HistoricReservations.end_date', 
                                           date_format($historicReservation->reservation_end_date, 'h:i a'), 
                                           [
                                               'class' => 'form-control',                                            
                                               'style' => 'display:inline-table;',                                            
                                               'readonly' => 'readonly',                                            
                                               'templates' => ['formGroup' => '<div>{{label}}</div>']
                                           ]); 
                    ?>
                </div>
                <div class="col-xs-12">
                    <br>
                </div>
            </div>
        </div>
        
        <div class="row">
            <!-- USUARIO -->
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="col-md-8 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                    <?= $this->Form->label('HistoricReservations.user_id', 'Usuario:'); ?>
                </div>
                <div class="col-md-8 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                    <?= $this->Form->label('HistoricReservations.user_id', 
                                           $historicReservation['user_first_name'].' '.$historicReservation['user_last_name'], 
                                           [
                                               'class' => 'form-control',                                            
                                               'style' => 'display:inline-table;',                                            
                                               'readonly' => 'readonly',                                            
                                               'templates' => ['formGroup' => '<div>{{label}}</div>']
                                           ]); 
                    ?>
                </div>
                <div class="col-xs-12">
                    <br>
                </div>
            </div>
            
            <!-- EVENTO O ACTIVIDAD -->
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="col-md-8 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                    <?= $this->Form->label('HistoricReservations.event_name', 'Evento o curso:'); ?>
                </div>
                <div class="col-md-8 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                    <?= $this->Form->label('HistoricReservations.event_name', 
                                           $historicReservation->event_name, 
                                           [
                                               'class' => 'form-control', 
                                               'readonly' => 'readonly', 
                                               'style' => 'display:inline-table;', 
                                               'templates' => ['formGroup' => '<div>{{label}}</div>']
                                           ]); 
                    ?>
                </div>
                <div class="col-xs-12">
                    <br>
                </div>
            </div>
        </div>
        
        <div class="row">
            <!-- COMENTARIO DE USUARIO -->
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="col-md-8 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                    <?= $this->Form->label('HistoricReservations.user_comment', 'Comentario de usuario:'); ?>
                </div>
                <div class="col-md-8 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                    <?php
                        $comentarioUsuario = '';

                        if($historicReservation->user_comment == '')
                            $comentarioUsuario = '-';
                        else
                            $comentarioUsuario = $historicReservation->user_comment;
                    ?>
                    <?= $this->Form->label('HistoricReservations.user_comment', 
                                           $comentarioUsuario, 
                                           [
                                               'class' => 'form-control', 
                                               'readonly' => 'readonly', 
                                               'style' => 'display:inline-table;', 
                                               'templates' => ['formGroup' => '<div>{{label}}</div>']
                                           ]); 
                    ?>
                </div>
                <div class="col-xs-12">
                    <br>
                </div>
            </div>
            
            <!-- COMENTARIO DE ADMINISTRADOR -->
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="col-md-8 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                    <?= $this->Form->label('HistoricReservations.user_comment', 'Comentario de administrador:'); ?>
                </div>
                <div class="col-md-8 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                    <?php
                        $comentarioAdministrador = '';

                        if($historicReservation->administrator_comment == '')
                            $comentarioAdministrador = '-';
                        else
                            $comentarioAdministrador = $historicReservation->administrator_comment;
                    ?>
                    <?= $this->Form->label('HistoricReservations.administrator_comment', 
                                           $comentarioAdministrador, 
                                           [
                                               'class' => 'form-control', 
                                               'readonly' => 'readonly', 
                                               'style' => 'display:inline-table;', 
                                               'templates' => ['formGroup' => '<div>{{label}}</div>']
                                           ]); 
                    ?>
                </div>
                <div class="col-xs-12">
                    <br>
                </div>
            </div>
        </div>
        

        <!-- BOTONES -->
        <div class="row text-center">
            <div class="col-xs-12">
                <?php                 
                    echo $this->Html->link('Regresar', array('controller' => 'historicReservations','action'=> 'index'), array( 'class' => 'btn btn-primary', 'id' => 'btnRegresar')); 
                ?>
            </div>
        </div> 
        <!-- FIN DE BOTONES -->
        
    </fieldset>
    <!-- FIN DE CAMPOS A MOSTRAR -->

    <?= $this->Form->end() ?>
</div>