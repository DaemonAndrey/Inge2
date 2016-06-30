<?php echo $this->Html->css('resources.css'); ?>

<!-- MENSAJES -->
<div class="lead text-danger" style="text-align:center">
    <?= $this->Flash->render('addResourceTypeError') ?>
    <?= $this->Flash->render('updateResourceTypeError') ?>
    <?= $this->Flash->render('deleteResourceTypeError') ?>
</div> 
<div class="lead text-info" style="text-align:center">
    <?= $this->Flash->render('addResourceTypeSuccess') ?>
    <?= $this->Flash->render('updateResourceTypeSuccess') ?>
    <?= $this->Flash->render('deleteResourceTypeSuccess') ?>
    <?= $this->Flash->render('deleteResourceRelationSuccess') ?>
</div>
<!-- FIN DE MENSAJES -->

<!-- TÍTULO -->
<div class="row" style="color:#000;">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <legend>
            <div class='text-center'>
                <h2>Administrar Tipos de Recursos</h2>
                <br>
            </div>
        </legend>
    </div>
</div>
<!-- FIN DE TÍTULO -->

<!-- BOTONES -->
<div class="row text-center">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <?= $this->Html->link(' Agregar Tipo de Recurso',
                              ['controller' => 'ResourceTypes',
                               'action'=> 'add'
                              ],
                              ['class' => 'btn btn-info glyphicon glyphicon-plus',
                               'style' => 'font-family: Arial, Helvetica, sans-serif;'
                              ])
        ?>
    </div>
    
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <br>
    </div>
</div>
<!-- FIN DE BOTONES -->

<!-- TABLA -->
<div class="table-responsive" style="color:#000;">
    <table class="table table-striped table-hover table-sm">
        <!-- ENCABEZADO TABLA -->
        <tr> 
            <th>
                <?php
                echo $this->Paginator->sort('description', 'Tipo ');
                echo $this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-sort-by-alphabet'));
                ?>
            </th>
            <th>
                Días de Anticipación
            </th>
            <th>
                Actualizar
            </th>
            <th>
                Eliminar
            </th>
        </tr> <!-- FIN ENCABEZADO TABLA -->

        <?php 
        // Recorre todos los recursos y los muestra en la tabla
        foreach ( $resourceTypes as $resourceType ): ?>
            <tr>
                <!-- NOMBRE -->
                <td>
                    <?php
                        echo $resourceType['description'];
                    ?>
                </td>

                <!-- DÍAS ANTICIPACIÓN -->
                <td>
                    <?php
                        echo $resourceType['days_before_reservation'];
                    ?>
                </td>

                <!-- EDITAR -->
                <td>
                    <?php
                        echo $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>',
                                               array('controller' => 'resourceTypes','action' => 'edit', $resourceType->id),
                                               array('escape' => false));
                    ?>
                </td>

                <!-- ELIMINAR -->
                <td>
                    <?php
                        echo $this->Form->postLink($this->Html->tag('span',null,array('class' => 'glyphicon glyphicon-trash')),
                                                   array('controller' => 'resourceTypes','action' => 'delete', $resourceType->id),
                                                   array('escape' => false, 'confirm' => '¿Está seguro que desea eliminar el tipo de recurso? Todos los recursos asociados a este tipo también se eliminarán.'));
                    ?>
                </td>
            </tr>
        <?php
        endforeach;
        unset($resource);
        ?>
    </table>
</div>
<!-- FIN DE TABLA -->

<!-- PAGINADOR -->
<div class="row text-center">
  <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
      <div class="center_pagination" >
          <ul class="pagination">
                <li>
                    <?php
                    echo $this->Paginator->numbers(array('separator' => ''));
                    ?>
              </li>
          </ul>
      </div>
   </div>
</div>
<!-- FIN DE PAGINADOR -->