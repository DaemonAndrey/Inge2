<!-- src/Template/Users/registrar.ctp -->
<?php echo $this->Html->css('resources.css'); ?>
<br>
<!-- MENSAJES -->
<div class="lead text-info" style="text-align:center">
    <?= $this->Flash->render('addResourceSuccess') ?>
    <?= $this->Flash->render('addResourceError') ?>
</div>

<div class="row">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <legend>
            <div class='text-center'>
                <h1>Administrar Recursos</h1>
                <br>
            </div>
        </legend>
    </div>
</div>

<div class="row text-center">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <?php 
        echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Agregar recurso',
                               array('controller'=>'resources','action' => 'add'),
                               array('target' => '_self', 'escape' => false)
                              );
        ?>
    </div>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <br>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover table-sm">
        <tr>
            <th>
                <?php
                echo $this->Paginator->sort('resource_type', 'Tipo '/*, array('id' => 'sortCode-button')*/);
                echo $this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-sort-by-alphabet'));
                ?>
            </th>
            <th>
                <?php
                echo $this->Paginator->sort('resource_name', 'Nombre del Recurso ');
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
        </tr>

        <?php foreach ($resources as $resource): ?>
        <?php
            echo "<tr>";
                echo "<td>";
                    echo $this->Html->link($resource['resource_type'],
                                           array('controller' => 'resources','action' => 'view',$resource->id)
                                          );
                echo "</td>";
                echo "<td>";
                    echo $this->Html->link($resource['resource_name'],
                                           array('controller' => 'resources','action' => 'view',$resource->id)
                                          );
                echo "</td>";
                echo "<td>";
                    echo $this->Html->link($resource['resource_code'],
                                           array('controller' => 'resources','action' => 'view',$resource->id)
                                          );
                echo "</td>";
                echo "<td>";
                    echo $this->Html->link($resource['active'],
                                           array('controller' => 'resources','action' => 'view',$resource->id)
                                          );
                echo "</td>";
                echo "<td>";
                    echo $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>',
                                           array('controller' => 'resources','action' => 'edit', $resource->id),
                                           array('escape' => false)
                                          );
                echo "</td>";
                echo "<td>";
                    echo $this->Form->postLink($this->Html->tag('span',null,array('class' => 'glyphicon glyphicon-trash')),
                       array('controller' => 'resources','action' => 'delete', $resource->id),
                       array('escape' => false, 'confirm' => 'Está seguro que desea eliminar el producto?')
                    );
                echo "</td>";
            echo "</tr>";
        ?>
        <?php endforeach; ?>
        <?php unset($resource); ?>
    </table>
</div>

<div class="row">
  <div class='col-lg-12 col-lg-offset-10 col-md-12 col-md-offset-9 col-sm-12 col-sm-offset-9 col-xs-12 col-xs-offset-9'>
      <div class="center_pagination" >
          <ul class="pagination">
                <li><?php echo $this->Paginator->numbers(array('separator' => '')); ?></li>
          </ul>
      </div>
   </div>
</div>