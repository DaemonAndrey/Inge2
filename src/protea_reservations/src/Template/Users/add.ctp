
<!-- src/Template/Users/add.ctp -->

<div class="users form">
<?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?= $this->Form->input('username', ['type' => 'email','label' => 'Correo Institucional: ', 'placeholder' => 'username@ucr.ac.cr' ]) ?>
        <?= $this->Form->input('password', ['type' => 'password', 'label' => 'Contraseña: ', 'placeholder' => '********']) ?>
        <?= $this->Form->input('first_name', ['label' => 'Nombre: ', 'placeholder' => 'Carlos']) ?>
        <?= $this->Form->input('last_name', ['label' => 'Apellidos: ', 'placeholder' => 'Brenes Aguilar']) ?>
        <?= $this->Form->input('telephone_number', ['label' => 'Teléfono: ', 'placeholder' => '88999900']) ?>
        <?= $this->Form->input('department', ['label' => 'Escuela/Institución: ', 'placeholder' => 'Educación/Protea']) ?>
        <?= $this->Form->input('position', ['label' => 'Posición: ', 'placeholder' => 'Profesor/Administrativo/Investigador']) ?>
   </fieldset>
<?= $this->Form->button(__('Enviar Solicitud')); ?>
<?= $this->Form->end() ?>
</div>

