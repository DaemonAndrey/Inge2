<!-- src/Template/Resources/view.ctp -->
<?php echo $this->Html->css('registro.css'); ?>

<div class="users form">
    <?= $this->Form->create($resource) ?>

    <!-- TÍTULO -->
    <div class="row">
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <legend>
                <div class='text-center'>
                    <h1><?= $resource->resource_name ?></h1>
                    <br>
                </div>
            </legend>
        </div>
    </div> <!-- FIN TÍTULO -->

    <!-- CAMPOS A LLENAR -->
    <fieldset>
        <!-- TIPO -->
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>
                    <?=
                        $this->Form->label('Resources.resource_type', 'Tipo: ');
                    ?>
                </div>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>
                    <?=
                        $this->Form->label('Resources.resource_type', $r_type[0]);
                    ?>
                    <br><br>
                </div>
            </div>
            <br>
        </div>
        
        <!-- NOMBRE -->
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>
                    <?=
                        $this->Form->label('Resources.resource_name', 'Nombre: ');
                    ?>
                </div>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>
                    <?=
                        $this->Form->label('Resources.resource_name', $resource->resource_name);
                    ?>
                    <br><br>
                </div>
            </div>
            <br>
        </div>
        
        <!-- PLACA/SERIE -->
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>
                    <?=
                        $this->Form->label('Resources.resource_code', 'Placa/serie: ');
                    ?>
                </div>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>
                    <?=
                        $this->Form->label('Resources.resource_code', $resource->resource_code);
                    ?>
                    <br><br>
                </div>
            </div>
            <br>
        </div>
        
        <!-- DESCRIPCIÓN -->
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>
                    <?=
                        $this->Form->label('Resources.description', 'Descripción: ');
                    ?>
                </div>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>
                    <?=
                        $this->Form->label('Resources.description', $resource->description);
                    ?>
                    <br><br>
                </div>
            </div>
            <br>
        </div>
        
        <!-- ACTIVO -->
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>
                    <?=
                        $this->Form->label('Resources.active', 'Activo: ');
                    ?>
                </div>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>
                    <?php
                        if( $resource->active == 0 )
                        {
                            echo $this->Form->label('Resources.active', "No");
                        }
                        else
                        {
                            echo $this->Form->label('Resources.active', "Sí");
                        }
                    ?>
                </div>
            </div>
            <br><br>
        </div>
        
        <!-- ADMINISTRADORES -->
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>
                    <?=
                    $this->Form->label('ResourcesUsers.user_id', 'Administradores: ');
                    ?>
                </div>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>

                </div>
            </div>
            <br><br>
        </div>
    </fieldset> <!-- FIN CAMPOS A LLENAR -->

    <!-- BOTONES -->
    <div class='row  text-center' id="btnRegistrar">
        <div class='col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1'>
            <br>
            <?= $this->Html->link('Regresar', array('controller' => 'resources','action'=> 'index'), array( 'class' => 'btn btn-warning')) ?>
        </div>
    </div> <!-- FIN BOTONES -->

    <legend>
        <br>
    </legend>

    <?= $this->Form->end() ?>
</div>