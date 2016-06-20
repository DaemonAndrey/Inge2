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
        
        <div class="row">
            <!-- CORREO -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                <?=
                    $this->Form->label('Users.username', 'Correo: ');
                ?>
                <?=
                    $this->Form->label('Users.username',
                                       $user->username,
                                       ['class' => 'form-control',
                                        'style' => 'display:inline-table;',
                                        'readonly' => 'readonly',
                                        'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                ?>
                <br><br>
            </div>
            <!-- NUMERO DE TELEFONO -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-0 col-sm-offset-0 col-xs-offset-1'>
                <?=
                    $this->Form->label('Users.telephone_number', 'Teléfono: ');
                ?>
                <?=
                    $this->Form->label('Users.telephone_number',
                                       $user->telephone_number,
                                       ['class' => 'form-control',
                                        'style' => 'display:inline-table;',
                                        'readonly' => 'readonly',
                                        'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                ?>
                <br><br>
            </div>
        </div>
        
        <div class="row">
            <!-- UNIDAD ACADÉMICA -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                <?=
                    $this->Form->label('Users.department', 'Unidad Académica: ');
                ?>
                <?=
                    $this->Form->label('Users.department',
                                       $user->department,
                                       ['class' => 'form-control',
                                        'style' => 'display:inline-table;',
                                        'readonly' => 'readonly',
                                        'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                ?>
                <br><br>
            </div>
            <!-- PUESTO -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-0 col-sm-offset-0 col-xs-offset-1'>
                <?=
                    $this->Form->label('Users.position', 'Puesto: ');
                ?>
                <?=
                    $this->Form->label('Users.position',
                                       $user->position,
                                       ['class' => 'form-control',
                                        'style' => 'display:inline-table;',
                                        'readonly' => 'readonly',
                                        'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                ?>
                <br><br>
            </div>
        </div>
        
        <div class="row">
            <!-- ROL -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                <?=
                    $this->Form->label('Roles.role_name', 'Rol: ');
                ?>
                <?=
                    $this->Form->label('Roles.role_name',
                                       $user->_matchingData['Roles']->role_name,
                                       ['class' => 'form-control',
                                        'style' => 'display:inline-table;',
                                        'readonly' => 'readonly',
                                        'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                ?>
                <br><br>
            </div>
            <!-- VACÍO -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-0 col-sm-offset-0 col-xs-offset-1'>
            </div>
        </div>
        
    </fieldset> <!-- FIN CAMPOS A CONSULTAR -->

    <!-- BOTONES -->
    <div class='row  text-center' id="btnRegistrar">
        <div class='col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1'>
            <br>
            <?= $this->Html->link('Regresar', array('controller' => 'users','action'=> 'index'), array( 'class' => 'btn btn-primary')) ?>
        </div>
    </div> <!-- FIN BOTONES -->

    <legend>
        <br>
    </legend>

    <?= $this->Form->end() ?>
</div>