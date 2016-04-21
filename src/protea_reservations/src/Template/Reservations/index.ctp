
<div class="row">
	<div class="col-xs-12">
		<div id='calendar'></div>	
	</div>
</div>


<script>

	$(document).ready(function() { // page is now ready, initialize the calendar...

/**
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        
        if(xhttp.readyState == 4 && xhttp.status == 200)
        {
           alert (xhttp.responseText);
        }
        
          
           
    };

    xhttp.open("POST", '/PROTEA/src/protea_reservations/reservations/index');
    xhttp.setRequestHeader("type", "fetch");
    xhttp.send();    
**/

  $.ajax({
     url: '/prot/src/protea_reservations/reservations/index',
     type: 'POST',
     data: 'type=fetch',
     async: false,
     success: function(response){
       json_events = response;
      

     }
  });

    $('#calendar').fullCalendar({ // put your options and callbacks here
        
        header: {
        left: 'title',
        center: 'month,agendaWeek,agendaDay',
        right: 'today prev,next'
       },

        events: JSON.parse(json_events),
        eventLimit: true, // for all non-agenda views
        views: {
            agenda: {
                eventLimit: 6 // adjust to 6 only for agendaWeek/agendaDay
            }
        },
        monthNames: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ], 
       monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
       dayNames: [ 'Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
       dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
       buttonText: {
        today: 'hoy',
        month: 'mes',
        week: 'semana',
        day: 'día'
       }
    });

});
</script>