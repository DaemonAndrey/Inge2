
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
                <br>
                <h1>Formulario de Registro</h1>
                <br>
            </div>
        </legend>
        
        <div class='row'>
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1'>
                <?= $this->Form->input('username', ['type' => 'email','label' => 'Correo Institucional: ', 'placeholder' => 'usuario@ucr.ac.cr', 'class' => 'form-control']) ?>
                <br>
            </div>
            <div class='col-md-5 col-sm-5 col-xs-10'>
                <?= $this->Form->input('first_name', ['label' => 'Nombre: ', 'placeholder' => 'Luis Carlos ', 'class' => 'form-control']) ?>
                <br>
            </div>
        </div>
        
        <div class ="row">
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1'>
                <?= $this->Form->input('last_name', ['label' => 'Apellidos: ', 'placeholder' => 'Brenes Aguilar', 'class' => 'form-control']) ?>
                <br>
            </div>

            <div class='col-md-5 col-sm-5 col-xs-10'>
                <?= $this->Form->input('telephone_number', ['label' => 'Teléfono: ', 'placeholder' => '80808080', 'class' => 'form-control']) ?>
                <br>
            </div>
        </div>
        
        <div class="row">
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1'>
                    <?= $this->Form->input('password', ['type' => 'password', 'label' => 'Contraseña: ', 'placeholder' => 'Al menos 8 caractéres', 'class' => 'form-control']) ?>
                    <br>
            </div>
            <div class='col-md-5 col-sm-5 col-xs-10'>
                    <?= $this->Form->input('repass', ['type' => 'password', 'label' => 'Reingrese la contraseña: ', 'placeholder' => 'Al menos 8 caractéres', 'class' => 'form-control']) ?>
                    <br>
            </div>
        </div>        
        
        <div class="row">
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1'>
                <?= $this->Form->input('department', ['label' => 'Escuela/Institución: ', 'placeholder' => 'Educación/Protea', 'class' => 'form-control']) ?>
                <br>
            </div>

            <div class='col-md-5 col-sm-5 col-xs-10'>
                <?= $this->Form->input('position', ['label' => 'Posición: ', 'options' => array(
                                                                                                  'Administrativo'  => 'Administrativo',
                                                                                                  'Docente'         => 'Docente',
                                                                                                  'Investigador'    => 'Investigador',
                                                                                                  'Otro'            => 'Otro'
                ), 'class' => 'form-control']); ?>
            </div>
        </div>
        
   </fieldset>
    <div class='row  text-center' id="btnRegistrar">
        <div class='col-md-12 col-sm-10 col-xs-10'>
            <br>
            <?= $this->Form->button(__('Enviar Solicitud'), ['class' => 'btn btn-success']); ?>
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

