<!-- src/Template/Users/add.ctp -->
<?php echo $this->Html->css('login.css'); ?>

<!-- File: src/Template/Users/login.ctp -->
<br>
<div class="users form">
    <!-- MENSAJES -->
    <div style="text-align:center; color:red">
        <?= $this->Flash->render('passRecovery') ?>
    </div>
    
    <br>
    
    <!-- INFO -->
    <div class="row" align="center" style="font-size:18px">
        <div class='col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10'>
            Se enviará una clave temporal a su correo
        </div>
    </div>
    
    <br>
    
    <?= $this->Form->create() ?>
    <fieldset>
        <!-- USERNAME -->
        <div class="row">
            <div class='col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10'>
                <?=  $this->Form->input('username', 
                                        ['placeholder' => 'Correo Institucional',
                                         'class' => 'form-control',
                                         'label' => 'Correo Institucional: ',
                                         'templates' => ['formGroup' => '<div class="left-inner-addon"><i class="glyphicon glyphicon-user"></i>{{input}}</div>'
                                                       ]
                                        ]); ?>
                
            </div>
        </div>
        
    </fieldset>
    
    <!-- BOTÓN -->
    <div class="row" align="center" id="btnIngresar">
        <div class='col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10'>
            <?= $this->Form->button(__('Recuperar'), ['class' => 'btn btn-info']); ?>
        </div>
    </div>
    <br>
    
    <?= $this->Form->end() ?>
</div>