<!-- src/Template/Resources/add.ctp -->
<?php echo $this->Html->css('registro.css'); ?>

<div class="users form">
    <?= $this->Form->create($resource) ?>

    <!-- TÍTULO -->
    <div class="row" style="color:#000;">
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <legend>
                <div class='text-center'>
                    <h2>Agregar Recurso</h2>
                    <br>
                </div>
            </legend>
        </div>
    </div> <!-- FIN TÍTULO -->

    <!-- CAMPOS A LLENAR -->
    <fieldset>
        <div class="row">
            <!-- TIPO -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
                <?=
                    $this->Form->input('Resources.resource_type_id', ['label' => 'Tipo: ',
                                                                   'options' => $resource_types_options,
                                                                   'class' => 'form-control']);
                ?>
            </div>
            <!-- MARCA/MODELO -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-0 col-sm-offset-0 col-xs-offset-1'>
                <?=
                    $this->Form->input('Resources.resource_name', ['label' => 'Marca/Modelo: ',
                                                                   'placeholder' => 'Sala SITEA',
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
                                                                   'placeholder' => 'ABC123XYZ',
                                                                   'class' => 'form-control']);
                ?>
            </div>
            <!-- DESCRIPCIÓN -->
            <div class='col-md-5 col-sm-5 col-xs-10 col-md-offset-0 col-sm-offset-0 col-xs-offset-1'>
                <?=
                    $this->Form->input('Resources.description', ['label' => 'Descripción: ',
                                                                 'placeholder' => 'Breve descripción del recurso',
                                                                 'class' => 'form-control']);
                ?>
                <br>
            </div>
        </div>
    </fieldset> <!-- FIN CAMPOS A LLENAR -->

    <!-- BOTONES -->
    <div class='row  text-center' id="btnRegistrar">
        <div class='col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1'>
            <br>
            <?= $this->Form->button('Agregar', ['class' => 'btn btn-info', 'style' => 'width:90px']); ?>
            <?= $this->Html->link('Regresar', array('controller' => 'resources','action'=> 'index'), array( 'class' => 'btn btn-danger', 'style' => 'width:90px')) ?>
        </div>
    </div> <!-- FIN BOTONES -->

    <legend>
        <br>
    </legend>

    <?= $this->Form->end() ?>
</div>