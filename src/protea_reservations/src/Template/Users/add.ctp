
<!-- src/Template/Users/registrar.ctp -->
<?php echo $this->Html->css('registro.css'); ?>
<div class="users form">
    <div style="text-align:center">
        <?= $this->Flash->render('addUserError') ?>   
        <br>
    </div>
<?= $this->Form->create($user) ?>
    <fieldset>
        <legend>
            <div class='text-center'>
                <h2>Formulario de Registro</h2>
                <br>
            </div>
        </legend>
        
        <div class='row'>
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                <?= $this->Form->input('first_name', ['label' => 'Nombre: ', 'placeholder' => 'Luis Carlos ', 'class' => 'form-control']) ?>
                <br>
            </div>
            
            <div class='col-md-5 col-md-offset-0 col-sm-5 col-sm-offset-0 col-xs-10 col-xs-offset-1'>
                <?= $this->Form->input('last_name', ['label' => 'Apellidos: ', 'placeholder' => 'Brenes Aguilar', 'class' => 'form-control']) ?>
                <br>
            </div>
        </div>
        
        <div class="row">
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                    <?= $this->Form->input('password', ['type' => 'password', 'label' => 'Contraseña: ', 'placeholder' => 'Al menos 8 caractéres', 'class' => 'form-control']) ?>
                    <br>
            </div>
            <div class='col-md-5 col-md-offset-0 col-sm-5 col-sm-offset-0 col-xs-10 col-xs-offset-1'>
                    <?= $this->Form->input('repass', ['type' => 'password', 'label' => 'Reingrese la contraseña: ', 'placeholder' => 'Al menos 8 caractéres', 'class' => 'form-control']) ?>
                    <br>
            </div>
        </div> 
        
        <div class ="row">
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                <?= $this->Form->input('username', ['type' => 'email','label' => 'Correo Institucional: ', 'placeholder' => 'usuario@ucr.ac.cr', 'class' => 'form-control']) ?>
                <br>
            </div>

            <div class='col-md-5 col-md-offset-0 col-sm-5 col-sm-offset-0 col-xs-10 col-xs-offset-1'>
                <?= $this->Form->input('telephone_number', ['label' => 'Teléfono: ', 'placeholder' => '80808080', 'class' => 'form-control']) ?>
                <br>
            </div>
        </div>
        
        <div class="row">
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                <?= $this->Form->input('department', ['label' => 'Unidad Académica: ',
                                        'options' => array(
                                                        'Escuela Administración Educativa'  => 'Escuela Administración Educativa',
                                                        'Escuela Bibliotecología y Ciencias de la Información'  => 'Escuela Bibliotecología y Ciencias de la Información',
                                                        'Escuela Educación Física y Deportes'   => 'Escuela Educación Física y Deportes',
                                                        'Escuela de Formación Docente'  => 'Escuela de Formación Docente',
                                            
                                                        'Escuela de Orientación y Educación Especial'   => 'Escuela de Orientación y Educación Especial',
                                                        'Instituto de Investigación en Educación INIE' => 'Instituto de Investigación en Educación INIE',
                                                        'Biblioteca'    => 'Biblioteca'

                ),  'class' => 'form-control']) ?>
                <br>
            </div>

            <div class='col-md-5 col-md-offset-0 col-sm-5 col-sm-offset-0 col-xs-10 col-xs-offset-1'>
                <?= $this->Form->input('position', ['label' => 'Puesto: ', 'options' => array(
                                                                                                  'Administrativo'  => 'Administrativo',
                                                                                                  'Docente'         => 'Docente'
                ), 'class' => 'form-control']); ?>
            </div>
        </div>
        
   </fieldset>
    <div class='row  text-center' id="btnRegistrar">
        <div class='col-md-12 col-md-offset-0 col-sm-10 col-xs-10 col-xs-offset-1'>
            <br>
            <?= $this->Form->button(__('Enviar Solicitud'), ['class' => 'btn btn-info']); ?>
        </div>
    </div>
    
    
    <legend><br></legend>
    
     <!-- INFO -->
    <div class="row" align="center" style="font-size:18px">
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            Al finalizar la solicitud de registro, se enviará una confirmación a su correo.
        </div>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            Esta confirmación es necesaria para poder ingresar al sistema de reservación de recursos.
        </div>
    </div>

<?= $this->Form->end() ?>
</div>

