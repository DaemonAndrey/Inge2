<?= $this->Html->css('resources.css') ?>

<br>

<!-- TITULO -->
<div class="row" style="color:#000;">
    <div class="col-xs-12">
        <legend>
            <div class="text-center">
                <?php
                    if($this->request->session()->read('Auth.User.role_id') == 2 || $this->request->session()->read('Auth.User.role_id') == 3)
                    {
                ?>
                        <h2>Revisar historial de reservaciones</h2>
                <?php
                    }
                    else if ($this->request->session()->read('Auth.User.role_id') == 1)
                    {
                ?>
                        <h2>Mi historial de reservaciones</h2>
                <?php
                    }
                ?>
            </div>
        </legend>
    </div>
</div>
<!-- FIN TITULO -->

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
            <th>
                Ver
            </th>
        </tr>
        <!-- FIN ENCABEZADO -->
        
        <!-- CONTENIDO DE LA TABLA -->
        <?php
        foreach($historicReservations as $historicReservation):
        ?>
        <tr>
            <td>
                <?= date_format($historicReservation['reservation_start_date'], 'd/M/Y') ?>
            </td>
            <td>
                <?= date_format($historicReservation['reservation_start_date'], 'h:i a') ?>
            </td>
            <td>
                <?= date_format($historicReservation['reservation_end_date'], 'h:i a') ?>
            </td>
            <td>
                <?= $historicReservation['resource_name'] ?>
            </td>
            <td>
                <?= $historicReservation['event_name'] ?>
            </td>
            <td>
                <?php
                    $estado;
                    
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
                    
                    echo $estado;
                ?>
            </td>
            <td>
                <?= $this->Html->link('<i class="glyphicon glyphicon-eye-open"></i>', array('controller' =>  'historicReservations', 'action' => 'view', $historicReservation['id']), array('escape' => false)); ?>
            </td>
        </tr>
        <?php
        endforeach;
        unset($historicReservation);
        ?>
        <!-- FIN CONTENIDO DE LA TABLA -->
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
</div>
<!-- FIN PAGINADOR -->