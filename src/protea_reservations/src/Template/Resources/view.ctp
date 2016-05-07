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

    <!-- CAMPOS A CONSULTAR -->
    <fieldset>
        <!-- TIPO -->
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-12'>
                    <?=
                        $this->Form->label('Resources.resource_type', 'Tipo: '); 
                    ?>
                </div>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
                    <!--
                    <?=
                        $this->Form->label('Resources.resource_type', $r_type[0]);
                    ?>
                    -->
                    <?=
                        $this->Form->label('Resources.resource_type',
                                           $r_type[0],
                                           ['class' => 'form-control',
                                            'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                    ?>
                    <br>
                </div>
            </div>
        </div>
        
        <!-- NOMBRE -->
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-12'>
                    <?=
                        $this->Form->label('Resources.resource_name', 'Nombre: ');
                    ?>
                </div>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
                    <!--
                    <?=
                        $this->Form->label('Resources.resource_name', $resource->resource_name);
                    ?>
                    -->
                    <?=
                        $this->Form->label('Resources.resource_name',
                                           $resource->resource_name,
                                           ['class' => 'form-control',
                                            'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                    ?>
                    <br>
                </div>
            </div>
        </div>
        
        <!-- PLACA/SERIE -->
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-12'>
                    <?=
                        $this->Form->label('Resources.resource_code', 'Placa/serie: ');
                    ?>
                </div>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
                    <!--
                    <?=
                        $this->Form->label('Resources.resource_code', $resource->resource_code);
                    ?>
                    -->
                    <?=
                        $this->Form->label('Resources.resource_code',
                                           $resource->resource_code,
                                           ['class' => 'form-control',
                                            'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                    ?>
                    <br>
                </div>
            </div>
        </div>
        
        <!-- DESCRIPCIÓN -->
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-12'>
                    <?=
                        $this->Form->label('Resources.description', 'Descripción: ');
                    ?>
                </div>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
                    <!--
                    <?=
                        $this->Form->label('Resources.description', $resource->description);
                    ?>
                    -->
                    <?=
                        $this->Form->label('Resources.description',
                                           $resource->description,
                                           ['class' => 'form-control',
                                            'style' => 'display:inline-table;',
                                            'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                    ?>
                    <br><br>
                </div>
            </div>
        </div>
        
        <!-- ACTIVO -->
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-12'>
                    <?=
                        $this->Form->label('Resources.active', 'Activo: ');
                    ?>
                </div>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
                    <?php
                        if( $resource->active == 0 )
                        {
                            echo $this->Form->label('Resources.active',
                                           "No",
                                           ['class' => 'form-control',
                                            'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                        }
                        else
                        {
                            echo $this->Form->label('Resources.active',
                                           "Sí",
                                           ['class' => 'form-control',
                                            'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                        }
                    ?>
                    <br>
                </div>
            </div>
        </div>
        
        <!-- ADMINISTRADORES -->
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-12'>
                    <?=
                    $this->Form->label('ResourcesUsers.user_id', 'Administradores: ');
                    ?>
                </div>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
                    <br>
                </div>
            </div>
        </div>
    </fieldset> <!-- FIN CAMPOS A CONSULTAR -->

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