<!-- src/Template/Users/add.ctp -->
<?php echo $this->Html->css('login.css'); ?>

<!-- File: src/Template/Users/login.ctp -->

<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <fieldset>
        <div class="row">
            <div class='col-md-4 col-md-offset-4 col-xs-12 '>
                <h1>Ingresar</h1>
            </div>
        </div>
        <div class="row">
            <div class='col-md-12 col-xs-12 '>
                <legend></legend>
            </div>
        </div>
        <div class="row">
            <div class='col-md-4 col-md-offset-4 col-xs-12 '>
                <?=  $this->Form->input('username', [
                                                    'placeholder' => 'Correo Institucional',
                                                    'class' => 'form-control',
                                                    'label' => 'Correo Institucional: ',
                                                    'templates' => [
                                                    'formGroup' => '<div class="left-inner-addon"><i class="glyphicon glyphicon-user"></i>{{input}}</div>'
                                                                   ]
                                                    ]); ?>
                
            </div>
        </div>
        <div class="row">
            <div class='col-md-4 col-md-offset-4 col-xs-12 '>
                <?=  $this->Form->input('password', [
                                                    'placeholder' => 'Contraseña',
                                                    'class' => 'form-control',
                                                    'label' => 'Contraseña: ',
                                                    'templates' => [
                                                    'formGroup' => '<div class="left-inner-addon"><i class="glyphicon glyphicon-lock"></i>{{input}}</div>'
                                                                   ]
                                                    ]); ?>
            </div>
        </div>
    </fieldset>
    <div class='row'>
        <div class='col-md-4 col-md-offset-7 col-xs-12 '>
            <?= $this->Form->button(__('Ingresar'), ['class' => 'btn btn-info']); ?>
        </div>
    </div>
<?= $this->Form->end() ?>
</div>