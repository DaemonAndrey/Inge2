var peticionHTTP, datos;

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

function inicializarXHR() {
    'use strict';
    
    if (window.XMLHttpRequest) {
        peticionHTTP = new XMLHttpRequest();
    }
}

function realizarPeticion(url, metodo, funcion) {
    'use strict';
    
    // Define que se va a realizar cuando cambie el estado onready
    peticionHTTP.onreadystatechange = funcion;
    
    // Realiza la petición
    peticionHTTP.open(metodo, url, true);
    peticionHTTP.send(null);
}

function getRespuesta() {
    'use strict';
    
    if (peticionHTTP.readyState === 4 && peticionHTTP.status === 200) {
        // Asigna a la variable 'datos' la información que respondió el servidor
        datos = JSON.parse(peticionHTTP.responseText);

        // Luego de obtener la información del servidor se genera el PDF
        generarPDF();
    }
}

function solicitarDatosHistorico() {
    'use strict';
    
    inicializarXHR();
    
    var path = window.location.pathname, new_path, actionIndex;
    
    actionIndex = path.indexOf("table");

    //algunas veces el navegador no pone el último /
    if (path.charAt(path.length - 1) !== '/') {
        path = path + "/";
    }
    
    path = path.substring(0, actionIndex);
    
    new_path = path + "generate-reports/";
    
    realizarPeticion(new_path, "POST", getRespuesta);
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
            doc.text("\nUniversidad de Costa Rica \nEscuela de Educación", data.settings.margin.left + 80, 50);
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

    xhttp.onreadystatechange = function() {
        if(xhttp.readyState == 4 && xhttp.status == 200) {   

        }

    var start = document.getElementById("start_date").value,
        end = document.getElementById("end_date").value,

        start_Date = start,
        end_Date = end,

        resource_type = document.getElementById("resource-type-id").value,
        state = document.getElementById("active").value,

        resource_type = document.getElementById("resource-type-id").value,

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