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
        <div class="row">
            <!-- TIPO -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                <?=
                    $this->Form->label('Resources.resource_type_id', 'Tipo: '); 
                ?>
                <?=
                    $this->Form->label('Resources.resource_type_id',
                                       $r_type[0],
                                       ['class' => 'form-control',
                                        'style' => 'display:inline-table;',
                                        'readonly' => 'readonly',
                                        'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                ?>
                <br><br>
            </div>
            <!-- MARCA/MODELO -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-0 col-sm-offset-0 col-xs-offset-1'>
                <?=
                    $this->Form->label('Resources.resource_name', 'Marca/Modelo: ');
                ?>
                <?=
                    $this->Form->label('Resources.resource_name',
                                       $resource->resource_name,
                                       ['class' => 'form-control',
                                        'style' => 'display:inline-table;',
                                        'readonly' => 'readonly',
                                        'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                ?>
                <br><br>
            </div>
        </div>
        
        <?php
        // Si soy administrador o superadmin
        if( $user_role == 2 || $user_role == 3 )
        {
            ?>
            <div class="row">
                <!-- PLACA/SERIE -->
                <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                    <?=
                        $this->Form->label('Resources.resource_code', 'Placa/serie: ');
                    ?>
                    <?=
                        $this->Form->label('Resources.resource_code',
                                           $resource->resource_code,
                                           ['class' => 'form-control',
                                            'style' => 'display:inline-table;',
                                            'readonly' => 'readonly',
                                            'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                    ?>
                    <br><br>
                </div>
                <!-- ACTIVO -->
                <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-0 col-sm-offset-0 col-xs-offset-1'>
                    <?=
                        $this->Form->label('Resources.active', 'Habilitado: ');
                    ?>
                    <?php
                        if( $resource->active == 0 )
                        {
                            echo $this->Form->label('Resources.active',
                                           "No",
                                           ['class' => 'form-control',
                                            'style' => 'display:inline-table;',
                                            'readonly' => 'readonly',
                                            'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                        }
                        else
                        {
                            echo $this->Form->label('Resources.active',
                                           "Sí",
                                           ['class' => 'form-control',
                                            'style' => 'display:inline-table;',
                                            'readonly' => 'readonly',
                                            'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                        }
                    ?>
                    <br><br>
                </div>
            </div>
            <?php
        } ?>
        
        <div class="row">
            <!-- DESCRIPCIÓN -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                <?=
                    $this->Form->label('Resources.description', 'Descripción: ');
                ?>
                <?=
                    $this->Form->label('Resources.description',
                                       $resource->description,
                                       ['class' => 'form-control',
                                        'style' => 'display:inline-table;',
                                        'readonly' => 'readonly',
                                        'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                ?>
                <br><br>
            </div>
            <!-- ADMINISTRADORES LABEL -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-0 col-sm-offset-0 col-xs-offset-1'>
                <?php
                // Si soy administrador o superadmin
                if( $user_role == 2 || $user_role == 3 )
                {
                    // Recorre todos los recursos y los muestra en la tabla.
                    $todosLosAdmin = "";
                    foreach ( $admins_assoc as $admin ):
                        //echo $admin['first_name'] . " " . $admin['last_name'];
                        $todosLosAdmin = $todosLosAdmin . $admin['first_name'] . " " . $admin['last_name'] . ", ";
                    endforeach;
                    unset($admin);
                    
                    $todosLosAdmin = substr($todosLosAdmin, 0, -2); // Le quito la última coma
                    ?>
                
                    <?=
                        $this->Form->label('ResourcesUsers.user_id', 'Administradores: ');
                    ?>
                    <?=
                        $this->Form->label('ResourcesUsers.user_id',
                                           $todosLosAdmin,
                                           ['class' => 'form-control',
                                            'style' => 'display:inline-table;',
                                            'readonly' => 'readonly',
                                            'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                    ?>
                    <?php
                } ?>
                <br><br>
            </div>
        </div>

    </fieldset> <!-- FIN CAMPOS A CONSULTAR -->

    <!-- BOTONES -->
    <div class='row  text-center' id="btnRegistrar">
        <div class='col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1'>
            <br>
            <?= $this->Html->link('Regresar', array('controller' => 'resources','action'=> 'index'), array( 'class' => 'btn btn-primary')) ?>
        </div>
    </div> <!-- FIN BOTONES -->

    <legend>
        <br>
    </legend>

    <?= $this->Form->end() ?>
</div>