<!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

<!--Font Awesome (added because you use icons in your prepend/append)-->
<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
<div class="bootstrap-iso">
 <div class="container-fluid">
  <form method="post">
  <div class="row">
   <div class='col-md-4 col-sm-4 col-xs-9 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>
     <div class="form-group ">
      <label class="control-label requiredField" for="date">
       Fecha de Inicio:
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class="input-group">
       <div class="input-group-addon">
        <i class="fa fa-calendar">
        </i>
       </div>
       <input class="form-control" id="first_date" name="first_date" placeholder="MM/DD/YYYY" type="text"/>
      </div>
     </div>
    </div>
    <div class='col-md-4 col-sm-4 col-xs-9 col-md-offset-1 col-sm-offset-1 col-xs-offset-1'>

     <div class="form-group ">
      <label class="control-label requiredField" for="FechaFin">
       Fecha Final:
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class="input-group">
       <div class="input-group-addon">
        <i class="fa fa-calendar">
        </i>
       </div>
       <input class="form-control" id="end_date" name="end_date" placeholder="DD/MM/YYYY" type="text"/>
      </div>
     </div>
    </div>
   </div>
     <div class='col-md-4 col-sm-4 col-xs-9 col-md-offset-4 col-sm-offset-4 col-xs-offset-1'>
        <?=
            $this->Form->input('resource_type_id', ['label' => 'Tipo: ',
                                                            'options' => $resource_types_options,
                                                            'class' => 'form-control']);
        ?>
        <br>
    </div>
    <div class='row  text-center' id="btnGenerarTabla">
        <div class='col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1'>
            <br>
            <?= $this->Html->link('Generar Tabla', array('controller' => 'HistoricReservations','action' => 'table', '$start_date','end_date','resource_type'), array( 'class' => 'btn btn-primary', 'style' => 'width:120px')) ?>
            <?= $this->Form->button('Imprimir Tabla', ['class' => 'btn btn-success', 'style' => 'width:120px']); ?>
        </div>
    </div>
     </form>
 </div>
</div>


<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="first_date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>

