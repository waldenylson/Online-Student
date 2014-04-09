/* Waldenylson Silva - Desenvolvimeto de Sistemas ---------------------------------------------*/

var xmlhttp; /* Variável Responsável pelo Tipo de Requisição -------------*/
    
var destino;
var html;

/* Verifica se o Navegador suporta requisições XMLHttp ------------*/
if(window.XMLHttpRequest) {
    try {
        xmlhttp = new XMLHttpRequest(); 
    }catch(e) {
        xmlhttp = false;
    }
}
/* Microsoft IE -----------------------------------*/
else if(window.ActiveXObject){ 
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP"); 
    }catch(e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }catch(e) {
            xmlhttp = false;
        }
    }
}

/* Captura o Destino do Resultado ----------------*/
function getDestino(layer){    
    destino = layer;
}

/* Modifica o Título da Layer -------------*/
function mudaTitulo(texto){
    html = '<strong>'+texto+'</strong>';    
}

/* Recebe o Resultado da Requisição XMLHttp ---------------*/
function resultado() {
    /* Carga Completa Mostra Resultado ----------------*/
    if(xmlhttp.readyState == 4) {
        saidaAjax();
        xmlhttp.abort();
    }
    /* Carga Incompleta Mostra Animação -------------*/ 
    else if(xmlhttp.readyState == 1) {
        carregarAjax();
    }
}

/* Requisita a Página em CallBack --------------*/
function Ajax(requisicao, url) {
    var pagina = url;
    var metodo = requisicao;
    if(xmlhttp) {
        xmlhttp.onreadystatechange = function() { resultado(); };
        xmlhttp.open(metodo, pagina, true);
        xmlhttp.send("");
    }
}

/* Cria Animação ----------*/
function carregarAjax() {
    var carregaMensagem = "<b><center>Carregando...<br/><img src='/sistema/images/indicator.gif'></center></b>";
    document.getElementById(destino).innerHTML = carregaMensagem;
}

/* Devolve Conteudo Renderizado ---------------------------*/
function saidaAjax() {
    var xml = xmlhttp.responseText;
    document.getElementById(destino).innerHTML = xml;
    document.getElementById('titulo').innerHTML = '';
    document.getElementById('titulo').innerHTML = html;
}