<!-- src/Template/Users/view.ctp -->
<?php echo $this->Html->css('registro.css'); ?>

<div class="users form">
    <?= $this->Form->create($user) ?>

    <!-- TÍTULO -->
    <div class="row">
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <legend>
                <div class='text-center'>
                    <h2><?= $user->first_name . " " . $user->last_name ?></h2>
                    <br>
                </div>
            </legend>
        </div>
    </div> <!-- FIN TÍTULO -->

    <!-- CAMPOS A CONSULTAR -->
    <fieldset>
        
        <!-- Correo -->
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-12'>
                    <?=
                        $this->Form->label('Users.username', 'Correo: ');
                    ?>
                </div>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
                    <?=
                        $this->Form->label('Users.username',
                                           $user->username,
                                           ['class' => 'form-control',
                                            'style' => 'display:inline-table;',
                                            'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                    ?>
                    <br><br>
                </div>
            </div>
        </div>
        
        <!-- NOMBRE -->
        <!--
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-12'>
                    <?=
                        $this->Form->label('Users.first_name', 'Nombre Completo: ');
                    ?>
                </div>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
                    <?=
                        $this->Form->label('Users.first_name',
                                           $user->first_name . ' ' . $user->last_name,
                                           ['class' => 'form-control',
                                            'style' => 'display:inline-table;',
                                            'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                    ?>
                    <br><br>
                </div>
            </div>
        </div>
        -->
        
        <!-- APELLIDO -->
        <!--<div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-12'>
                    <?=
                        $this->Form->label('Users.last_name', 'Apellido: ');
                    ?>
                </div>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
                    <?=
                        $this->Form->label('Users.last_name',
                                           $user->last_name,
                                           ['class' => 'form-control',
                                            'style' => 'display:inline-table;',
                                            'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                    ?>
                    <br><br>
                </div>
            </div>
        </div>
        -->
        
        <!-- NUMERO DE TELEFONO -->
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-12'>
                    <?=
                        $this->Form->label('Users.telephone_number', 'Teléfono: ');
                    ?>
                </div>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
                    <?=
                        $this->Form->label('Users.telephone_number',
                                           $user->telephone_number,
                                           ['class' => 'form-control',
                                            'style' => 'display:inline-table;',
                                            'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                    ?>
                    <br><br>
                </div>
            </div>
        </div>
        
        <!-- Departamento -->
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-12'>
                    <?=
                        $this->Form->label('Users.department', 'Unidad Académica: ');
                    ?>
                </div>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
                    <?=
                        $this->Form->label('Users.department',
                                           $user->department,
                                           ['class' => 'form-control',
                                            'style' => 'display:inline-table;',
                                            'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                    ?>
                    <br><br>
                </div>
            </div>
        </div>
        
        <!-- Departamento -->
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-12'>
                    <?=
                        $this->Form->label('Users.position', 'Puesto: ');
                    ?>
                </div>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
                    <?=
                        $this->Form->label('Users.position',
                                           $user->position,
                                           ['class' => 'form-control',
                                            'style' => 'display:inline-table;',
                                            'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                    ?>
                    <br><br>
                </div>
            </div>
        </div>
        
        <!-- Rol -->
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-12'>
                    <?=
                        $this->Form->label('Roles.role_name', 'Rol: ');
                    ?>
                </div>
                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
                    <?=
                        $this->Form->label('Roles.role_name',
                                           $user->_matchingData['Roles']->role_name,
                                           ['class' => 'form-control',
                                            'style' => 'display:inline-table;',
                                            'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                    ?>
                    <br><br>
                </div>
            </div>
        </div>
        
        
    </fieldset> <!-- FIN CAMPOS A CONSULTAR -->

    <!-- BOTONES -->
    <div class='row  text-center' id="btnRegistrar">
        <div class='col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1'>
            <br>
            <?= $this->Html->link('Regresar', array('controller' => 'users','action'=> 'index'), array( 'class' => 'btn btn-danger')) ?>
        </div>
    </div> <!-- FIN BOTONES -->

    <legend>
        <br>
    </legend>

    <?= $this->Form->end() ?>
</div>