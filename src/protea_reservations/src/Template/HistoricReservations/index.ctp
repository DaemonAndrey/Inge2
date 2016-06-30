<?php 
    echo $this->Html->css('resources.css');
    echo $this->Html->css('reservations.css');
    echo $this->Html->css('datepicker.css');
    echo $this->Html->script('historicReservations.js');

    if($this->request->session()->read('Auth.User.role_id') == 2 || $this->request->session()->read('Auth.User.role_id') == 3)
    {
?>

<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<br>

<div class="users form">
    
    <?= $this->Form->create($historic, ['url' => ['action' => 'generateReports']]) ?>

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
                <label>Fecha de inicio</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar">
                        </i>
                    </div>
                    
                    <input type="date" name='start_date' id = 'start_date' value="<?php echo date("d-m-Y");?>" placeholder='DD/MM/YYYY' class = 'form-control'>
                   
                </div>
                <br>
            </div>
        
            
            <div class='col-md-4 col-sm-4 col-xs-9 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                <label for='end-date'>Fecha de finalización</label>
                <div class="input-group">
                    
                    <div class="input-group-addon">
                        <i class="fa fa-calendar">
                        </i>
                    </div>
                        <?php 
                            $fechaFFase= date("Y-m-d");
                            $nuevafecha = new DateTime($fechaFFase);
                            $nuevafecha->modify('+7 day');
                        ?>
                        <input type="date" name='end_date' id = 'end_date' value="<?php echo $nuevafecha->format('d-m-Y');?>" placeholder='DD/MM/YYYY' class = 'form-control'>
                </div>
                <br>
            </div>
    </div>
    <div class='row'>
        <div class='col-md-4 col-sm-4 col-xs-9 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
            <?=
                $this->Form->input('resource_type_id', ['label' => 'Tipo: ',
                                                                'options' => $resource_types_options,
                                                                'class' => 'form-control']);
            ?>
            <br>
        </div>
        <!-- ACTIVO-->
        <div class='col-md-4 col-sm-4 col-xs-9 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
            <?=
                $this->Form->input('active', ['label' => 'Estado: ',
                                                        'options' => array('Aceptadas','Rechazadas', 'Canceladas','Eliminadas'),
                                                        'class' => 'form-control']);
            ?>
            <br>
        </div>
    </div>
    
    <div class='row  text-center' id="btnGenerarTabla">
        <div class='col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1'>
            <br>
            <?= $this->Form->submit('Ver tabla',['name'=>'view_table','style' => 'width:120px','class' => 'btn btn-success',]); ?>
            <?= $this->Form->submit('Imprimir Tabla', ['class' => 'btn btn-success', 'style' => 'width:120px','name'=>'print']); ?>
            <?= $this->Form->end(); ?>
        </div>
    </div>
        
   </fieldset>

<!-- FIN CAMPOS A MOSTRAR -->
    
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <?= $this->Html->css('jquery-ui.min.css'); ?>
    <?= $this->Html->script('jquery-ui.min.js'); ?>
    <?= $this->Html->script('modernizr-custom.js'); ?>
<script>
    /**
    $(document).ready(function(){
        var date_input=$('input[name="first_date"]'); //our date input has the name "date"
        var end_date = $('input[name="end_date"]');
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        $('#first_date').datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,            
            autoclose: true
        });
        
        end_date.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true
            
        });
    })
    **/
    
    
    $(document).ready( function(){
    if(!Modernizr.inputtypes.date)
    {          
        $('#start_date').datepicker();           
        $('#end_date').datepicker(); 
    }       
});
</script>

 
<?php
    }
    else if ($this->request->session()->read('Auth.User.role_id') == 1)
    {
?>

<?= $this->Html->css('resources.css') ?>

<!-- TITULO -->
<div class="row" style="color:#000;">
    <div class="col-xs-12">
        <legend>
            <div class="text-center">
                <h2>Historial de Mis Reservaciones</h2>
            </div>
        </legend>
    </div>
</div>
<!-- FIN DE TITULO -->

<br>

<!-- TABLA -->
<div class="table-responsive">
    <table class="table table-striped table-hover table-sm" style="color:#000;">
        <!-- ENCABEZADO -->
        <tr>
            <th>
                <?= $this->Paginator->sort('reservation_start_date', 'Fecha') ?>
            </th>
            <th>
                Hora inicio
            </th>
            <th>
                Hora fin
            </th>
            <th>
                <?= $this->Paginator->sort('resource_name', 'Recurso') ?>
            </th>
            <th>
                <?= $this->Paginator->sort('event_name', 'Curso/Actividad') ?>
            </th>
            <th>
                <?= $this->Paginator->sort('state', 'Estado') ?>
            </th>
        </tr>
        <!-- FIN DE ENCABEZADO -->
        
        <!-- CONTENIDO DE LA TABLA -->
        <?php
        foreach($historicReservations as $historicReservation):
        ?>
        <tr>
            <td>
                <?php
                    echo $this->Html->link(date_format($historicReservation['reservation_start_date'], 'd/M/Y'),
                                           ['controller' => 'historicReservations',
                                            'action' => 'view',
                                            $historicReservation['id']
                                           ]);
                ?>
            </td>
            <td>
                <?php
                    echo $this->Html->link(date_format($historicReservation['reservation_start_date'], 'h:i a'),
                                           ['controller' => 'historicReservations',
                                            'action' => 'view',
                                            $historicReservation['id']
                                           ]);
                ?>
            </td>
            <td>
                <?php
                    echo $this->Html->link(date_format($historicReservation['reservation_end_date'], 'h:i a'),
                                           ['controller' => 'historicReservations',
                                            'action' => 'view',
                                            $historicReservation['id']
                                           ]);
                ?>
            </td>
            <td>
                <?php
                    echo $this->Html->link($historicReservation['resource_name'],
                                           ['controller' => 'historicReservations',
                                            'action' => 'view',
                                            $historicReservation['id']
                                           ]);
                ?>
            </td>
            <td>
                <?php
                    echo $this->Html->link($historicReservation['event_name'],
                                           ['controller' => 'historicReservations',
                                            'action' => 'view',
                                            $historicReservation['id']
                                           ]);
                ?>
            </td>
            <td>
                <?php
                    $estado = "";
                    
                    switch($historicReservation['state'])
                    {
                        case 1:
                            $estado = "Aceptada";
                            break;
                        case 2:
                            $estado = "Rechazada";
                            break;
                        case 3:
                            $estado = "Cancelada";
                            break;
                        case 4:
                            $estado = "Eliminada";
                            break;
                    }
                    
                    echo $this->Html->link($estado,
                                           ['controller' => 'historicReservations',
                                            'action' => 'view',
                                            $historicReservation['id']
                                           ]);
                ?>
            </td>
        </tr>
        <?php
        endforeach;
        unset($historicReservation);
        ?>
        <!-- FIN DE CONTENIDO DE LA TABLA -->
    </table>
</div>
<!-- FIN DE TABLA -->

<!-- PAGINADOR -->
<div class="row text-center">
  <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
      <div class="center_pagination" >
          <ul class="pagination">
                <li><?php echo $this->Paginator->numbers(array('separator' => '')); ?></li>
          </ul>
      </div>
   </div>
</div>
<!-- FIN DE PAGINADOR -->
<?php 
    }
?>