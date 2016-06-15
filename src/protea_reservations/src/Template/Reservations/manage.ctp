<!-- src/Template/Reservations/indexAdmin.ctp -->
<?php echo $this->Html->css('resources.css'); ?>

<br>

<!-- MENSAJES -->
<!--
<div class="lead text-info" style="text-align:center">
    <?= $this->Flash->render('acceptReservationSuccess') ?>
    <?= $this->Flash->render('rejectReservationSuccess') ?>
    <?= $this->Flash->render('cancelReservationSuccess') ?>
</div>

<div class="lead text-danger" style="text-align:center">
    <?= $this->Flash->render('editReservationError') ?>
    <?= $this->Flash->render('acceptReservationError') ?>
    <?= $this->Flash->render('rejectReservationError') ?>
    <?= $this->Flash->render('cancelReservationError') ?>
    <?= $this->Flash->render('nullReservation') ?>
</div> -->
<!-- FIN DE MENSAJES -->

<!-- TÍTULO -->
<div class="row" style="color:#000;">
    <div class="col-xs-12">
        <div class="text-center" style="color:#000;">
            <?php
            if($user_role == 2 || $user_role == 3)
            {
                ?>
                <h2>Administrar Reservaciones Pendientes</h2>
                <?php
            }
            ?>
            <?php
            if($user_role == 1)
            {
                ?>
                <h2>Mis Reservaciones</h2>
                <?php
            }
            ?>
            <br>
        </div>
    </div>
</div>
<!-- FIN TÍTULO -->

<!-- TABLA -->
<div class="table-responsive">
    <table class="table table-striped table-hover table-sm" style="color:#000;">
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
                    echo $this->Paginator->sort('resources.resource_name', 'Recurso');
                ?>
            </th>
            <th>
                Curso/Actividad
            </th>
            <th>
                <?php
                    if($this->request->session()->read('Auth.User.role_id') == 1)
                        echo $this->Paginator->sort('state', 'Estado');
                    else
                        echo 'Estado';
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
                        if($reservation['start_date'] != null)
                            echo date_format($reservation['start_date'], "d/M/Y");
                        elseif($reservation['reservation_start_date'] != null)
                            echo date_format($reservation['reservation_start_date'], "d/M/Y")
                    ?>
                </td>
                <!-- FIN FECHA -->
                
                <!-- HORA INICIO -->
                <td>
                    <?php 
                        if($reservation['start_date'] != null)
                            echo date_format($reservation['start_date'], "H:i");
                        elseif($reservation['reservation_start_date'] != null)
                            echo date_format($reservation['reservation_start_date'], "H:i")
                    ?>
                </td>
                <!-- FIN HORA INICIO -->
                
                <!-- HORA FIN -->
                <td>
                    <?php 
                        if($reservation['end_date'] != null)
                            echo date_format($reservation['end_date'], "H:i");
                        elseif($reservation['reservation_end_date'] != null)
                            echo date_format($reservation['reservation_end_date'], "H:i")
                    ?>
                </td>
                <!-- FIN HORA FIN -->
                
                <!-- NOMBRE RECURSO -->
                <td>
                    <?php 
                        //if($this->request->session()->read('Auth.User.role_id') == 1) 
                        //    echo $reservation['Resources']['resource_name'];
                        //else
                            echo $reservation['resources']['resource_name'];
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
                            case 0:
                                echo "Pendiente";
                                break;
                            case 1:
                                echo "Aceptada";
                                break;
                            case 2:
                                echo "Rechazada";
                                break;
                            case 3:
                                echo "Cancelada";
                                break;
                        }
                        //echo ($reservation['state']) ? "Aceptada" : "Pendiente";
                    ?>
                </td>
                <!-- FIN ESTADO -->
                
                <!-- REVISAR -->
                <td>
                    <?php
                        if($this->request->session()->read('Auth.User.role_id') == 1)
                            echo $this->Html->link('<i class="glyphicon glyphicon-check"></i>',
                                                   array('controller' => 'reservations', 'action' => 'view', $reservation->id),
                                                   array('escape' => false)
                                                  );
                        else
                            echo $this->Html->link('<i class="glyphicon glyphicon-check"></i>',
                                                   array('controller' => 'reservations', 'action' => 'edit', $reservation->id),
                                                   array('escape' => false)
                                                  );
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