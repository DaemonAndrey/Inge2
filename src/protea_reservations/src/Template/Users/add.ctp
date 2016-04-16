
<!-- src/Template/Users/add.ctp -->
<?php echo $this->Html->css('registro.css'); ?>
<div class="users form">
<?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Formulario de registro') ?></legend>
        <div class='col-md-5 col-sm-12 col-xs-12 '>
            <?= $this->Form->input('username', ['type' => 'email','label' => 'Correo Institucional: ', 'default' => '@ucr.ac.cr', 'class' => 'form-control']) ?>
        </div>
        <div class='col-md-5 col-sm-12 col-xs-12 '>
            <?= $this->Form->input('password', ['type' => 'password', 'label' => 'Contraseña: ', 'placeholder' => 'Al menos 8 caractéres', 'class' => 'form-control']) ?>
        </div>
        <div class='col-md-5 col-sm-12 col-xs-12 '>
            <?= $this->Form->input('first_name', ['label' => 'Nombre: ', 'placeholder' => 'Luis Carlos ', 'class' => 'form-control']) ?>
        </div>
        <div class='col-md-5 col-sm-12 col-xs-12 '>
            <?= $this->Form->input('last_name', ['label' => 'Apellidos: ', 'placeholder' => 'Brenes Aguilar', 'class' => 'form-control']) ?>
        </div>
        <div class='col-md-5 col-sm-12 col-xs-12 '>
            <?= $this->Form->input('telephone_number', ['label' => 'Teléfono: ', 'placeholder' => '80808080', 'class' => 'form-control']) ?>
        </div>
        <div class='col-md-5 col-sm-12 col-xs-12 '>
            <?= $this->Form->input('department', ['label' => 'Escuela/Institución: ', 'placeholder' => 'Educación/Protea', 'class' => 'form-control']) ?>
        </div>
        <div class='col-md-5 col-sm-12 col-xs-12 '>
            <?= $this->Form->input('position', ['label' => 'Posición: ', 'options' => array(
                                                                                              0 => 'Administrativo',
                                                                                              1 => 'Docente',
                                                                                              2 => 'Investigador',
                                                                                              3 => 'Otro'
            ), 'class' => 'form-control']); ?>
        </div>
   </fieldset>
    <div class='row'>
        <div class='col-md-12 col-sm-12 col-xs-12 '>
            <?= $this->Form->button(__('Enviar Solicitud'), ['class' => 'btn btn-success']); ?>
        </div>
    </div>
<?= $this->Form->end() ?>
</div>

