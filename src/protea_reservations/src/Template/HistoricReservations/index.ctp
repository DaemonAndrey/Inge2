<!-- src/Template/Reservations/edit.ctp -->
<?php echo $this->Html->css('reservations.css');
    echo $this->Html->css('datepicker.css'); ?>

<div class="users form">
    
    <?= $this->Form->create($historic) ?>

    <fieldset>
        <!-- TÍTULO -->
    <div class="row">
        <div class="col-xs-12">
            <legend>
                <div class="text-center">
                    <h2>Reporte de Reservaciones</h2>
                    <br>
                </div>
            </legend>
        </div>
    </div>
    <!-- FIN TÍTULO -->
  
    <div class='row'>
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar">
                            
                        </i>
                        
                    </div>
                    <?= $this->Form->input('start_date', ['label' => 'Fecha de Inicio * ', 'placeholder' => 'DD/MM/YYYY', 'class' => 'form-control']) ?>
                </div>
                
                    
                <br>
            </div>
            
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar">
                        </i>
                    </div>
                
                    <?= $this->Form->input('end_date', ['label' => 'Fecha de Inicio * ', 'placeholder' => 'DD/MM/YYYY', 'class' => 'form-control']) ?>
                </div>
                <br>
            </div>
    </div>
    <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
        <?=
            $this->Form->input('resource_type_id', ['label' => 'Tipo: ',
                                                            'options' => $resource_types_options,
                                                            'class' => 'form-control']);
        ?>
        <br>
    </div>
    <div class='row  text-center' id="btnGenerarTabla">
        <div class='col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1'>
            <br>
            <?= $this->Html->link('Generar Tabla', array('controller' => 'HistoricReservations','action' => 'table', '$start_date','end_date','resource_type'), array( 'class' => 'btn btn-primary', 'style' => 'width:120px')) ?>
            <?= $this->Form->button('Imprimir Tabla', ['class' => 'btn btn-success', 'style' => 'width:120px']); ?>
        </div>
    </div>
  
  


        
   </fieldset>

    </fieldset>
    <!-- FIN CAMPOS A MOSTRAR -->

    <?= $this->Form->end() ?>
</div>
