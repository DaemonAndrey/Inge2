<!-- src/Template/Resources/index.ctp -->
<?php echo $this->Html->css('resources.css'); ?>

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


<!-- TABLA -->
<div class="table-responsive">
    <table class="table table-striped table-hover table-sm" style="color:#000;">
        <!-- ENCABEZADO TABLA -->
        <tr>
            <th>
                <?php
                    echo $this->Paginator->sort('reservation_start_date', 'Fecha');
                ?>
            </th>
            <th>
                <?php
                    echo $this->Paginator->sort('reservation_start_date', 'Hora inicio');
                ?>
            </th>
            <th>
                <?php
                    echo $this->Paginator->sort('reservation_end_date', 'Hora fin');
                ?>
            </th> 
            <th>
                <?php
                    echo $this->Paginator->sort('resource_name', 'Recurso');
                ?>
            </th> 
            <th>
                <?php
                    echo $this->Paginator->sort('event_name', 'Curso/Actividad');
                ?>
            </th> 
            <th>
                <?php
                    echo $this->Paginator->sort('user_username', 'Usuario');
                ?>
            </th>
            <th>
                <?php
                    echo $this->Paginator->sort('user_first_name', 'Usuario');
                ?>
            </th>
            <th>
                <?php
                    echo $this->Paginator->sort('user_last_name', 'Usuario');
                ?>
            </th>
        </tr> <!-- FIN ENCABEZADO TABLA -->

        <?php 
            // Recorre todos los recursos y los muestra en la tabla.
            foreach ( $historic_reservations as $historic_reservation ):
             ?>
                <tr>
                    
                    <!-- Fecha-->
                    <td>
                        <?php
                            if($historic_reservation['reservation_start_date'] != null)
                                echo date_format($historic_reservation['reservation_start_date'], "d/M/Y");
                            elseif($historic_reservation['reservation_start_date'] != null)
                                echo date_format($historic_reservation['reservation_start_date'], "d/M/Y")
                        ?>
                    </td>

                    <!-- Hora de Inicio -->
                    <td>
                        <?php 
                            if($historic_reservation['reservation_start_date'] != null)
                                echo date_format($historic_reservation['reservation_start_date'], "H:i");
                            elseif($historic_reservation['reservation_start_date'] != null)
                                echo date_format($historic_reservation['reservation_start_date'], "H:i")
                        ?>
                    </td>
                    
                    <!-- Hora final -->
                    <td>
                        <?php 
                            if($historic_reservation['reservation_end_date'] != null)
                                echo date_format($historic_reservation['reservation_end_date'], "H:i");
                            elseif($historic_reservation['reservation_end_date'] != null)
                                echo date_format($historic_reservation['reservation_end_date'], "H:i")
                        ?>
                    </td>
                    <!-- NOMBRE RECURSO -->
                    <td>
                        <?php 
                            echo $historic_reservation['resource_name'];
                        ?>
                    </td>
                    <!-- FIN NOMBRE RECURSO -->
                    
                    <!-- ACTIVIDAD -->
                    <td>
                        <?php
                            echo $historic_reservation['event_name'];

                        ?>
                    </td>
                    <!-- FIN ACTIVIDAD -->
                    
                    <!-- USUARIO -->
                    <td>
                        <?php
                            echo $historic_reservation['user_username'];

                        ?>
                    </td>
                    <!-- FIN USUARIO -->
                    
                    <!-- NOMBRE USUARIO -->
                    <td>
                        <?php
                            echo $historic_reservation['user_first_name'];

                        ?>
                    </td>
                    <!-- FIN NOMBRE USUARIO -->
                    <!-- APELLIDO USUARIO -->
                    <td>
                        <?php
                            echo $historic_reservation['user_last_name'];

                        ?>
                    </td>
                    <!-- FIN APELLIDO USUARIO -->
    
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