<!-- src/Template/Reservations/indexAdmin.ctp -->
<?php echo $this->Html->css('resources.css'); ?>

<br>

<!-- MENSAJES -->
<div class="lead text-info" style="text-align:center">
    <?= $this->Flash->render('acceptReservationSuccess') ?>
    <?= $this->Flash->render('rejectReservationSuccess') ?>
</div>

<div class="lead text-danger" style="text-align:center">
    <?= $this->Flash->render('editReservationError') ?>
    <?= $this->Flash->render('acceptReservationError') ?>
    <?= $this->Flash->render('rejectReservationError') ?>
</div>

<!-- TÍTULO -->
<div class="row">
    <div class="col-xs-12">
        <div class="text-center">
            <h1>Administrar reservaciones</h1>
            <br>
        </div>
    </div>
</div>
<!-- FIN TÍTULO -->

<!-- TABLA -->
<div class="table-responsive">
    <table class="table table-striped table-hover table-sm">
        <!-- ENCABEZADO -->
        <tr>
            <th>
                <?php
                echo $this->Paginator->sort('start_date', 'Fecha');
                ?>
            </th>
            <th>
                Hora inicio
            </th>
            <th>
                Hora fin
            </th>
            <th>
                <?php
                echo $this->Paginator->sort('Resources.resource_name', 'Recurso');
                ?>
            </th>
            <th>
                Curso/Actividad
            </th>
            <th>
                <?php 
                echo $this->Paginator->sort('state', 'Estado')
                ?>
            </th>
            <th>
                Revisar
            </th>
        </tr>
        <!-- FIN ENCABEZADO -->
        
        <?php
        // Recorre todas las reservaciones y las muestra en la tabla.
        foreach($reservations as $reservation):
        ?>
            <tr>
                <!-- FECHA -->
                <td>
                    <?php
                        echo date_format($reservation['start_date'], "d/M/Y");
                    ?>
                </td>
                <!-- FIN FECHA -->
                
                <!-- HORA INICIO -->
                <td>
                    <?php 
                        echo date_format($reservation['start_date'], 'H:i');
                    ?>
                </td>
                <!-- FIN HORA INICIO -->
                
                <!-- HORA FIN -->
                <td>
                    <?php 
                        echo date_format($reservation['end_date'], 'H:i');
                    ?>
                </td>
                <!-- FIN HORA FIN -->
                
                <!-- NOMBRE RECURSO -->
                <td>
                    <?php 
                        echo $reservation['Resources']['resource_name'];
                    ?>
                </td>
                <!-- FIN NOMBRE RECURSO -->
                
                <!-- ACTIVIDAD -->
                <td>
                    <?php
                        echo $reservation['event_name'];
                    ?>
                </td>
                <!-- FIN ACTIVIDAD -->
                
                <!-- ESTADO -->
                <td>
                    <?php
                        switch($reservation['state'])
                        {
                            case 1:
                                echo 'Pendiente';
                                break;
                            case 2:
                                echo 'Aceptada';
                                break;
                            case 3:
                                echo 'Rechazada';
                                break;
                            case 4:
                                echo 'Cancelada';
                                break;
                        }
                    ?>
                </td>
                <!-- FIN ESTADO -->
                
                <!-- REVISAR -->
                <td>
                    <?php
                        echo $this->Html->link('<i class="glyphicon glyphicon-check"></i>',
                                                   array('controller' => 'reservations','action' => 'edit', $reservation->id),
                                                   array('escape' => false));
                    ?>
                </td>
                <!-- FIN REVISAR -->
            </tr>
        <?php endforeach; ?>
        <?php unset($reservation); ?>
    </table>
</div>
<!-- FIN TABLA -->

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