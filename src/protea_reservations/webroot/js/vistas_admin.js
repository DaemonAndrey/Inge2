/*global JQuery*/



//Código para el modal de los flash

if(document.getElementsByClassName("message").length)
{
    /**
    var element = document.getElementsByClassName("message");
    var text = element[0].innerHTML;
    element[0].innerHTML += ".";

    document.getElementById("flashText").style = "color:green";
    if(text.search("-red") != -1)
    {
        document.getElementById("flashText").style = "color:red";
        text = text.replace("-red", "");
    }

    document.getElementById("flashText").innerHTML = text;
**/

    jQuery('#flash').modal('show');
    setTimeout(function () {
        jQuery('#flash').modal('hide');
    }, 3000);
    
}


