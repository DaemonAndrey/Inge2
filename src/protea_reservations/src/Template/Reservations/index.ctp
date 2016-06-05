<?php    echo $this->Html->css('reservations.css');?>
<div class="row text-center">
  <div class="col-xs-12" style="color:#000;">
      <h2>Calendario de Reservas</h2>
  </div>
</div>


<br>
<div id='calendar'></div>   
<br>
<br>

<!-- Simbología -->
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
    <label>Estado de reservación</label>
    </div>
</div>
<div class="row" >
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="col-md-6 ">
            Pendiente
        </div>
    </div>
    <div class="poligp"> 
    </div> 
  </div>
</div>

<div class="row">
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="col-md-6">
            Aceptada
        </div>
    </div>
    <div class="poliga"> 
    </div> 
  </div>
</div>
<br>
<!-- Fin Simbología -->

<div id="callback" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" role="button" aria-label="Cerrar">&times;</button>
                <h4 class="modal-title">Confirmación</h4>
            </div>
            <div class="modal-body">
                <h4 id="callbackText" style="color: green;">¡Su reservación está siendo procesada!</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" role="button" aria-label="Cerrar">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="mdlReservaciones" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <!-- Modal content -->
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header label-success" style="color:#fff;">
                <button type="button" class="close" data-dismiss="modal" role="button" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Reservación</h4>
            </div>
            <!-- Fin Modal header -->
            
            <!-- Modal body -->
            <div class="modal-body" style="color:#000;">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <h3 id="fecha">Fecha</h3>
                    </div>
                </div>
                
                <!-- Fila 1 (Fechas) -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                            <h4>Hora de inicio</h4>
                        </div>
                        <div class="col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                            <select name="horaInicio" class="form-control" role="listbox" aria-label="Hora de inicio" aria-required="true" id="start" onchange="changeEndHour(); getResources(document.getElementById('resource_type'));">                            
                                <?php
                                    $inicioBD = 7;
                                    $finBD = 21;

                                    for($i = $inicioBD; $i < 10; $i++)
                                    {
                                        echo "<option value=".$i."> 0".$i.":00:00</option>";
                                    }

                                    for($i = 10; $i < $finBD; $i++)
                                    {
                                        echo "<option value=".$i."> ".$i.":00:00</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                            <h4>Hora de fin</h4>
                        </div>
                        <div class="col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                            <select name="horaFin" class="form-control" role="listbox" aria-label="Hora de fin" aria-required="true" id="end" onchange="getResources(document.getElementById('resource_type'))">
                                <?php
                                    $inicioBD = 8;
                                    $finBD = 22;

                                    for($i = $inicioBD; $i < 10; $i++)
                                    {
                                        echo "<option value=".$i."> 0".$i.":00:00"."</option>";
                                    }

                                    for($i = 10; $i < $finBD; $i++)
                                    {
                                        echo "<option value=".$i."> ".$i.":00:00"."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Fin Fila 1 (Fechas) -->
                
                <br>
                
                <!-- Fila 2 (Recursos) -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                            <h4><font color="red">* </font>Tipo de recurso</h4>
                        </div>
                        <div class="col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                            <select name="tipoRecurso" class="form-control" role="listbox" aria-label="Tipo de recurso" aria-required="true" onchange="getResources(this);activateButton(this, getElementById('check'));" id="resource_type">
                                <option value="Seleccionar" selected disabled>Seleccionar</option>
                                <?php
                                    foreach ($types as $value) 
                                    {
                                        echo "<option>".$value['description']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                            <h4>Recursos disponibles</h4>
                        </div>
                        <div class="col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                            <select name="recursosDisponibles" class="form-control" role="listbox" aria-label="Recursos disponibles" aria-required="true" id="resource" onchange="showDescription(this)">
                                <option value="Seleccionar" selected disabled>Seleccionar</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Fin Fila 2 (Recursos) -->                 
                
                <br>
                
                <!-- Fila 3 (Nombre del evento) -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                            <h4>Nombre del Evento o Curso</h4>
                        </div>
                        <div class="col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                            <input class="form-control" type="text" id="event_name" role="textbox" aria-label="Nombre del evento" placeholder="FD-1312">
                        </div>
                    </div>
                    
                </div>
                <!-- Fin Fila 3 (Nombre del evento) -->
                
                <br>

                <div class="row">
                    <div class="text-center">
                        <button data-toggle="collapse" class="btn btn-primary" data-target="#resource_description">Información Detallada</button>
                    </div>
                    <div id="resource_description" class="col-xs-10 col-xs-offset-1 collapse text-center"></div>
                </div>
                
                <br>

                <!-- Fila 4 (Comentario) -->
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1">
                        <div class="col-xs-12 text-center">
                            <h4>Comentarios</h4>
                        </div>
                        <div class="col-xs-12">
                            <textarea class="form-control" rows="5" id="comment"  role="textbox" aria-label="Comentarios (Opcional)" placeholder="Si necesita algo adicional a lo especificado en el recurso, por favor digítelo aquí."></textarea>
                        </div>
                    </div>
                </div>
                <!-- Fin Fila 4 (Comentario) -->
                
                <br>
                
                <!-- Fila 5 (Checkbox) -->
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1">
                        <div class="col-xs-12">
                            <label><input type="checkbox" value="" unchecked id="check" name="terms" onchange="activateButton(document.getElementById('resource_type'), this)"> He leído y acepto los </label>
                            <?php echo $this->Html->link('Términos y Condiciones de Uso',
                                         array('controller'=>'pages','action' => 'policy'),
                                         array('target' => '_blank', 'escape' => false, 'title'=>'Condiciones de Uso')) ?>
                        </div>
                    </div>
                </div>
                <!-- Fin Fila 5 (Checkbox) -->
                
                <br>
                <!-- Fila 5 (Campos obligatorios) -->
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1">
                        <div class="col-xs-12">
                            <h5>Campos obligatorios (<font color="red">*</font>) </h5>
                        </div>
                    </div>
                </div>
                <!-- Fin Fila 5 (Campos obligatorios) -->
                
                <br>

                
            </div>
            <!-- Fin Modal body -->
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-info" onclick="getReservationData()" data-dismiss="modal" role="button" aria-label="Reservar" id="Reservar">Reservar</button>
                <button type="button" class="btn btn-danger" style="width:84px;" data-dismiss="modal" role="button" aria-label="Cerrar">Cerrar</button>
            </div>
            <!-- Fin Modal footer -->
        </div>
        <!-- Fin Modal content -->
    </div>
</div>
<!-- Fin Modal -->