<div class="users form">
    <?= $this->Form->create($reservationToCancel) ?>
    
    <!-- TÍTULO -->
    <div class="row">
        <div class="col-xs-12">
            <legend>
                <div class="text-center">
                    <h2>Reservación de <?= $this->Form->label('Reservations.resource_id', $reservationToCancel->resource->resource_name) ?></h2>
                    <br>
                </div>
            </legend>
        </div>
    </div>
    <!-- FIN TÍTULO -->
    
    <!-- CAMPOS A MOSTRAR -->
    <fieldset>
        <div class="row">
            <!-- PLACA / MODELO -->
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="col-md-8 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                    <?= $this->Form->label('Resources.resource_code', 'Placa / Modelo:'); ?>
                </div>
                <div class="col-md-8 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                    <?= $this->Form->label('Reservations.resource_id', $reservationToCancel->resources->resource_code, ['class' => 'form-control', 'readonly' => 'readonly', 'templates' => '<div>{{label}}</div>']); ?>
                </div>
                <div class="col-xs-12">
                    <br>
                </div>
            </div>
            <!-- FIN PLACA / MODELO -->
            
        </div>
    </fieldset>
    <!-- FIN CAMPOS A MOSTRAR -->
    
</div>