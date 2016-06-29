<?php echo $this->Html->css('registro.css'); ?>

<div class="users form">
    <?= $this->Form->create($resource) ?>

    <!-- TÍTULO -->
    <div class="row" style="color:#000;">
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <legend>
                <div class='text-center'>
                    <h2>Actualizar Recurso</h2>
                    <br>
                </div>
            </legend>
        </div>
    </div>
    <!-- FIN DE TÍTULO -->

   
    <!-- CAMPOS A LLENAR -->
    <fieldset>
        <!-- ASOCIAR -->
         <div class="row">
            <div class='col-lg-4 col-lg-offset-5 col-md-6 col-md-offset-4 col-sm-8 col-sm-offset-3 col-xs-10 col-xs-offset-2'>
                <?=
                    $this->Html->link('<span class="glyphicon glyphicon-user"></span> Asociar Administradores',
                                      array('controller' => 'resources','action' => 'associate', $resource->id),
                                      array('target' => '_self', 'escape' => false)
                                     );
                ?>
            <br><br><br>
            </div>
        </div>
        <!-- FIN DE ASOCIAR -->

        <div class="row">
            <!-- TIPO -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                <?=
                    $this->Form->input('Resources.resource_type_id', ['label' => 'Tipo: ',
                                                                      'options' => $resource_types_options,
                                                                      'class' => 'form-control']);
                ?>
                <br>
            </div>
            
            <!-- MARCA/MODELO -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-0 col-sm-offset-0 col-xs-offset-1'>
                <?=
                    $this->Form->input('Resources.resource_name', ['label' => 'Marca/Modelo: ',
                                                                   'class' => 'form-control']);
                ?>
                <br>
            </div>
        </div>
        
        <div class='row'>
            <!-- PLACA/SERIE -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                <?=
                    $this->Form->input('Resources.resource_code', ['label' => 'Placa/Serie: ',
                                                                   'class' => 'form-control']);
                ?>
                <br>
            </div>
            
            <!-- ACTIVO-->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-0 col-sm-offset-0 col-xs-offset-1'>
                <?=
                    $this->Form->input('Resources.active', ['label' => 'Habilitado: ',
                                                            'options' => array('No','Sí'),
                                                            'class' => 'form-control']);
                ?>
                <br>
            </div>
        </div>
        
        <div class="row">
            <!-- DESCRIPCIÓN -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                <?=
                    $this->Form->input('Resources.description', ['label' => 'Descripción: ',
                                                                 'class' => 'form-control']);
                ?>
                <br>
            </div>
            
            <!-- VACIO -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-0 col-sm-offset-0 col-xs-offset-1'>
                <br>
            </div>
        </div>
        
    </fieldset>
    <!-- FIN DE CAMPOS A LLENAR -->

    <!-- BOTONES -->
    <div class='row  text-center' id="btnRegistrar">
        <div class='col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1'>
            <br>
            <?= $this->Form->button('Actualizar', ['class' => 'btn btn-success', 'style' => 'width:90px']); ?>
            <?= $this->Html->link('Regresar', array('controller' => 'resources','action'=> 'index'), array('class' => 'btn btn-primary', 'style' => 'width:90px')) ?>
        </div>
    </div>
    <!-- FIN DE BOTONES -->

    <legend>
        <br>
    </legend>

    <?= $this->Form->end() ?>
</div>