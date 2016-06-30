<?php echo $this->Html->css('registro.css'); ?>
<div class="users form">
    <!-- MENSAJES -->
    <div class="lead text-danger" style="text-align:center">
        <?= $this->Flash->render('addUserError') ?> 
    </div>
    <!-- FIN DE MENSAJES -->
    
    <?= $this->Form->create($user) ?>
    
    <fieldset>
        <!-- TÍTULO -->
        <legend>
            <div class='text-center'>
                <h2>Formulario de Registro</h2>
                <br>
            </div>
        </legend>
        <!-- FIN DE TÍTULO -->
        
        <div class='row'>
            <!-- NOMBRE -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                <?= $this->Form->input('first_name', ['label' => 'Nombre * ', 'placeholder' => 'Nombre Completo ', 'class' => 'form-control']) ?>
                <br>
            </div>
            
            <!-- APELLIDOS -->
            <div class='col-md-5 col-md-offset-0 col-sm-5 col-sm-offset-0 col-xs-10 col-xs-offset-1'>
                <?= $this->Form->input('last_name', ['label' => 'Apellidos * ', 'placeholder' => 'Apellido(s)', 'class' => 'form-control']) ?>
                <br>
            </div>
        </div>
        
        <div class ="row">
            <!-- CORREO -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                <?= $this->Form->input('username', ['type' => 'email','label' => 'Correo Institucional * ', 'placeholder' => 'usuario@ucr.ac.cr', 'class' => 'form-control']) ?>
                <br>
            </div>
            
            <!-- TELÉFONO -->
            <div class='col-md-5 col-md-offset-0 col-sm-5 col-sm-offset-0 col-xs-10 col-xs-offset-1'>
                <?= $this->Form->input('telephone_number', ['label' => 'Teléfono * ', 'placeholder' => 'Sin guiones ni espacios', 'class' => 'form-control']) ?>
                <br>
            </div>
        </div>
        
        <div class="row">
            <!-- UNIDAD ACADÉMICA -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                <?= $this->Form->input('department', ['label' => 'Unidad Académica * ',
                                                      'options' => ['Biblioteca'    => 'Biblioteca',
                                                                    'Decanato' => 'Decanato',
                                                                    'Instituto de Investigación en Educación INIE' => 'Instituto de Investigación en Educación INIE',
                                                                    'Escuela Administración Educativa'  => 'Escuela Administración Educativa',
                                                                    'Escuela Bibliotecología y Ciencias de la Información'  => 'Escuela Bibliotecología y Ciencias de la Información',
                                                                    'Escuela Educación Física y Deportes'   => 'Escuela Educación Física y Deportes',
                                                                    'Escuela de Formación Docente'  => 'Escuela de Formación Docente',
                                                                    'Escuela de Orientación y Educación Especial'   => 'Escuela de Orientación y Educación Especial'
                                                                   ],
                                                      'class' => 'form-control']) ?>
                <br>
            </div>
            
            <!-- PUESTO -->
            <div class='col-md-5 col-md-offset-0 col-sm-5 col-sm-offset-0 col-xs-10 col-xs-offset-1'>
                <?= $this->Form->input('position', ['label' => 'Puesto * ', 'options' => array(
                                                                                                  'Administrativo'  => 'Administrativo',
                                                                                                  'Docente'         => 'Docente'
                ), 'class' => 'form-control']); ?>
            </div>
        </div>
        
        <?php
        if($user_role == 3)
        {
            ?>
            <!-- ROL -->
            <div class="row">
                <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                    <?= $this->Form->input('role_id', ['label' => 'Rol * ', 'options' => array('1' => 'Regular',
                                                                                              '2' => 'Administrador',
                                                                                              '3' => 'SuperAdministrador'),
                                                        'class' => 'form-control']); ?>
                </div>
            </div>
            <?php
        }
        ?>
        
        <!-- MENSAJES -->
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <div class="col-xs-12">
                    <h5>Campos obligatorios (<font color="red">*</font>) </h5>
                </div>
            </div>
        </div>
        <!-- FIN DE MENSAJES -->
        
   </fieldset>
    
    
    <!-- BOTONES -->
    <div class='row  text-center' id="btnRegistrar">
        <div class='col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1'>
            <br>
            <?= $this->Form->button('Enviar Solicitud', ['class' => 'btn btn-success']); ?>

            <?php
            if($user_role == 3)
            {
                echo $this->Html->link('Regresar', array('controller' => 'Users', 'action'=> 'index'), array( 'class' => 'btn btn-primary', 'style' => 'width:123px'));
            }
            else
            {
                echo $this->Html->link('Regresar', array('controller' => 'pages', 'action'=> 'home'), array( 'class' => 'btn btn-primary', 'style' => 'width:123px'));
            }
            ?>
        </div>
    </div>
    <!-- FIN DE BOTONES -->
    
    
    <legend><br></legend>
    
     <!-- INFORMACIÓN -->
    <div class="row" align="center" style="font-size:18px">
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            Al finalizar la solicitud de registro, se enviará una confirmación a su correo.
        </div>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            Esta confirmación es necesaria para poder ingresar al sistema de reservación de recursos.
        </div>
    </div>
    <!-- FIN DE INFORMACIÓN -->

<?= $this->Form->end() ?>
</div>

