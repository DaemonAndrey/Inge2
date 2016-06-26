var peticionHTTP, datos;
//var logoUCR = 'img/logoUCR.png';
var logoUCR = new Image();
logoUCR.src = '../img/logoUCR.jpg';

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

function getRespuesta() {
    if (peticionHTTP.readyState === 4 && peticionHTTP.status === 200) {
        datos = JSON.parse(peticionHTTP.responseText);
        generarPDF();
    }
}

function solicitarDatosHistorico() {
    inicializarXHR();
    
    var path = window.location.pathname, new_path;

    //algunas veces el navegador no pone el último /
    if (path.charAt(path.length - 1) !== '/') {
        path = path + "/";
    }
    
    new_path = path.replace("/manage/", "/getHistoricReservations/");
    
    realizarPeticion(new_path, "POST", getRespuesta);
}

var getColumns = function () {
    return [
        {title: "Fecha", dataKey: "start_date"},
        {title: "Hora inicio", dataKey: "start_hour"},
        {title: "Hora fin", dataKey: "end_hour"},
        {title: "Evento", dataKey: "event_name"},
        {title: "Recurso", dataKey: "resource_name"},
        {title: "Responsable", dataKey: "user"},
        {title: "Comentarios", dataKey: "user_comment"}
    ];
};

var getRows = function () {
    return datos;
};

function generarPDF() {
    var doc = new jsPDF('l', 'pt', 'letter'),
        
        columnsLong = getColumns(),
        
        rowsLong = getRows(),
        
        header = function (data) {
            doc.setFontSize(16);
            doc.setTextColor(40);
            doc.setFontStyle('normal');
            doc.addImage(logoUCR, 'JPEG', 40, 40, 70, 70);
            doc.text("\nUniversidad de Costa Rica \nEscuela de Educación", data.settings.margin.left + 80, 50);
        },
        
        totalPagesExp = "{total_pages_count_string}",
        
        footer = function (data) {
            doc.setFontSize(8);
            var str = "Página " + data.pageCount;
            // Total page number plugin only available in jspdf v1.0+
            if (typeof doc.putTotalPages === 'function') {
                str = str + " de " + totalPagesExp;
            }
            doc.text(str, data.settings.margin.left, doc.internal.pageSize.height - 30);
        },
        
        options = {
            beforePageContent: header,
            afterPageContent: footer,
            startY: doc.autoTableEndPosY() + 150,
            styles: {overflow: 'linebreak'},
            bodyStyles: {
                valign: 'top'},
            headerStyles: {
                fillColor: [145, 187, 27],
                fontSize: 12,
                rowHeight: 20
            }
        };
    
    doc.text("Reporte de reservaciones", 40, 140);
    
    doc.autoTable(columnsLong, rowsLong, options);
    
    if (typeof doc.putTotalPages === 'function') {
        doc.putTotalPages(totalPagesExp);
    }
    
    doc.save("prueba.pdf");
}