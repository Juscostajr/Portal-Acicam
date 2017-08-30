var xmlHttp = GetXmlHttpObject();
function mostrar(formulario) {
    if (xmlHttp == null) {
        alert ("Seu browser não suporta AJAX!");
        return;
    }else{
        var url = "/forms/" + formulario + ".php";
		xmlHttp.onreadystatechange = stateChanged;
        xmlHttp.open("GET",url,true);
        xmlHttp.send(null);
    }
}

function stateChanged() {
    if (xmlHttp.readyState==1 || xmlHttp.readyState==2 || xmlHttp.readyState==3) {
        document.getElementById("modal-form").innerHTML="Carregando...";
    }
    if (xmlHttp.readyState==4) {
        document.getElementById("modal-form").innerHTML=xmlHttp.responseText;
    }
}

 
function GetXmlHttpObject() {
    var xmlHttp = null;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        // Internet Explorer
        try {
        xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}