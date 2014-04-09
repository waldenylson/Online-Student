/* Utilidades JS */

function mudarFundo(elemento, className){       
    if(className == ""){
        $("#"+elemento).addClass("selected");         
    }else {
        $("#"+elemento).removeClass();
    }
}

