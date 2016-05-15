<!-- src/Template/Resources/index.ctp -->
<?php echo $this->Html->css('resources.css'); ?>

<br>

<!-- MENSAJES -->
<div class="lead text-info" style="text-align:center">
    <?= $this->Flash->render('addResourceSuccess') ?>
    <?= $this->Flash->render('addResourceError') ?>
    <?= $this->Flash->render('deleteResourceSuccess') ?>
    <?= $this->Flash->render('deleteResourceError') ?>
</div>

<!-- TÍTULO -->
<div class="row">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <legend>
            <div class='text-center'>
                <h1>Administrar Recursos</h1>
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
            echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Agregar recurso',
                                   array('controller'=>'resources','action' => 'add'),
                                   array('target' => '_self', 'escape' => false)
                                  );
            ?>
        </div>
        <div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
            <?php 
            echo $this->Html->link('<span class="glyphicon glyphicon-cog"></span> Administrar tipos de recursos',
                                   array('controller'=>'resourceTypes','action' => 'index'),
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
                    echo $this->Paginator->sort('resource_type_id', 'Tipo ');
                    echo $this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-sort-by-alphabet'));
                ?>
            </th>
            <th>
                <?php
                    echo $this->Paginator->sort('resource_name', 'Nombre ');
                    echo $this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-sort-by-alphabet'));
                ?>
            </th> 
            <th>
                <?php
                    echo $this->Paginator->sort('resource_code', 'Placa/Serie ');
                    echo $this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-sort-by-alphabet'));
                ?>
            </th> 
            <th>
                <?php
                    echo $this->Paginator->sort('active', 'Activo ');
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
            // Recorre todos los recursos y los muestra en la tabla.
            foreach ( $resources as $resource ):
             ?>
                <tr>
                    <!-- TIPO -->
                    <td>
                        <?php
                            // Recorre todos los tipos de recurso hasta encontrar el que se relaciona con ese recurso
                            foreach ( $resource_types as $type ):
                                if( $type['id'] == $resource['resource_type_id'] )
                                {
                                    echo $type['description'];
                                }                            
                            endforeach;
                            unset($type);
                        ?>
                    </td>

                    <!-- NOMBRE -->
                    <td>
                        <?php
                            echo $this->Html->link($resource['resource_name'],
                                                   array('controller' => 'resources','action' => 'view', $resource->id));
                        ?>
                    </td>

                    <!-- SERIE/PLACA -->
                    <td>
                        <?php
                            echo $this->Html->link($resource['resource_code'],
                                                   array('controller' => 'resources','action' => 'view', $resource->id));
                        ?>
                    </td>

                    <!-- ACTIVO -->
                    <td>
                        <?php
                            if( $resource['active'] == 1 )
                            {
                                echo "Sí";
                            }
                            else
                            {
                                echo "No";
                            }
                        ?>
                    </td>


                    <!-- EDITAR -->
                    <td>
                        <?php
                            echo $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>',
                                                   array('controller' => 'resources','action' => 'edit', $resource->id),
                                                   array('escape' => false));
                        ?>
                    </td>

                    <!-- ELIMINAR -->
                    <td>
                        <?php
                            echo $this->Form->postLink($this->Html->tag('span',null,array('class' => 'glyphicon glyphicon-trash')),
                                                       array('controller' => 'resources','action' => 'delete', $resource->id),
                                                       array('escape' => false, 'confirm' => '¿Está seguro que desea eliminar el recurso?'));
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php unset($resource); ?>
    </table>
</div> <!-- FIN TABLA -->

<!-- PAGINADOR -->
<div class="row">
  <div class='col-lg-12 col-lg-offset-10 col-md-12 col-md-offset-9 col-sm-12 col-sm-offset-9 col-xs-12 col-xs-offset-9'>
      <div class="center_pagination" >
          <ul class="pagination">
                <li><?php echo $this->Paginator->numbers(array('separator' => '')); ?></li>
          </ul>
      </div>
   </div>
</div> <!-- FIN PAGINADOR -->