<?php echo $this->Html->css('registro.css'); ?>

<div class="users form">
    <!-- MENSAJES --> 
    <div class="lead text-danger" style="text-align:center">
        <?= $this->Flash->render('editUserError') ?> 
    </div> 
    <div class="lead text-info" style="text-align:center">
        <?= $this->Flash->render('editUserSuccess') ?>
    </div>
    <!-- FIN DE MENSAJES -->
    
    <?= $this->Form->create($user) ?>

    <!-- TÍTULO -->
    <div class="row">
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <legend>
                <div class='text-center'>
                    <?php
                    // SI EL USUARIO ESTÁ ACEPTADO
                    if($user['state'] == true)
                    {
                        if($user->username == $user_username)
                        {
                            ?>
                            <h2>Actualizar Mi Cuenta</h2>
                            <?php
                        }
                        else
                        {
                            ?>
                            <h2>Actualizar Usuario</h2>
                            <?php
                        }
                    }
                    else
                    {
                        ?>
                        <h2>Aprobar/Rechazar Usuario</h2>
                        <?php
                    }
                    ?>
                    
                    <br>
                </div>
            </legend>
        </div>
    </div>
    <!-- FIN TÍTULO -->

   
    <!-- CAMPOS A LLENAR -->
    <fieldset>
        
        <div class="row">
            <!-- NOMBRE -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                <?=
                    $this->Form->label('Users.first_name', 'Nombre Completo: ');
                ?>
                <?=
                    $this->Form->label('Users.first_name', $user->first_name . ' ' . $user->last_name,
                                       ['class' => 'form-control',
                                        'style' => 'display:inline-table;',
                                        'readonly' => 'readonly',
                                        'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                ?>
                <br><br>
            </div>
            
            <!-- ROL -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-0 col-sm-offset-0 col-xs-offset-1'>
                <?php
                    $rol = "";
                    if($user->role_id == 1)
                    {
                        $rol = "Regular";
                    }
                    else if($user->role_id == 2)
                    {
                        $rol = "Administrador";
                    }
                    else if($user->role_id == 3)
                    {
                        $rol = "SuperAdministrador";
                    }
                    ?>
                    <?=
                        $this->Form->label('Users.role_id', 'Rol: ');
                    ?>
                    <?=
                        $this->Form->label('Users.role_id', $rol,
                                           ['class' => 'form-control',
                                            'style' => 'display:inline-table;',
                                            'readonly' => 'readonly',
                                            'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                ?>
                <br><br>
            </div>
        </div>
        
        <div class="row">
            <!-- CORREO -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                <?=
                    $this->Form->label('Users.username', 'Correo: ');
                ?>
                <?=
                    $this->Form->label('Users.username', $user->username,
                                       ['class' => 'form-control',
                                        'style' => 'display:inline-table;',
                                        'readonly' => 'readonly',
                                        'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                ?>
                <br><br>
            </div>
            
            <!-- TELÉFONO -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-0 col-sm-offset-0 col-xs-offset-1'>
                <?php
                // SI EL USUARIO NO ESTA ACEPTADO
                if($user['state'] == false)
                {
                    ?>
                    <?=
                        $this->Form->label('Users.telephone_number', 'Teléfono: ');
                    ?>
                    <?=
                        $this->Form->label('Users.telephone_number', $user->telephone_number,
                                           ['class' => 'form-control',
                                            'style' => 'display:inline-table;',
                                            'readonly' => 'readonly',
                                            'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                    ?>
                    <br>
                    <?php    
                } 
                // SI EL USUARIO ESTA ACEPTADO
                else
                {
                    ?> 
                    <?=
                        $this->Form->input('Users.telephone_number', ['label' => 'Teléfono: ',
                                                                      'class' => 'form-control']);
                    ?>
                    <?php     
                }
                ?>     
                <br>
            </div>
        </div>
        
        <div class="row">
            <!-- UNIDAD ACADÉMICA -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                <?=
                    $this->Form->label('Users.department', 'Unidad Académica: ');
                ?>
                <?=
                    $this->Form->label('Users.department', $user->department,
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
                    $this->Form->label('Users.position', $user->position,
                                       ['class' => 'form-control',
                                        'style' => 'display:inline-table;',
                                        'readonly' => 'readonly',
                                        'templates' => ['formGroup' => '<div>{{label}}</div>']]);
                ?>
                <br><br>
            </div>
        </div>
        
        <?php
        // SI EL USUARIO ESTA ACEPTADO
        if($user['state'] == true && $user_role == 3)
        {
            ?>
            <div class="row">
                <!-- ROL -->
                <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                    <?= $this->Form->input('Users.role_id',
                                           ['label' => 'Rol: ',
                                            'options' => ['1' => 'Regular',
                                                          '2' => 'Administrador',
                                                          '3' => 'SuperAdministrador'
                                                         ],
                                            'class' => 'form-control']);
                    ?>
                    <br>
                </div>
                
                <!-- VACÍO -->
                <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-0 col-sm-offset-0 col-xs-offset-1'>
                </div>
            </div>
            <?php
        }
        ?>
        
    </fieldset> <!-- FIN CAMPOS A LLENAR -->

    <!-- BOTONES -->
    <div class='row  text-center' id="btnEdit">
        <div class='col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1'>
            <br>
             <?php
                // SI EL USUARIO NO ESTA ACEPTADO
                if($user['state'] == false)
                {
                    ?>
                    <?= $this->Form->postLink($this->Html->tag('span',null,array('type'  => 'hidden')),
                                                array('controller' => 'users','action' => 'add', $user->id),
                                                array('escape' => false)); ?>

                    <?= $this->Form->postLink($this->Html->tag('span','Aprobar',array('class'  => 'btn btn-success', 'style' => 'width:91px')),
                                                array('controller' => 'users','action' => 'confirm', $user->id),
                                                array('escape' => false)); ?>

                    <?= $this->Form->postLink($this->Html->tag('span','Rechazar',array('class' => 'btn btn-danger')),
                                                array('controller' => 'users','action' => 'reject', $user->id),
                                                array('escape' => false)); ?>

                    <?= $this->Html->link('Regresar', array('controller' => 'users', 'action'=> 'index'), array( 'class' => 'btn btn-primary', 'style' => 'width:91px')) ?>
                   
                <?php    
                } 
                // SI EL USUARIO ESTA ACEPTADO
                else
                {
                    ?>
                    <?= $this->Form->button('Actualizar', ['class' => 'btn btn-success']); ?>

                    <?php if($user_role == 3)
                    {
                        ?>
                        <?= $this->Html->link('Regresar', array('controller' => 'users','action'=> 'index'), array( 'class' => 'btn btn-primary'))?>
                        <?php
                    }
                    else
                    {
                        ?>
                        <?= $this->Html->link('Regresar', array('controller' => 'pages','action'=> 'home'), array( 'class' => 'btn btn-primary')) ?>
                        <?php
                    }
                    ?>
                <?php     
                }
                ?>     
        </div>
    </div>
    <!-- FIN DE BOTONES -->

    <legend>
        <br>
    </legend>

    <?= $this->Form->end() ?>
</div>