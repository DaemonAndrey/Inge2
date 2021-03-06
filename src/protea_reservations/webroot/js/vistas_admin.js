/*global JQuery*/



//Código para el modal de los flash

if (document.getElementsByClassName("message").length) {
    jQuery('#flash').modal('show');
    setTimeout(function () {
        jQuery('#flash').modal('hide');
    }, 3000);
}

$(document).ready(function () { // page is now ready, initialize the calendar...
    var xhttp = new XMLHttpRequest(), json_events = "";
    
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4 && xhttp.status === 200) {
            json_events = xhttp.responseText;
        }
    };

    var path = window.location.pathname, append = "";
    
    if (path.charAt(path.length - 1).localeCompare("/") === 0) {
        append = "index";
    } else {
        if (path.charAt(path.length - 1).localeCompare("x") !== 0) {
            append = "/index";
        }
    }
    xhttp.open("POST", path + append, false);
    xhttp.setRequestHeader("type", "fetch");
    xhttp.send();

    $('#calendar').fullCalendar({ // put your options and callbacks here
        dayClick: function (date, jsEvent, view) {
            var today = new Date(),
                selectedDay = date.format("DD"),
                selectedMonth = date.format("MM"),
                openModal;

            // El modal se abre si sucede alguna de las siguientes situaciones:
            //  * Si el mes seleccionado es el actual y el día es mayor o igual a hoy.
            //  * Si el mes seleccionado es mayor al actual.
            openModal = ((selectedMonth === (today.getMonth() + 1)) && selectedDay >= today.getDate()) || ((selectedMonth > today.getMonth() + 1));

            if (openModal) {
                jQuery('#mdlReservaciones').modal('show');
                globalDate = date;

                fecha = document.getElementById("fecha");
                fecha.innerHTML = date.format("DD MMMM YYYY");
                document.getElementById("Reservar").disabled = true;
                getResources(document.getElementById("resource_type"));
            }
        },
        header: {
            left: 'title',
            center: 'month,basicWeek,agendaDay',
            right: 'today prev,next'
        },

        events:  JSON.parse(json_events),//JSON.parse(json_events),                
        eventLimit: true,
        views: {
            basic: {
                eventLimit: 20// options apply to basicWeek and basicDay views
            }
        }
    });
});

function getResources(element) {
    if (element.value !== "Seleccionar") {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState === 4 && xhttp.status === 200) {
                obj = JSON.parse(xhttp.responseText); //Parsea el json que le envía el servidor y lo guarda en una variable global
                fillResources(); //Llama a este método para llegar el select
            }
        };

        var path = window.location.pathname,
            new_path = path.replace("/reservations/", "/resources/");

        //algunos navegadores no ponen el último /
        if (path === new_path) {
            new_path = path.replace("/reservations", "/resources/");
        }

        var start = getFormatedHour(document.getElementById("start").value),
            end = getFormatedHour(document.getElementById("end").value),
            dateFormat = globalDate.format("DD MMMM YYYY"),
            startDate = getDate(dateFormat); //Formatea la fecha a la que recibe la base de datos

        xhttp.open("POST", new_path + "getResources/" + element.value + "/" + start + "/" + end + "/" + startDate, false);

        xhttp.send();
    }

    return true;
}
    
function getFormatedHour(number) {
    var hour = "";

    if (number < 10) {
        hour = "0" + number + ":00:00";
    } else {
        hour = number + ":00:00";
    }

    return hour;
}
    
function fillResources() {
    html = "";
    var len = obj.available.length;
    document.getElementById("resource_description").innerHTML = obj.available[0].resource.description;

    for (var i = 0; i < len; ++i) {
        html += "<option id ="+i+">"+obj.available[i].resource.resource_name+"</option>";
    }

    len = obj.reserved.length;

    for (var i = 0; i < len; ++i) {
        html += "<option id ="+i+" disabled>"+obj.reserved[i].resource.resource_name+"</option>";
    }

    document.getElementById("resource").innerHTML = html;
}

function getReservationData() {
    if (document.getElementById("check").checked) {
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if(xhttp.readyState == 4 && xhttp.status == 200) {   
                jQuery('#callback').modal('show');
                setTimeout(function(){location.reload();},2000);
            }

            if(xhttp.readyState == 4 && xhttp.status == 500) {
                showModal( "<p style='color:red'>¡Lo sentimos!. Al parecer alguien más acaba de reservar el recurso. Recargue la página y verifique si aún aparece disponible. De estar disponible y no poder reservar, contacte al administrador.</p>");
                setTimeout(function(){location.reload();},10000);
            }
        };

        var date = document.getElementById("fecha").innerHTML; 

        date = getDate(date); //Formatea la fecha a la fecha que recibe la base de datos

        var start = document.getElementById("start").value,
            end = document.getElementById("end").value,
            
            start_Date = date + " " + start,
            end_Date = date + " " + end,
            
            resource = document.getElementById("resource").value,
            event_name = document.getElementById("event_name").value,
            user_comment = document.getElementById("comment").value,

            path = window.location.pathname;

        //algunas veces el navegador no pone el último /
        if(path.charAt(path.length - 1) != '/') {
            path = path+"/";
        }            

        xhttp.open("POST", path+"add");

        xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

        xhttp.send(JSON.stringify({
            start_date : start_Date,
            end_date : end_Date,
            user_comment : user_comment,
            event_name : event_name, 
            resource: resource
        })); 
    }
    else {
        showModal( "Debe aceptar los términos y condiciones de uso");   
    }
}

function getDate(date) {
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

function showDescription(element) {
    document.getElementById("resource_description").innerHTML = obj.available[element[element.selectedIndex].id].resource.description;
}

var eventNameText = "";

function setEventName(input) {
    eventNameText = input.value;
}

function activateButton(select, checkbox) {        
    if ((select.value != "Seleccionar") && checkbox.checked && eventNameText != "") {
        document.getElementById("Reservar").disabled = false;
    } else {
        document.getElementById("Reservar").disabled = true;
    }
}

function showModal(text) {
    document.getElementById("callbackText").innerHTML = text;
    $('#callback').modal('show');
}   