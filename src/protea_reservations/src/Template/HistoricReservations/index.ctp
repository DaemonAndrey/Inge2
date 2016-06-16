<!-- src/Template/Reservations/edit.ctp -->
<?php echo $this->Html->css('reservations.css'); ?>

<div class="users form">
    <?= $this->Form->create($reporte) ?>
    
    <!-- TÍTULO -->
    <div class="row">
        <div class="col-xs-12">
            <legend>
                <div class="text-center">
                    <h2>Reporte de Reservaciones</h2>
                    <br>
                </div>
            </legend>
        </div>
    </div>
    <!-- FIN TÍTULO -->
    
    

        <!-- BOTONES -->
        <div class="row text-center">
            <div class="col-xs-12">
                <?php                 
                    echo $this->Form->submit('Ver Tabla', array('class' => 'btn btn-success', 'div' => false, 'name' => 'accion'));
                    echo $this->Html->link('Regresar', array('controller' => 'reservations','action'=> 'manage'), array( 'class' => 'btn btn-primary', 'id' => 'btnRegresar')); 
                ?>
            </div>
        </div> 
        <!-- FIN BOTONES -->
    </fieldset>
    <!-- FIN CAMPOS A MOSTRAR -->

    <?= $this->Form->end() ?>
</div>