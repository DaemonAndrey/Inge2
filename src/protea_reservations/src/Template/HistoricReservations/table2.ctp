<!-- src/Template/Reservations/edit.ctp -->
<?php echo $this->Html->css('reservations.css');
    echo $this->Html->css('datepicker.css'); ?>
<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


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
            <div class='col-md-4 col-sm-4 col-xs-9 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar">
                        </i>
                    </div>
                    <?= $this->Form->input('start_date', ['label' => 'Fecha de Inicio * ', 'placeholder' => 'DD/MM/YYYY', 'class' => 'form-control']) ?>
                </div>
                <br>
            </div>
        
            
            <div class='col-md-4 col-sm-4 col-xs-9 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar">
                        </i>
                    </div>
                
                    <?= $this->Form->input('end_date', ['label' => 'Fecha Final* ', 'placeholder' => 'DD/MM/YYYY', 'class' => 'form-control']) ?>
                </div>
                <br>
            </div>
    </div>
    <div class='col-md-4 col-sm-4 col-xs-9 col-md-offset-4 col-sm-offset-4 col-xs-offset-1'>
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

<!-- FIN CAMPOS A MOSTRAR -->
    
    
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>