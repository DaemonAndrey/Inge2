<!-- src/Template/ResourceTypes/index.ctp -->
<?php echo $this->Html->css('resources.css'); ?>

<br>

<!-- MENSAJES -->
<div class="lead text-info" style="text-align:center">
    <?= $this->Flash->render('addResourceTypeSuccess') ?>
    <?= $this->Flash->render('addResourceTypeError') ?>
    <?= $this->Flash->render('updateResourceTypeSuccess') ?>
    <?= $this->Flash->render('updateResourceTypeError') ?>
    <?= $this->Flash->render('deleteResourceTypeSuccess') ?>
    <?= $this->Flash->render('deleteResourceTypeError') ?>
    <?= $this->Flash->render('deleteResourceRelationSuccess') ?>
</div>

<!-- TÍTULO -->
<div class="row">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <legend>
            <div class='text-center'>
                <h1>Administrar Tipos de Recursos</h1>
                <br>
            </div>
        </legend>
    </div>
</div> <!-- FIN TÍTULO -->

<!-- BOTONES -->
<div class="row text-center">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class='col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-12'>
            <?php 
            echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Agregar tipo de recurso',
                                   array('controller'=>'ResourceTypes','action' => 'add'),
                                   array('target' => '_self', 'escape' => false)
                                  );
            ?>
        </div>
        <div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
            <?php 
            echo $this->Html->link('<span class="glyphicon glyphicon-cog"></span> Administrar recursos',
                                   array('controller'=>'resources','action' => 'index'),
                                   array('target' => '_self', 'escape' => false)
                                  );
            ?>
        </div>
    </div>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <br>
    </div>
</div> <!-- FIN BOTONES -->

<!-- TABLA -->
<div class="table-responsive">
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
                Actualizar
            </th>
            <th>
                Eliminar
            </th>
        </tr> <!-- FIN ENCABEZADO TABLA -->

        <?php 
            // Recorre todos los recursos y los muestra en la tabla
            foreach ( $resourceTypes as $resourceType ):
        ?>
                <tr>
                    <!-- NOMBRE -->
                    <td>
                        <?php
                            echo /*$this->Html->link(*/$resourceType['description']/*,
                                                   array('controller' => 'resourceTypes','action' => 'view', $resourceType->id))*/;
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
            <?php endforeach; ?>
        <?php unset($resource); ?>
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