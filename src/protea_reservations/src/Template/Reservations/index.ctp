<?php    echo $this->Html->css('reservations.css');?>
<div class="row text-center">
  <div class="col-xs-12">
      <h1>Calendario de Reservas</h1>
  </div>
</div>

<br>
        <div id='calendar'></div>   
<br>
<br>

<div id="callback" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" role="button" aria-label="Cerrar">&times;</button>
        <h4 class="modal-title">Confirmación</h4>
      </div>
      <div class="modal-body">
        <h3>¡Su reservación fue exitosa!</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" role="button" aria-label="Cerrar">Close</button>
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
            <div class="modal-header label-success">
                <button type="button" class="close" data-dismiss="modal" role="button" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Reservación</h4>
            </div>
            <!-- Fin Modal header -->
            
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <h4 id="fecha">Fecha</h4>
                    </div>
                </div>
                
                <!-- Fila 1 (Fechas) -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <strong>Hora de inicio</strong>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <select name="horaInicio" class="form-control" role="listbox" aria-label="Hora de inicio" aria-required="true" id="start" onchange="getResources(document.getElementById('resource_type')); changeEndHour();">                            
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
                    
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <strong>Hora de fin</strong>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
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
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <strong>Tipo de recurso</strong>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <select name="tipoRecurso" class="form-control" role="listbox" aria-label="Tipo de recurso" aria-required="true" onchange="getResources(this)" id="resource_type">
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
                    
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <strong>Recursos disponibles</strong>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <select name="recursosDisponibles" class="form-control" role="listbox" aria-label="Recursos disponibles" aria-required="true" id="resource" onchange="getResourceDescription()">
                                <option value="Seleccionar" selected disabled>Seleccionar</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Fin Fila 2 (Recursos) -->
                                     
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <button data-toggle="collapse" class="btn btn-link" data-target="#resource_description">Información Detallada</button>
                    <div id="resource_description" class="collapse"></div>
                </div>  
                
                <br>
                
                <!-- Fila 3 (Sigla y nombre del curso) -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <strong>Sigla del curso</strong>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input class="form-control" type="text" id="course_id" role="textbox" aria-label="Sigla del curso (Opcional)" placeholder="Opcional">
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <strong>Nombre del curso</strong>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input class="form-control" type="text" id="course_name" role="textbox" aria-label="Nombre del curso (Opcional)"  placeholder="Opcional">
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
                        <textarea class="form-control" rows="5" id="comment"  role="textbox" aria-label="Comentarios (Opcional)" placeholder="Si necesita algo adicional a lo especificado en el recurso, por favor digítelo aquí."></textarea>
                    </div>
                </div>
                <!-- Fin Fila 4 (Comentario) -->
            </div>
            <!-- Fin Modal body -->
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="getReservationData()" data-dismiss="modal" role="button" aria-label="Reservar">Reservar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" role="button" aria-label="Cerrar">Cerrar</button>
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
        
        $('#calendar').fullCalendar({ // put your options and callbacks here
            dayClick: function(date, jsEvent, view){
                var today = new Date();
                var selectedDay = date.format("DD");
                var selectedMonth = date.format("MM");
                
                // El modal se abre si sucede alguna de las siguientes situaciones:
                //  * Si el mes seleccionado es el actual y el día es mayor o igual a hoy.
                //  * Si el mes seleccionado es mayor al actual.
                var openModal = ( (selectedMonth == (today.getMonth() + 1)) && selectedDay >= today.getDate() ) || ( ( selectedMonth > today.getMonth() + 1) );
                
                if( openModal )
                {
                    jQuery('#mdlReservaciones').modal('show');
                    globalDate = date;
                    fecha = document.getElementById("fecha");
                    fecha.innerHTML = date.format("DD MMMM YYYY");
                }
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
    
    function getResources(element)
    {
        if(element.value != "Seleccionar")
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
            var new_path = path.replace("/reservations/","/resources/"); 

            if(path === new_path) //algunos navegadores no ponen el último /
            {
                new_path = path.replace("/reservations","/resources/");                
            }

            var start = document.getElementById("start");
            var end = document.getElementById("end");
            var dateFormat = globalDate.format("DD MMMM YYYY");
            var startDate = getDate(dateFormat); //Formatea la fecha a la que recibe la base de datos

            xhttp.open("POST", new_path+"getResources/"+element.value+"/"+start.value+"/"+end.value+"/"+startDate,true);

            xhttp.send();
        }
    }
    
    function fillResources(json)
    {
        obj = JSON.parse(json);
        html = "";
        var len = obj.length;
        for (var i = 0; i < len; ++i) 
        {
            html += "<option>"+obj[i].resource.resource_name+"</option>";
        }
        document.getElementById("resource").innerHTML = html;
    }

    function getReservationData()
    {
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function()
        {
            if(xhttp.readyState == 4 && xhttp.status == 200)
            {   
                jQuery('#callback').modal('show');
                setTimeout(function(){location.reload();},2000);
                
            }else
            {
                if(xhttp.status == 404)
                {
                    
                }
            }
        };

        var date = document.getElementById("fecha").innerHTML; 

        date = getDate(date); //Formatea la fecha a la fecha que recibe la base de datos

        var start = document.getElementById("start").value;
        var end = document.getElementById("end").value;
        
        var start_Date = date + " " + start;
        var end_Date = date + " " + end;       
        
        var resource = document.getElementById("resource").value;
        var course_id = document.getElementById("course_id").value;
        var course_name = document.getElementById("course_name").value;
        var user_comment = document.getElementById("comment").value;
        
        var reservation_Title = resource + " " + course_id;
                
        var path = window.location.pathname;

        if(path.charAt(path.length - 1) != '/') //algunas veces el navegador no pone el último /
        {
            path = path+"/";
        }            
                     
        xhttp.open("POST", path+"add");

        xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

        xhttp.send(JSON.stringify({
            start_date : start_Date,
            end_date : end_Date,
            reservation_title : reservation_Title,
            user_comment : user_comment,
            course_name : course_name,
            course_id : course_id, 
            resource: resource
        }));   
    }

    function getDate(date)
    {
        var months = new Array();

        months['enero'] = 01;
        months['febrero'] = 02;
        months['marzo'] = 03;
        months['abril'] = 04;
        months['mayo'] = 05;
        months['junio'] = 06;
        months['julio'] = 07;
        months['agosto'] = 08;
        months['septiembre'] = 09;
        months['octubre'] = 10;
        months['noviembre'] = 11;
        months['diciembre'] = 12;

        var dateElements = date.split(" ");
        var dateFormated = dateElements[2]+"-"+months[dateElements[1]]+"-"+dateElements[0];

        return dateFormated; 
    }
    
    function changeEndHour()
    {
        restartEndHours();
        
        var start_Ddl = document.getElementById("start");
        var end_Ddl = document.getElementById("end");
        
        var startHour = start_Ddl.options[0].value; 
        var selectedStartHour = start_Ddl.options[start_Ddl.selectedIndex].value;
        
        for(var i = parseInt(selectedStartHour) - parseInt(startHour) - 1; i >= 0; i--)
        {
            end_Ddl.remove(i);
        }
        
        end_Ddl.selectedIndex = end_Ddl.options[0];
    }
    
    function restartEndHours()
    {
        var start_Ddl = document.getElementById("start");
        var end_Ddl = document.getElementById("end");
    
        var startTime = start_Ddl.options[0].value;
        var lastEndTime = end_Ddl.options[0].value;
        
        for(var i = parseInt(lastEndTime) - 1; i > parseInt(startTime); i--)
        {
            var optionName = (i < 10) ? ("0" + i + ":00:00") : (i + ":00:00");
            
            try
            {
                end_Ddl.add(new Option(optionName, i), end_Ddl.options[0]) //add new option to beginning of "sample"
            }
            catch(e) //in IE, try the below version instead of add()
            { 
                end_Ddl.add(new Option(optionName, i), 0) //add new option to beginning of "sample"
            }
        }
        
        end_Ddl.selectedIndex = end_Ddl.options[0];
    }    
    
    function getResourceDescription()
    {        
        var resource_name = document.getElementById("resource").value;     
        
        if(resource_name != "Seleccionar")
        {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function()
            {
                if(xhttp.readyState == 4 && xhttp.status == 200)
                {                                      
                    showDescription(xhttp.responseText);
                }
            };                                
             
            var path = window.location.pathname;
            var new_path = path.replace("/reservations/","/resources/"); 

            if(path === new_path) //algunos navegadores no ponen el último /
            {
                new_path = path.replace("/reservations","/resources/");                
            } 
                
            xhttp.open("POST", new_path+"getDescription/"+resource_name,true);
            xhttp.send();
        }
    }
    
    function showDescription(json)
    {
        obj = JSON.parse(json);       
        html = obj[0].description;          
        document.getElementById("resource_description").innerHTML = html;
    }
    
    
</script>

