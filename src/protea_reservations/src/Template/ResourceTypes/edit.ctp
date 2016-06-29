<?php echo $this->Html->css('registro.css'); ?>

<div class="users form">
    <?= $this->Form->create($resource_type); ?>

    <!-- TÍTULO -->
    <div class="row" style="color:#000;">
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <legend>
                <div class='text-center'>
                    <h2>Actualizar Tipo de Recurso</h2>
                    <br>
                </div>
            </legend>
        </div>
    </div>
    <!-- FIN DE TÍTULO -->

    <!-- CAMPOS A LLENAR -->
    <fieldset>
        <!-- NOMBRE -->
        <div class='row'>
            <div class='col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1'>
                <?=
                    $this->Form->input('ResourceTypes.description', ['label' => 'Tipo: ',
                                                                   'placeholder' => 'Sala / Computadora / Televisor',
                                                                   'class' => 'form-control']);
                ?>
                <br>
            </div>
        </div>
        
        <!-- DÍAS ANTICIPACIÓN -->
        <div class='row'>
            <div class='col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1'>
                <?=
                    $this->Form->input('ResourceTypes.days_before_reservation', ['label' => 'Días de anticipación para reservarlo: ',
                                                                                 'type' => 'number',
                                                                                 'placeholder' => '0+',
                                                                                 'class' => 'form-control']);
                ?>
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
            <?= $this->Html->link('Regresar', array('controller' => 'resourceTypes','action'=> 'index'), array( 'class' => 'btn btn-primary', 'style' => 'width:90px')) ?>
        </div>
    </div>
    <!-- FIN DE BOTONES -->

    <legend>
        <br>
    </legend>

    <?= $this->Form->end() ?>
</div>