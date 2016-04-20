
<div class="row">
	<div class="col-xs-12">
		<div id='calendar'></div>	
	</div>
</div>

<?php

debug($resources);

?>

<script>
	$(document).ready(function() { // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({ // put your options and callbacks here
        
        header: {
        left: 'title',
        center: 'month,agendaWeek,agendaDay',
        right: 'today prev,next'
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