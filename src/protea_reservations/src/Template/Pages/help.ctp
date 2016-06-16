<!-- INFORMACION -->
<div class="ayuda">
    <div class='row'>
        <div class='col-xs-12 text-center'>
            <legend>
                <br>
                <h2>Manual de ayuda para usuarios</h2>
            </legend>
        </div>
    </div>
    
    <div class='row'>
        <div class='col-xs-8 col-xs-offset-2' style="color:black;" align="justify">
            <br>
            La Facultad de Educación dedica este espacio para que el personal docente y administrativo pueda reservar las Sala de Audiovisuales, el Laboratorio de Cómputo y la Sala SITEA, así como equipo audiovisual para el apoyo de sus labores. Para solicitar estos servicios requiere su correo electrónico institucional y llenar un formulario.
            <br>
        </div>
    </div>
    
    <div class='row'>
        <div class='col-xs-8 col-xs-offset-2'>
            <br>
            <?php echo $this->Html->link('<span class="glyphicon glyphicon-phone"></span> Contacto',
                                         array('controller'=>'pages','action' => 'contact'),
                                         array('target' => '_self', 'escape' => false, 'title'=>'Ponte en contacto con nosotros')) ?>
            <br>
        </div>
    </div>
    
    <div class='row'>
        <div class='col-xs-8 col-xs-offset-2'>
            <br>
            <?php echo $this->Html->link('<span class="glyphicon glyphicon-book"></span> Políticas de uso',
                                         array('controller'=>'pages','action' => 'policy'),
                                         array('target' => '_self', 'escape' => false, 'title'=>'Conoce nuestras políticas de uso')) ?>
            <br>
            <br>
            <br>
        </div>
    </div>
</div> <!--/ FIN INFORMACION -->

<div class='row'>
    <div class='col-md-12 col-xs-12 '>
        <legend>
        </legend>
    </div>
</div>