<!-- src/Template/Users/ingresar.ctp -->
<?php echo $this->Html->css('login.css'); ?>

<!-- File: src/Template/Users/ingresar.ctp -->
<div class="users form">
    <!-- MENSAJES -->
    <div style="text-align:center; color:red">

        
        
        <br>
    </div>
    <!-- FIN DE MENSAJES -->
    
    <?= $this->Form->create() ?>
    <fieldset>  
        <legend>
            <div class='text-center'>
                <h2>Ingresar</h2>
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
    
    <!-- BOTONES -->
    <div class='row  text-center'>
        <div class='col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1'>
            <br>
            <?= $this->Form->button('Ingresar', ['class' => 'btn btn-info', 'style' => 'width:90px']); ?>
            <?= $this->Html->link('Regresar', ['controller' => 'pages', 'action'=> 'home'], ['class' => 'btn btn-danger', 'style' => 'width:90px']); ?>
        </div>
    </div> <!-- FIN BOTONES -->
    
    <legend><br></legend>
    
    <?= $this->Form->end() ?>
</div>