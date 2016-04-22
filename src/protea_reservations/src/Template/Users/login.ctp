<!-- src/Template/Users/add.ctp -->
<?php echo $this->Html->css('login.css'); ?>

<!-- File: src/Template/Users/login.ctp -->

<div class="users form">
    <div style="text-align:center; color:red">
        <?= $this->Flash->render('loginError') ?>
        <?= $this->Flash->render('loginPendiente') ?>
    </div>
<?= $this->Form->create() ?>
    <fieldset>
        <div class="row">
            <div class='col-md-4 col-md-offset-4 col-sm-offset-2 col-sm-10 col-xs-12 '>
                <h1>Ingresar</h1>
            </div>
        </div>
        <div class="row">
            <div class='col-md-12 col-xs-12 '>
                <legend></legend>
            </div>
        </div>
        <div class="row">
            <div class='col-md-4 col-md-offset-4 col-sm-offset-2 col-sm-8 col-xs-10 '>
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
            <div class='col-md-4 col-md-offset-4 col-sm-offset-2 col-sm-8 col-xs-10 '>
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
        <div class="row text-center">
            <div class='col-md-4 col-md-offset-4 col-sm-offset-2 col-sm-8 col-xs-10 '>
                <?php
                echo $this->Html->link('¿Olvidaste tu contraseña?', '#');
                ?>
            </div>
        </div>
    </fieldset>
    <div class="row text-center">
        <div class='col-md-4 col-md-offset-4 col-sm-offset-2 col-sm-8 col-xs-10 '>
            <?= $this->Form->button(__('Ingresar'), ['class' => 'btn btn-info']); ?>
        </div>
    </div>
<?= $this->Form->end() ?>
</div>