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
                    <?= $this->Form->label('Reservations.start_date', date_format($reservation->start_date, 'd/M/Y')); ?>
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
                    <?= $this->Form->label('Reservations.start_date', date_format($reservation->start_date, 'H:i:s')); ?>
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
                    <?= $this->Form->label('Reservations.end_date', date_format($reservation->end_date, 'H:i:s')); ?>
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
                    <?= $this->Form->label('Reservations.user_comment', $reservation->user_comment); ?>
                </div>
            </div>
        </div>
        <!-- FIN COMENTARIO DE USUARIO -->
    </fieldset>
    <!-- FIN CAMPOS A MOSTRAR -->
    
    
</div>