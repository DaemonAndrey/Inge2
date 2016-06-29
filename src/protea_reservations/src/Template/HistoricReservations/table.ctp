<?php 
    $this->Html->image('logoUCR.jpg', ['alt' => 'LogoUCR', 'id'=>'logoUCR']);

    // CSS
    echo $this->Html->css('reservations.css'); 
    echo $this->Html->css('resources.css'); 
    
    // Javascript
    echo $this->Html->script('historicReservations.js'); 
    echo $this->Html->script('jspdf/jspdf.js'); 
    echo $this->Html->script('jspdf/jspdf.min.js');
    echo $this->Html->script('jspdf/jspdf.plugin.autotable.js');
    echo $this->Html->script('jspdf/jspdf.plugin.png_support.js'); 
    echo $this->Html->script('jspdf/jspdf.plugin.addimage.js');
    echo $this->Html->script('jspdf/png_support/png.js');
    echo $this->Html->script('jspdf/png_support/zlib.js');
    echo $this->Html->script('jspdf/FileSaver.js'); 
?>

<!-- TÍTULO -->
<div class="row" style="color:#000;">
    <div class='col-xs-12'>
        <legend>
            <div class='text-center'>
                <h2>Reporte de Reservaciones</h2>
                <br>
            </div>
        </legend>
    </div>
</div> <!-- FIN TÍTULO -->

<div class="col-xs-12">
    <div class="col-xs-2 col-xs-offset-5">
        <button id="btnReporte" class="btn btn-info" onclick="solicitarDatosHistorico()">Generar reporte</button>
    </div>
</div>

<div class="col-xs-12">
    <br>
    <br>
</div>

<!-- TABLA -->
<div class="table-responsive">
    <table class="table table-striped table-hover table-sm" style="color:#000;">
        <!-- ENCABEZADO TABLA -->
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
                Usuario
            </th>
        </tr> <!-- FIN ENCABEZADO TABLA -->

        <?php 
            // Recorre todos los recursos y los muestra en la tabla.
            foreach ( $historic_reservations as $historic_reservation ):
             ?>
                <tr>
                    
                    <!-- Fecha-->
                    <td>
                        <?= $historic_reservation['start_date'] ?>
                        <?php
                            /*if($historic_reservation['start_date'] != null)
                                echo date_format($historic_reservation['reservation_start_date'], "d/M/Y");
                            elseif($historic_reservation['start_date'] != null)
                                echo date_format($historic_reservation['reservation_start_date'], "d/M/Y")*/
                        ?>
                    </td>

                    <!-- Hora de Inicio -->
                    <td>
                        <?= $historic_reservation['start_hour'] ?>
                        <?php 
                            /*if($historic_reservation['reservation_start_date'] != null)
                                echo date_format($historic_reservation['reservation_start_date'], "H:i");
                            elseif($historic_reservation['reservation_start_date'] != null)
                                echo date_format($historic_reservation['reservation_start_date'], "H:i")*/
                        ?>
                    </td>
                    
                    <!-- Hora final -->
                    <td>
                        <?= $historic_reservation['end_hour'] ?>
                        <?php 
                            /*if($historic_reservation['reservation_end_date'] != null)
                                echo date_format($historic_reservation['reservation_end_date'], "H:i");
                            elseif($historic_reservation['reservation_end_date'] != null)
                                echo date_format($historic_reservation['reservation_end_date'], "H:i")*/
                        ?>
                    </td>
                    <!-- NOMBRE RECURSO -->
                    <td>
                        <?= $historic_reservation['resource_name'] ?>
                        <?php 
                            //echo $historic_reservation['resource_name'];
                        ?>
                    </td>
                    <!-- FIN NOMBRE RECURSO -->
                    
                    <!-- ACTIVIDAD -->
                    <td>
                        <?= $historic_reservation['event_name'] ?>
                        <?php
                            //echo $historic_reservation['event_name'];
                        ?>
                    </td>
                    <!-- FIN ACTIVIDAD -->
                    
                    <!-- USUARIO -->
                    <td>
                        <?= $historic_reservation['user'] ?>
                        <?php
                            //echo $historic_reservation['user_username'];
                        ?>
                    </td>    
                </tr>
            <?php endforeach; ?>
        <?php unset($historic_reservation); ?>
    </table>
</div> <!-- FIN TABLA -->

<!-- PAGINADOR -->
<div class="row text-center">
  <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
      <div class="center_pagination" >
          <ul class="pagination">
                <li><?php echo $this->Paginator->numbers(array('separator' => '')); ?></li>
          </ul>
      </div>
   </div>
</div> <!-- FIN PAGINADOR -->