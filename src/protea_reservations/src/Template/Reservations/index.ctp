<?php    echo $this->Html->css('reservations.css');?>
<div class="row text-center">
  <div class="col-xs-12">
      <h1>Calendario de Reservas</h1>
  </div>
</div>

<br>

<div class="row">
    <div class="col-xs-12">
        <div id='calendar'></div>	
    </div>
</div>
<br>
<br>

<!-- Modal -->
<div id="mdlReservaciones" class="modal fade" role="dialog">
    <div class="modal-dialog modal-mg">
        <!-- Modal content -->
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header label-success">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reservación</h4>
            </div>
            <!-- Fin Modal header -->
            
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <h4>Fecha</h4>
                    </div>
                </div>
                
                <!-- Fila 1 (Fechas) -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <strong>Hora de inicio</strong>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <select name="horaInicio" class="form-control" id="start">
                                
                                <?php
                                $inicioBD = 7;
                                $finBD = 21;
                                
                                for($i = $inicioBD; $i < 10; $i++)
                                {
                                    echo "<option> 0".$i.":00:00</option>";
                                }

                                for($i = 10; $i < $finBD; $i++)
                                {
                                    echo "<option> ".$i.":00:00</option>";
                                }

                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <strong>Hora de fin</strong>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <select name="horaFin" class="form-control" id="end">

                            <?php
                                $inicioBD = 8;
                                $finBD = 22;
                                
                                for($i = $inicioBD; $i < 10; $i++)
                                {

                                    echo "<option> 0".$i.":00:00"."</option>";

                                }

                                for($i = 10; $i < $finBD; $i++)
                                {

                                    echo "<option> ".$i.":00:00"."</option>";

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
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <strong>Tipo de recurso</strong>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <select name="tipoRecurso" class="form-control" onchange="getResources(this)">
                                <option value="Seleccionar" selected disabled>Seleccionar</option>
                                <?php

                                
                                    foreach ($types as $value) {
                                        echo "<option>".$value['description']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <strong>Recursos disponibles</strong>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <select name="recursosDisponibles" class="form-control" id="resource">
                                <option value="Seleccionar" selected disabled>Seleccionar</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Fin Fila 2 (Recursos) -->
                
                <br>
                
                <!-- Fila 3 (Sigla y nombre del curso) -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <strong>Sigla del curso</strong>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <strong>Nombre del curso</strong>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <!-- Fin Fila 3 (Sigla y nombre del curso) -->
                
                <br>
                
                <!-- Fila 4 (Comentario) -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <strong>Comentarios</strong>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <textarea class="form-control" rows="5"></textarea>
                    </div>
                </div>
                <!-- Fin Fila 4 (Comentario) -->
            </div>
            <!-- Fin Modal body -->
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Reservar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
            <!-- Fin Modal footer -->
        </div>
        <!-- Fin Modal content -->
    </div>
</div>
<!-- Fin Modal -->


<script>

    $(document).ready(function() { // page is now ready, initialize the calendar...
        var xhttp = new XMLHttpRequest();
        var json_events = "";
        xhttp.onreadystatechange = function()
        {
            if(xhttp.readyState == 4 && xhttp.status == 200)
            {
                json_events = xhttp.responseText;
            }
        };
        
        var path = window.location.pathname;
        var append = "";

        if(path.charAt(path.length -1).localeCompare("/") == 0)
        {
            append = "index";
        }
        else
        {
            if(path.charAt(path.length -1).localeCompare("x") != 0)
            {
                append = "/index";
            }
        }

        xhttp.open("POST", path+append,false);
        xhttp.setRequestHeader("type", "fetch");
        xhttp.send(); 
/**
    var path = window.location.pathname;
    var append = "";

    if(path.charAt(path.length -1).localeCompare("/") == 0)
    {
        append = "index";
    }
    else
    {
      if(path.charAt(path.length -1).localeCompare("x") != 0)
      {
        append = "/index";
      }
    }
    
  $.ajax({
     url: path+append,
     type: 'POST',
     async: false,
     success: function(response){
       json_events = response;


     }
  });

**/
        $('#calendar').fullCalendar({ // put your options and callbacks here
            dayClick: function($){
                jQuery('#mdlReservaciones').modal('show');
            },

            header: {
                left: 'title',
                center: 'month,basicWeek,agendaDay',
                right: 'today prev,next'
            },

            events: JSON.parse(json_events),

            eventLimit: true,
            views: {
                basic: {
                    eventLimit: 20// options apply to basicWeek and basicDay views
                }
            }
        });
    });



</script>

<script>
    
    function getResources(element)
    {
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function()
        {
            if(xhttp.readyState == 4 && xhttp.status == 200)
            {
                fillResources(xhttp.responseText);
            }
        };
        
        var path = window.location.pathname;
        path = path.replace("/reservations","/resources");

        var  start = document.getElementById("start");
        var end = document.getElementById("end");
        xhttp.open("POST", path+"/getResources/"+element.value+"/"+start.value+"/"+end.value,true);

        xhttp.send();
    }

    function fillResources(json)
    {
        
        obj = JSON.parse(json);

        html = "";

        var len = obj.length;

        for (var i = 0; i < len; ++i) {
            html += "<option>"+obj[i].resource.resource_name+"</option>";
        }

        document.getElementById("resource").innerHTML = html;
    }

</script>>