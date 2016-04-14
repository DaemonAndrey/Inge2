<<<<<<< HEAD


=======
>>>>>>> 7cbe67bdf6ed4b67a272ad33193d05f3c34cab90
<!-- src/Template/Users/add.ctp -->

<div class="users form">
<?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
        <?= $this->Form->input('first_name') ?>
        <?= $this->Form->input('last_name') ?>
<<<<<<< HEAD
        <?= $this->Form->input('telephone_number') ?>
        <?= $this->Form->input('department') ?>
        <?= $this->Form->input('position') ?>
   </fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end() ?>
</div>

=======
        <?= $this->Form->input('department') ?>
        <?= $this->Form->input('position') ?>
        <?= $this->Form->input('telephone_number') ?>
        
   </fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end() ?>
</div>
>>>>>>> 7cbe67bdf6ed4b67a272ad33193d05f3c34cab90
