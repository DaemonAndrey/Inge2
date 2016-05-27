<!-- src/Template/Resources/view.ctp -->
<?php echo $this->Html->css('registro.css'); ?>

<div class="users form">
    <?= $this->Form->create($resource) ?>

    <!-- TÍTULO -->
    <div class="row">
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <legend>
                <div class='text-center'>
                    <h2><?= $resource->resource_name ?></h2>
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
                        $this->Form->label('Resources.resource_type_id', 'Tipo: '); 
                    ?>
                </div>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
                    <?=
                        $this->Form->label('Resources.resource_type_id',
                                           $r_type[0],
                                           ['class' => 'form-control',
                                            'style' => 'display:inline-table;',
                                            'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                    ?>
                    <br><br>
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
                    <?=
                        $this->Form->label('Resources.resource_name',
                                           $resource->resource_name,
                                           ['class' => 'form-control',
                                            'style' => 'display:inline-table;',
                                            'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                    ?>
                    <br><br>
                </div>
            </div>
        </div>
        
        <!-- PLACA/SERIE -->
        <?php
        // Si soy administrador o superadmin
        if( $user_role == 2 || $user_role == 3 )
        {
            ?>
            <div class="row">
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-12'>
                        <?=
                            $this->Form->label('Resources.resource_code', 'Placa/serie: ');
                        ?>
                    </div>
                    <div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
                        <?=
                            $this->Form->label('Resources.resource_code',
                                               $resource->resource_code,
                                               ['class' => 'form-control',
                                                'style' => 'display:inline-table;',
                                                'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                        ?>
                        <br><br>
                    </div>
                </div>
            </div>
            <?php
        } ?>
        
        <!-- DESCRIPCIÓN -->
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-12'>
                    <?=
                        $this->Form->label('Resources.description', 'Descripción: ');
                    ?>
                </div>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
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
        
        <?php
        // Si soy administrador o superadmin
        if( $user_role == 2 || $user_role == 3 )
        {
            ?>
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
                                                'style' => 'display:inline-table;',
                                                'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                            }
                            else
                            {
                                echo $this->Form->label('Resources.active',
                                               "Sí",
                                               ['class' => 'form-control',
                                                'style' => 'display:inline-table;',
                                                'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                            }
                        ?>
                        <br><br>
                    </div>
                </div>
            </div>

            <!-- ADMINISTRADORES LABEL -->
            <div class="row">
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-12'>
                        <?=
                        $this->Form->label('ResourcesUsers.user_id', 'Administradores: ');
                        ?>
                    </div>
                    <div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
                    </div>
                </div>
            </div>
        
            <!-- ADMINISTRADORES LABEL -->
            <?php
                // Recorre todos los recursos y los muestra en la tabla.
                foreach ( $admins_assoc as $admin ):
                    ?>
                        <div class="row">
                            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                <div class='col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-12'>
                                </div>
                                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
                                    <?= $admin['username']; ?>
                                </div>
                            </div>
                        </div>
                    <?php
                endforeach;
                unset($admin);
            ?>
            <br>

            <?php
        } ?>
    </fieldset> <!-- FIN CAMPOS A CONSULTAR -->

    <!-- BOTONES -->
    <div class='row  text-center' id="btnRegistrar">
        <div class='col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1'>
            <br>
            <?= $this->Html->link('Regresar', array('controller' => 'resources','action'=> 'index'), array( 'class' => 'btn btn-danger')) ?>
        </div>
    </div> <!-- FIN BOTONES -->

    <legend>
        <br>
    </legend>

    <?= $this->Form->end() ?>
</div>