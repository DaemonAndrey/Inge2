<?php 
echo $this->Html->css('resources.css'); 
$this->Html->image('logoUCR.jpeg', ['alt' => 'LogoUCR', 'id'=>'logoUCR']);
?>

<!-- MENSAJES -->
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
</div>
<!-- FIN DE MENSAJES -->

<!-- TÍTULO -->
<div class="row" style="color:#000;">
    <div class="col-xs-12">
        <legend>
            <div class="text-center">
                <?php
                if($this->request->session()->read('Auth.User.role_id') == 2 || $this->request->session()->read('Auth.User.role_id') == 3)
                {
                    ?>
                    <h2>Administrar Reservaciones Pendientes</h2>
                    <?php
                }
                ?>
                <?php
                if($this->request->session()->read('Auth.User.role_id') == 1)
                {
                    ?>
                    <h2>Mis Reservaciones</h2>
                    <?php
                }
                ?>
                <br>
            </div>
        </legend>
    </div>
</div>
<!-- FIN DE TÍTULO -->

<br>

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
            <?php 
                if($this->request->session()->read('Auth.User.role_id') == 2 || $this->request->session()->read('Auth.User.role_id') == 3)
                {
                    ?>
                    <th>
                        Cancelar
                    </th>
                    <?php
                }
            ?>
        </tr>
        <!-- FIN DE ENCABEZADO -->
        
        <?php
        // Recorre todas las reservaciones y las muestra en la tabla.
        foreach($reservations as $reservation): ?>
            <tr>
                <!-- FECHA -->
                <td>
                    <?php
                    if($reservation['start_date'] != null)
                        echo date_format($reservation['start_date'], "d/M/Y");
                    else if($reservation['reservation_start_date'] != null)
                        echo date_format($reservation['reservation_start_date'], "d/M/Y")
                    ?>
                </td>
                
                <!-- HORA INICIO -->
                <td>
                    <?php 
                    if($reservation['start_date'] != null)
                        echo date_format($reservation['start_date'], "h:i a");
                    else if($reservation['reservation_start_date'] != null)
                        echo date_format($reservation['reservation_start_date'], "h:i a")
                    ?>
                </td>
                
                <!-- HORA FIN -->
                <td>
                    <?php 
                    if($reservation['end_date'] != null)
                        echo date_format($reservation['end_date'], "h:i a");
                    else if($reservation['reservation_end_date'] != null)
                        echo date_format($reservation['reservation_end_date'], "h:i a")
                    ?>
                </td>
                
                <!-- NOMBRE RECURSO -->
                <td>
                    <?php 
                    echo $reservation['resources']['resource_name'];
                    ?>
                </td>
                
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
                            case 0: ?>
                                    <b>
                                        Pendiente
                                    </b>
                                    <?php
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
                    ?>
                </td>
                
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
                
                <!-- CANCELAR -->
                <?php 
                    if($this->request->session()->read('Auth.User.role_id') == 2 || $this->request->session()->read('Auth.User.role_id') == 3)
                    {
                        echo '<td>';
                            echo $this->Html->link('<i class="glyphicon glyphicon-remove"></i>',
                                                   array('controller' => 'reservations', 'action' => 'delete', $reservation->id),
                                                   array('escape' => false)
                                                  );
                        echo '</td>';
                    }
                ?>
            </tr>
        <?php endforeach; ?>
        <?php unset($reservation); ?>
    </table>
</div>
<!-- FIN de TABLA -->

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
<!-- FIN de PAGINADOR -->

<div class="row" style="color:#000;">
    <div class="col-xs-12">
        <legend>
        </legend>
    </div>
</div>