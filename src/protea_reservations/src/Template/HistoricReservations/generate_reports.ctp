<!-- src/Template/Reservations/edit.ctp -->
<?php 
    $this->Html->image('logoUCR.jpg', ['alt' => 'LogoUCR', 'id'=>'logoUCR']);

    // CSS
    echo $this->Html->css('reservations.css'); 
    
    // Javascript
    echo $this->Html->script('historicReservations.js'); 
    echo $this->Html->script('jspdf/jspdf.js'); 
    echo $this->Html->script('jspdf/jspdf.min.js');
    echo $this->Html->script('jspdf/jspdf.plugin.autotable.js');
    echo $this->Html->script('jspdf/jspdf.plugin.png_support.js'); 
    echo $this->Html->script('jspdf/jspdf.plugin.addimage.js');
    echo $this->Html->script('jspdf/png_support/png.js');
    echo $this->Html->script('jspdf/png_support/zlib.js');
    echo $this->Html->script('jspdf/FileSaver.js'); 
?>

<div class="users form">
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

<button id="btnReporte" class="btn btn-info" onclick="solicitarDatosHistorico()">Generar reporte</button>
