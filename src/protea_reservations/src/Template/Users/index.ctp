<!-- src/Template/Users/index.ctp -->
<?php echo $this->Html->css('resources.css'); ?>

<br>

<!-- MENSAJES -->
<div class="lead text-info" style="text-align:center">

</div> <!-- FIN DE MENSAJES -->

<!-- TÍTULO -->
<div class="row">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <legend>
            <div class='text-center'>
                <h2>Administrar Cuentas de Usuarios</h2>
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
            echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Agregar usuario',
                                   array('controller'=>'Users','action' => 'add'),
                                   array('target' => '_self', 'escape' => false)
                                  );
            ?>
        </div>
    </div>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <br>
    </div>
</div> <!-- FIN BOTONES -->
