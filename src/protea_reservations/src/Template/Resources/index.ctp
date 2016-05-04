<!-- src/Template/Users/registrar.ctp -->
<?php echo $this->Html->css('registro.css'); ?>
<br>
<!-- MENSAJES -->
    <div class="lead text-info" style="text-align:center">
        <?= $this->Flash->render('addResourceSuccess') ?>
        <?= $this->Flash->render('addResourceError') ?>
        <br>
    </div>

<?php
// Si soy administrador
if(!is_null($this->request->session()->read('Auth.User.username')))
    if($this->request->session()->read('Auth.User.role_id') == '1')
{
    {
	?>
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

    <div class="row">
        <div class='col-lg-12 col-lg-offset-5 col-md-12 col-md-offset-5 col-sm-12 col-sm-offset-4 col-xs-12 col-xs-offset-4'>
        <p>
            <?php
                echo "<li id = 'form-button'>"; 
                echo $this->Html->link(	'<span class="glyphicon glyphicon-plus"></span> Agregar recurso',
                                        array('controller'=>'resources','action' => 'add'),
                                        array('target' => '_self', 'escape' => false)
                                    );

                echo "</li>";
            ?>
        </p>
        </div>
    </div>

        <hr>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-sm">
                <tr>
                    <th>
                        <?php
                            echo $this->Paginator->sort('code', 'Code ', array('id' => 'sortCode-button'));
                            echo $this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-sort-by-alphabet'));
                        ?>
                    </th>
                    <th>
                        <?php
                            echo $this->Paginator->sort('resource_name', 'Resource_Name ');
                            echo $this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-sort-by-alphabet'));
                        ?>
                    </th> 
                    <th>
                        Update
                    </th>
                    <th>
                        Delete
                    </th>
                </tr>

                <?php foreach ($resources as $resource): ?>
                <?php
                    echo "<tr>";
                        echo "<td>";
                            echo $this->Html->link(
                                                    $resource['id'],
                                                    array('action' => 'view', $resource['Resource']['id'])
                                                  );
                        echo "</td>";
                        echo "<td>";
                            echo $this->Html->link(
                                                    $resource['resource_name'],
                                                    array('action' => 'view', $resource['Resource']['id'])
                                                  );
                        echo "</td>";
                        echo "<td>";
                            echo $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>', array('action' => 'edit', $resource['Resource']['id']), array('escape' => false));
                        echo "</td>";
                        echo "<td>";
                            echo $this->Form->postLink(
                               $this->Html->tag(
                                  'span', null, array('class' => 'glyphicon glyphicon-trash')
                               ),
                               array('action' => 'delete', $resource['Resource']['id']),
                               array('escape' => false, 'confirm' => 'Está seguro que desea eliminar el producto?')
                            );
                        echo "</td>";
                    echo "</tr>";
                ?>
                <?php endforeach; ?>
                <?php unset($resource); ?>
            </table>
        </div>
        <div class="center_pagination">
            <ul class="pagination">
                <li><?php echo $this->Paginator->numbers(array('separator' => '')); ?></li>
            </ul>
        </div>
    <?php
    }
}
    // Si no estoy loggeado o si no soy admin
    else
    {
        ?> <h1> NOTHING TO SEE HERE... </h1> <?php
    }
    ?>