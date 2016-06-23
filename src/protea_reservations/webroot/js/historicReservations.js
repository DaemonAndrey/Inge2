var peticionHTTP, datos;

function inicializarXHR() {
    if (window.XMLHttpRequest) {
        peticionHTTP = new XMLHttpRequest();
    }
}

function realizarPeticion(url, metodo, funcion) {
    // Define que se va a realizar cuando cambie el estado onready
    peticionHTTP.onreadystatechange = funcion;
    
    // Realiza la petición
    peticionHTTP.open(metodo, url, true);
    peticionHTTP.send(null);
}

function solicitarDatosHistorico() {
    inicializarXHR();
    
    var path = window.location.pathname;

    //algunas veces el navegador no pone el último /
    if(path.charAt(path.length - 1) != '/') {
        path = path+"/";
    }   
    var new_path = path.replace("/manage/","/getHistoricReservations/"); 
    
    realizarPeticion(new_path, "POST", getRespuesta);
}

function getRespuesta() {
    alert("Actuando");
    if(peticionHTTP.readyState === 4 && peticionHTTP.status === 200) {
        datos = JSON.parse(peticionHTTP.responseText);
        generarPDF();
    } 
}

//window.onload = solicitarDatosHistorico;

var getColumns = function () {
    return [
        {title: "ID", dataKey: "id"},
        {title: "Fecha", dataKey: "start_date"},
        //{title: "Hora inicio", dataKey: "horaInicio"},
        //{title: "Hora fin", dataKey: "horaFin"},
        {title: "Evento", dataKey: "event_name"}/*,
        {title: "Recurso", dataKey: "resources"},
        {title: "Responsable", dataKey: "responsable"},
        {title: "Comentarios", dataKey: "comentarios"}*/
    ];
};

var getRows = function () {
    return datos;
};

function generarPDF () {
    var doc = new jsPDF('l', 'pt');
    var columnsLong = getColumns(), rowsLong = getRows();

    doc.text("Overflow 'linebreak'", 10, doc.autoTableEndPosY() + 30);
    doc.autoTable(columnsLong, rowsLong, {
        startY: doc.autoTableEndPosY() + 45,
        margin: {horizontal: 10},
        styles: {overflow: 'linebreak'},
        bodyStyles: {valign: 'top'},
        columnStyles: {email: {columnWidth: 'wrap'}},
        headerStyles: {
            fillColor: [145, 187, 27],
            fontSize: 13,
            rowHeight: 20
        },
    });

    doc.save("prueba.pdf");
};

// Returns a new array each time to avoid pointer issues
/*var getColumns = function () {
    return [
        {title: "Fecha", dataKey: "fecha"},
        {title: "Hora inicio", dataKey: "horaInicio"},
        {title: "Hora fin", dataKey: "horaFin"},
        {title: "Recurso", dataKey: "recurso"},
        {title: "Responsable", dataKey: "responsable"},
        {title: "Comentarios", dataKey: "comentarios"}
    ];
};

var getHistoricReservationsData() {
    var xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function() {
        if(xhttp.readyState === 4 && xhttp.status === 200) {
            
        }
    };
    
    xhttp.open("POST", );
    xhttp.send();
};

function generarReporte() {
    var doc = new jsPDF('l', 'pt');
    var columnsLong = getColumns();
    
    doc.text("Reporte", 10, doc.autoTableEndPosY() + 30);
    doc.autoTable(columnsLong, getData(3), {
        startY: doc.autoTableEndPosY() + 45,
        margin: {horizontal: 10},
        styles: {overflow: 'linebreak'},
        bodyStyles: {valign: 'top'},
        columnStyles: {email: {columnWidth: 'wrap'}},
    });

    return doc;
}

function getInformacionFiltroHistorico() {
    var infoHistorico = "", xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4 && xhttp.status === 200) {
            infoHistorico = xhttp.responseText;
            
            // Llama a la función generarReporte()
            generarReporte();
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
    
    xhttp.open("POST", path + append, true);
    xhttp.send();
}*/