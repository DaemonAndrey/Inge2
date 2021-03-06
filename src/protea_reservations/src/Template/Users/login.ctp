<?php echo $this->Html->css('login.css'); ?>

<div class="users form">
    <!-- MENSAJES -->
    <div class="lead text-danger" style="text-align:center">
    </div>
    <!-- FIN DE MENSAJES -->
    
    <?= $this->Form->create() ?>
    <fieldset>  
        <!-- TÍTULO -->
        <legend>
            <div class='text-center'>
                <h2>Ingresar</h2>
                <br>
            </div>
        </legend>
        <!-- FIN DE TÍTULO -->
        
        <!-- CORREO -->
        <div class="row">
            <div class='col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2'>
                <?=  $this->Form->input('username', ['title' => 'Correo institucional de la UCR sin @ucr.ac.cr.',
                                                     'placeholder' => 'Correo Institucional sin @ucr.ac.cr',
                                                     'class' => 'form-control',
                                                     'label' => 'Correo Institucional: ',
                                                     'required',
                                                     'templates' => ['formGroup' => '<div class="left-inner-addon" style="color:#7F7F7F;"><i class="glyphicon glyphicon-user"></i>{{input}}</div>']]);
                ?>
                
            </div>
        </div>
        
        <!-- CONTRASEÑA -->
        <div class="row">
            <div class='col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2'>
                <?=  $this->Form->input('password', ['title' => 'La misma contraseña que utiliza en el correo institucional.',
                                                     'placeholder' => 'Contraseña del correo institucional',
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
            <?= $this->Form->button('Ingresar', ['class' => 'btn btn-success', 'style' => 'width:90px']); ?>
            <?= $this->Html->link('Regresar', ['controller' => 'pages', 'action'=> 'home'], ['class' => 'btn btn-primary', 'style' => 'width:90px']); ?>
        </div>
    </div>
    <!-- FIN DE BOTONES -->
    
    <legend><br></legend>
    
    <?= $this->Form->end() ?>
</div>