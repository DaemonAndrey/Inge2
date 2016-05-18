<!-- src/Template/Users/ingresar.ctp -->
<?php echo $this->Html->css('login.css'); ?>

<!-- File: src/Template/Users/ingresar.ctp -->
<br>
<div class="users form">
    <!-- MENSAJES -->
    <div style="text-align:center; color:red">
        <?= $this->Flash->render('loginError') ?>
        <?= $this->Flash->render('loginPendiente') ?>
        <br>
    </div>
    
    <?= $this->Form->create() ?>
    <fieldset>  
        <legend>
            <div class='text-center'>
                <h1>Ingresar</h1>
                <br>
            </div>
        </legend>
        
        <!-- USERNAME -->
        <div class="row">
            <div class='col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2'>
                <?=  $this->Form->input('username', ['placeholder' => 'Correo Institucional',
                                                     'class' => 'form-control',
                                                     'label' => 'Correo Institucional: ',
                                                     'required',
                                                     'templates' => ['formGroup' => '<div class="left-inner-addon" style="color:#7F7F7F;"><i class="glyphicon glyphicon-user"></i>{{input}}</div>']]);
                ?>
                
            </div>
        </div>
        
        <!-- PASSWORD -->
        <div class="row">
            <div class='col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2'>
                <?=  $this->Form->input('password', ['placeholder' => 'Contraseña',
                                                     'class' => 'form-control',
                                                     'label' => 'Contraseña: ',
                                                     'required',
                                                     'templates' => ['formGroup' => '<div class="left-inner-addon" style="color:#7F7F7F;"><i class="glyphicon glyphicon-lock"></i>{{input}}</div>']]);
                ?>
            </div>
        </div>
    </fieldset>
    
    <!-- BOTÓN -->
    <div class="row" align="center" id="btnIngresar">
        <div class='col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2'>
            <?= $this->Form->button(__('Ingresar'), ['class' => 'btn btn-info']); ?>
        </div>
    </div>
    <br>
    
    <!-- PASS RECOVERY -->
    <div class="row" align="center" style="font-size:16px">
        <div class='col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2'>
            <?php
            echo $this->Html->link('¿Olvidaste tu contraseña?',
                                   array('controller'=>'pages','action' => 'recovery'),
                                   array('target' => '_self', 'escape' => false));
            ?>
        </div>
    </div>
    
    <?= $this->Form->end() ?>
</div>