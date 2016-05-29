<div class="users form">
    <?= $this->Form->create($reservation) ?>
    
    <!-- TÍTULO -->
    <div class="row">
        <div class="col-xs-12">
            <legend>
                <div class="text-center">
                    <h1>Reservación</h1>
                    <br>
                </div>
            </legend>
        </div>
    </div>
    <!-- FIN TÍTULO -->
    
    <!-- CAMPOS A MOSTRAR -->
    <fieldset>
        <?php setlocale(LC_ALL,"es_ES"); ?>
        <!-- FECHA DE RESERVACIÓN -->
        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-3 col-xs-offset-3">
                    <?= $this->Form->label('Reservations.start_date', 'Fecha de reservación'); ?>
                </div>
                <div class="col-xs-3">
                    <?= $this->Form->label('Reservations.start_date', date_format($reservation->start_date, 'd/M/Y'), ['style' => 'font-weight: normal']); ?>
                </div>
            </div>
        </div>
        <!-- FIN FECHA DE RESERVACIÓN -->
        
        <br>
        
        <!-- HORA DE INICIO -->
        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-3 col-xs-offset-3">
                    <?= $this->Form->label('Reservations.start_date', 'Hora de inicio'); ?>
                </div>
                <div class="col-xs-3">
                    <?= $this->Form->label('Reservations.start_date', date_format($reservation->start_date, 'H:i:s'), ['style' => 'font-weight: normal']); ?>
                </div>
            </div>
        </div>
        <!-- FIN HORA DE INICIO -->
        
        <br>
        
        <!-- FECHA DE FIN -->
        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-3 col-xs-offset-3">
                    <?= $this->Form->label('Reservations.end_date', 'Hora de fin'); ?>
                </div>
                <div class="col-xs-3">
                    <?= $this->Form->label('Reservations.end_date', date_format($reservation->end_date, 'H:i:s'), ['style' => 'font-weight: normal']); ?>
                </div>
            </div>
        </div>
        <!-- FIN FECHA DE INICIO -->
        
        <br>
        
        <!-- COMENTARIO DE USUARIO -->
        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-3 col-xs-offset-3">
                    <?= $this->Form->label('Reservations.user_comment', 'Comentario de usuario'); ?>
                </div>
                <div class="col-xs-3">
                    <?= $this->Form->label('Reservations.user_comment', $reservation->user_comment, ['style' => 'font-weight: normal']); ?>
                </div>
            </div>
        </div>
        <!-- FIN COMENTARIO DE USUARIO -->
        
        <br>
        
        <!-- SIGLA DEL CURSO -->
        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-3 col-xs-offset-3">
                    <?= $this->Form->label('Reservations.course_id', 'Sigla del curso'); ?>
                </div>
                <div class="col-xs-3">
                    <?= $this->Form->label('Reservations.course_id', $reservation->course_id, ['style' => 'font-weight: normal']); ?>
                </div>
            </div>
        </div>
        <!-- FIN SIGLA DEL CURSO -->
        
        <br>
        
        <!-- NOMBRE DEL CURSO -->
        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-3 col-xs-offset-3">
                    <?= $this->Form->label('Reservations.course_name', 'Nombre del curso'); ?>
                </div>
                <div class="col-xs-3">
                    <?= $this->Form->label('Reservations.course_name', $reservation->course_name, ['style' => 'font-weight: normal']); ?>
                </div>
            </div>
        </div>
        <!-- FIN NOMBRE DEL CURSO -->
        
        <br>
        
        <!-- COMENTARIO DE ADMINISTRADOR -->
        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-3 col-xs-offset-3">
                    <?= $this->Form->label('Reservations.admin_comment', 'Comentario del administrador'); ?>
                </div>
                <div class="col-xs-3">
                    <?=
                    $this->Form->input('Reservations.admin_comment', [  'label' => false,
                                                                        'type' => 'textarea',
                                                                        'class' => 'form-control',
                                                                        'placeholder' => '(Opcional). Indique el motivo de la aceptación o rechazo de la reservación.']);
                ?>
                </div>
            </div>
        </div>
        <!-- FIN COMENTARIO DE ADMINISTRADOR -->
        
        <br>
        
        <!-- BOTONES -->
        <div class="row text-center">
            <div class='col-xs-6 col-xs-offset-3'>
                <?= $this->Form->postLink($this->Html->tag('span','Aceptar',array('class'  => 'btn btn-primary')),
                                                array('controller' => 'reservations', 'action' => 'accept', $reservation->id, $reservation->admin_comment),
                                                array('escape' => false)); ?>
                <?= $this->Form->postLink($this->Html->tag('span','Rechazar',array('class' => 'btn btn-danger')),
                                                array('controller' => 'reservations', 'action' => 'reject', $reservation->id, $reservation->admin_comment),
                                                array('escape' => false)); ?>
            </div>
        </div> 
        <!-- FIN BOTONES -->
    </fieldset>
    <!-- FIN CAMPOS A MOSTRAR -->
    
    <?= $this->Form->end() ?>
</div>