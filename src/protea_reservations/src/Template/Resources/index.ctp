<?php echo $this->Html->css('resources.css'); ?>

<!-- MENSAJES -->
<div class="lead text-info" style="text-align:center">
    <?= $this->Flash->render('addResourceSuccess') ?>
    <?= $this->Flash->render('deleteResourceSuccess') ?>
</div>

<div class="lead text-danger" style="text-align:center">
    <?= $this->Flash->render('addResourceError') ?>
    <?= $this->Flash->render('deleteResourceError') ?>
</div>
<!-- FIN DE MENSAJES -->

<!-- TÍTULO -->
<div class="row" style="color:#000;">
    <div class='col-xs-12'>
        <legend>
            <div class='text-center'>
                <h2>Administrar Recursos</h2>
                <br>
            </div>
        </legend>
    </div>
</div>
<!-- FIN DE TÍTULO -->

<!-- BOTONES -->
<div class="row text-center">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <?= $this->Html->link(' Agregar Recurso',
                              ['controller' => 'Resources',
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
<div class="table-responsive">
    <table class="table table-striped table-hover table-sm" style="color:#000;">
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
                    echo $this->Paginator->sort('resource_name', 'Marca/Modelo ');
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
                    echo $this->Paginator->sort('active', 'Habilitado ');
                    echo $this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-sort-by-alphabet'));
                ?>
            </th> 
            <th>
                Actualizar
            </th>
            <th>
                Eliminar
            </th>
        </tr>
        <!-- FIN DE ENCABEZADO TABLA -->

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

                <!-- MARCA/MODELO -->
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