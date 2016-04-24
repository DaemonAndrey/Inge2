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

    //
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
  $.ajax({
     url: '/PROTEA/src/protea_reservations/reservations/index',
     type: 'POST',
     async: false,
     success: function(response){
       alert(response);
       json_events = response;
      

     }
  });
**/

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
    });
});
</script>