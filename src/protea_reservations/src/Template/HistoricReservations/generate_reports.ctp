<?php 
$this->Html->image('logoUCR.jpg', ['alt' => 'LogoUCR', 'id'=>'logoUCR']);

// CSS
echo $this->Html->css('reservations.css'); 
echo $this->Html->css('resources.css'); 

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

<!-- TÍTULO -->
<div class="row" style="color:#000;">
    <div class='col-xs-12'>
        <legend>
            <div class='text-center'>
                <h2>Reporte de Reservaciones</h2>
                <br>
            </div>
        </legend>
    </div>
</div>
<!-- FIN DE TÍTULO -->

<div class="row">
    <div class="col-xs-12" style="text-align:center;">
        <div class='col-xs-8 col-xs-offset-2'>
            <button id="btnReporte" class="btn btn-success" onclick="solicitarDatosHistoricos()">Generar Reporte</button>
        </div>
    </div>
</div>

<div class="col-xs-12">
    <br>
    <br>
</div>

<!-- TABLA -->
<div class="table-responsive">
    <table class="table table-striped table-hover table-sm" style="color:#000;">
        <!-- ENCABEZADO TABLA -->
        <tr>
            <th>
                <?= $this->Paginator->sort('reservation_start_date', 'Fecha') ?>
            </th>
            <th>
                Hora inicio
            </th>
            <th>
                Hora fin
            </th> 
            <th>
                <?= $this->Paginator->sort('resource_name', 'Recurso') ?>
            </th> 
            <th>
                <?= $this->Paginator->sort('event_name', 'Curso/Actividad') ?>
            </th> 
            <th>
                Usuario
            </th>
        </tr> <!-- FIN ENCABEZADO TABLA -->

        <?php 
            // Recorre todos los recursos y los muestra en la tabla.
            foreach ( $historic_reservations as $historic_reservation ):
             ?>
                <tr>
                    
                    <!-- Fecha-->
                    <td>
                        <?= $historic_reservation['start_date'] ?>
                        <?php
                            /*if($historic_reservation['start_date'] != null)
                                echo date_format($historic_reservation['reservation_start_date'], "d/M/Y");
                            elseif($historic_reservation['start_date'] != null)
                                echo date_format($historic_reservation['reservation_start_date'], "d/M/Y")*/
                        ?>
                    </td>

                    <!-- Hora de Inicio -->
                    <td>
                        <?= $historic_reservation['start_hour'] ?>
                        <?php 
                            /*if($historic_reservation['reservation_start_date'] != null)
                                echo date_format($historic_reservation['reservation_start_date'], "H:i");
                            elseif($historic_reservation['reservation_start_date'] != null)
                                echo date_format($historic_reservation['reservation_start_date'], "H:i")*/
                        ?>
                    </td>
                    
                    <!-- Hora final -->
                    <td>
                        <?= $historic_reservation['end_hour'] ?>
                        <?php 
                            /*if($historic_reservation['reservation_end_date'] != null)
                                echo date_format($historic_reservation['reservation_end_date'], "H:i");
                            elseif($historic_reservation['reservation_end_date'] != null)
                                echo date_format($historic_reservation['reservation_end_date'], "H:i")*/
                        ?>
                    </td>
                    <!-- NOMBRE RECURSO -->
                    <td>
                        <?= $historic_reservation['resource_name'] ?>
                        <?php 
                            //echo $historic_reservation['resource_name'];
                        ?>
                    </td>
                    <!-- FIN NOMBRE RECURSO -->
                    
                    <!-- ACTIVIDAD -->
                    <td>
                        <?= $historic_reservation['event_name'] ?>
                        <?php
                            //echo $historic_reservation['event_name'];
                        ?>
                    </td>
                    <!-- FIN ACTIVIDAD -->
                    
                    <!-- USUARIO -->
                    <td>
                        <?= $historic_reservation['user'] ?>
                        <?php
                            //echo $historic_reservation['user_username'];
                        ?>
                    </td>    
                </tr>
            <?php endforeach; ?>
        <?php unset($historic_reservation); ?>
    </table>
</div>
<!-- FIN DE TABLA -->

<!-- PAGINADOR -->
<div class="row text-center">
  <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
      <div class="center_pagination" >
          <ul class="pagination">
                <li><?php echo $this->Paginator->numbers(array('separator' => '')); ?></li>
          </ul>
      </div>
   </div>
</div>
<!-- FIN DE PAGINADOR -->

<div class="row">
    <div class="col-xs-12" style="text-align:center;">
        <div class='col-xs-8 col-xs-offset-2'>
            <?= $this->Html->link('Regresar',
                                  ['controller' => 'HistoricReservations',
                                   'action'=> 'index'
                                  ],
                                  ['class' => 'btn btn-primary',
                                   'style' => 'width:90px'
                                  ]);
            ?>
        </div>
    </div>
</div>

<div class="col-xs-12">
    <br>
</div>

<hr>

<div class="col-xs-12">
    <br>
</div>


<?php
    $stuff = $historic_reservations->toArray();
    $t = json_encode($stuff);
?>

<script type="text/javascript">
    
    var datos;

    var logoUCR = new Image();
    logoUCR.src = '../img/logoUCR.jpg';

    function getDiaSemana() {
        'use strict';

        var fechaHoy = new Date(),
            diaSemanaNumero = fechaHoy.getDay(),
            diaSemana;

        switch (diaSemanaNumero) {
        case 0:
            diaSemana = "Domingo";
            break;
        case 1:
            diaSemana = "Lunes";
            break;
        case 2:
            diaSemana = "Martes";
            break;
        case 3:
            diaSemana = "Miércoles";
            break;
        case 4:
            diaSemana = "Jueves";
            break;
        case 5:
            diaSemana = "Viernes";
            break;
        case 6:
            diaSemana = "Sábado";
            break;
        }

        return diaSemana;
    }

    function getMes() {
        'use strict';

        var fechaHoy = new Date(),
            mesNumero = fechaHoy.getMonth(),
            mes;

        switch (mesNumero) {
        case 0:
            mes = "enero";
            break;
        case 1:
            mes = "febrero";
            break;
        case 2:
            mes = "marzo";
            break;
        case 3:
            mes = "abril";
            break;
        case 4:
            mes = "mayo";
            break;
        case 5:
            mes = "junio";
            break;
        case 6:
            mes = "julio";
            break;
        case 7:
            mes = "agosto";
            break;
        case 8:
            mes = "setiembre";
            break;
        case 9:
            mes = "octubre";
            break;
        case 10:
            mes = "noviembre";
            break;
        case 11:
            mes = "diciembre";
            break;
        }

        return mes;
    }

    function getRespuesta() {
        'use strict';

        datos = <?php print $t; ?>;

        generarPDF();
    }

    function solicitarDatosHistoricos() {
        'use strict';

        getRespuesta();
    }

    // Establece cuáles van a ser las columnas de la tabla
    var getColumns = function () {
        'use strict';

        return [
            {title: "Fecha", dataKey: "start_date"},
            {title: "Inicio", dataKey: "start_hour"},
            {title: "Fin", dataKey: "end_hour"},
            {title: "Evento", dataKey: "event_name"},
            {title: "Recurso", dataKey: "resource_name"},
            {title: "Responsable", dataKey: "user"},
            {title: "Comentarios", dataKey: "user_comment"}
        ];
    };

    // Devuelve los datos que irán en cada fila
    var getRows = function () {
        'use strict';

        return datos;
    };

    function generarPDF() {
        'use strict';

        var doc = new jsPDF('l', 'pt', 'letter'),

            // Obtiene los encabezados de las columnas
            columnsLong = getColumns(),

            // Obtiene la información que va en las filas
            rowsLong = getRows(),

            // Establece la información que se pondrá en el encabezado
            header = function (data) {
                doc.setFontSize(16);
                doc.setTextColor(20);
                doc.setFontStyle('normal');
                //doc.addImage(logoUCR, 'JPEG', 40, 40, 70, 70);
                doc.text("\nUniversidad de Costa Rica \nFacultad de Educación", data.settings.margin.left + 80, 50);
            },

            totalPagesExp = "{total_pages_count_string}",

            // Establece la información que se pondrá en el pie de página
            footer = function (data) {
                var str = "Página " + data.pageCount, fechaHoy;

                if (typeof doc.putTotalPages === 'function') {
                    str = str + " de " + totalPagesExp;
                }

                fechaHoy = new Date();
                str += ' - ' + getDiaSemana() + ' ' + fechaHoy.getDate() + ' de ' + getMes() + ' de ' + fechaHoy.getFullYear() + ', ' + fechaHoy.getHours() + ':' + fechaHoy.getMinutes() + ':' + fechaHoy.getSeconds();

                doc.setFontSize(8);
                doc.text(str, data.settings.margin.left, doc.internal.pageSize.height - 30);
            },

            // Establece las opciones generales de diseño del PDF
            options = {
                beforePageContent: header,
                afterPageContent: footer,
                startY: doc.autoTableEndPosY() + 150,
                styles: {overflow: 'linebreak'},
                bodyStyles: {
                    valign: 'top'
                },
                headerStyles: {
                    fillColor: [145, 187, 27],
                    fontSize: 12,
                    rowHeight: 20
                },
                columnStyles: {
                    user: {
                        columnWidth: 'wrap'
                    }
                }
            };

        doc.setFontSize(14);
        doc.text("Reporte de reservaciones", 40, 140);

        doc.autoTable(columnsLong, rowsLong, options);

        if (typeof doc.putTotalPages === 'function') {
            doc.putTotalPages(totalPagesExp);
        }

        doc.save("Reporte de reservaciones.pdf");
    }

    function getHistoricReservationData() {
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {
            if(xhttp.readyState === 4 && xhttp.status === 200) {
            }
        };

        var start = document.getElementById("start_date").value,
            end = document.getElementById("end_date").value,

            start_Date = start,
            end_Date = end,

            resource_type = document.getElementById("resource-type-id").value,
            state = document.getElementById("active").value,

            path = window.location.pathname;

        //algunas veces el navegador no pone el último /
        if (path.charAt(path.length - 1) !== '/') {
            path = path + "/";
        }

        xhttp.open("POST", path + "table");

        xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

        xhttp.send(JSON.stringify({
            start_date : start_Date,
            end_date : end_Date,
            resource_type_id: resource_type,
            state: state
        }));
    }
</script>