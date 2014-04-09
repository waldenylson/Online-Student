<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Expires" content="-1">
		    <title>Florence Palmares</title>        
        
        <?php echo $html->script("navigator.js"); ?>

    		<script type="text/javascript">
                <!--
                   //desabilita botão do mouse para ver fonte
                   var message="Função Desabilitada para o usuário";
                   
                   function click(e) {
                      return true;
                      if (document.all) {
                         if (event.button==2||event.button==3) {
                            alert(message);
                            return false;
                         }
                      }
                      if (document.layers) {
                         if (e.which == 3) {
                            alert(message);
                            return false;
                         }
                      }
                   }
                  
                   function aperta(e) {
                      if (document.all) 
                      {
                         if ( event.keyCode== 8 || 
                              event.keyCode==18 ||
                              event.keyCode==35 )
                         {
                            if(document.activeElement.tagName == "BODY"  ||
                               document.activeElement.tagName == "TABLE" ||
                               document.activeElement.tagName == "TR"    ||
                               document.activeElement.tagName == "TD"    ||
                               document.activeElement.tagName == "RADIO" ||
                               document.activeElement.tagName == "P"     ||
                               document.activeElement.tagName == "BR" ) {
                                //alert(message);
                                return false;
                            } 
                         }
                      } // if (document.all)
                       
                      if (document.layers) 
                      {
                         if (e.which == 8 ||
                             e.which ==18 ||
                             e.which ==35 )
                         {
                            alert(message);
                            return false;
                         }
                      } // if (document.layers) 
                   }   
                    
                   if (document.layers) {
                      document.captureEvents(Event.MOUSEDOWN);
                   } 
                   if (document.layers) {
                      document.captureEvents(Event.keyCode);
                   }

                   document.onmousedown=click;
                   document.onkeydown=aperta;
                   //document.onkeypress=aperta;               
                // fim -->

                function isFF() {
                    return (document.getElementById && !document.all) ? true : false;
                }

                function isPopUpBlocked() {
                    try {
                        var newWin = window.open("about:blank", "POPUPTEST", "width=5,height=5,top=" + screen.height + ",left=" + screen.width);
                        if (newWin || !newWin.closed) {
                            newWin.close();                            
                            return false;
                        }                        
                    } catch (e) {}

                    return true;
                }

                function openFullLogin() {
                   var yes = 1;
                   var no = 0;
                   var page = "<?php echo Mapper::url('/simulados/responderSimulado'); ?>";
                   var menubar = no;
                   var scrollbars = yes;
                   var locationbar = no;
                   var directories = no;
                   var resizable = no;
                   var statusbar = 0;
                   var toolbar = no;
                   var titlebar = no;
                   var fullscreen = no;

                   windowprops = "width=" + (screen.width-7) + ",height=" + (screen.height-75) + ",top=0,left=0";
                   windowprops += (menubar ? ",menubars=1" : ",menubars=0") +
                   (scrollbars ? ",scrollbars=1" : ",scrollbars=0") +
                   (locationbar ? ",location=1" : ",location=0") +
                   (directories ? ",directories=1" : ",directories=0") +
                   (resizable ? ",resizable=1" : ",resizable=0") +
                   (statusbar ? ",status=1" : ",status=0") +
                   (titlebar ? ",titlebar=1" : ",titlebar=0") +
                   (toolbar ? ",toolbar=1" : ",toolbar=0") +
                   (fullscreen ? ",fullscreen=1" : ",fullscreen=0");
                   //alert(page);
                   return window.open(page,"Florence Palmares", windowprops);
                }

                function submitForm(){
                  //não segue enquanto o frame begin não existir
                  try{  
                    if(!vWindowSIA.frames.begin){
                        setTimeout("submitForm()", 1000)
                    }else{
                        self.close();
                    }
                  }catch(e){
                  }
                }

                function onLoadBody() {
                    var n = new TheNavigator;
                    vWindowSIA = openFullLogin();
                    submitForm(); 
                }                
        </script>
    </head>
    <body onLoad="onLoadBody();">
        <?php echo $this->contentForLayout; ?>
        <script type="text/javascript">
            //if(!isPopUpBlocked()) { alert("Pop-Up Bloqueada!\nPara Responder o Simulado Desabilite o Bloqueio!");};
            if (isPopUpBlocked()) {
                var pgTutor;

                //Verifica se é o FireFox ou IE
                if (isFF()) {                    
                  pgTutor = "<?php echo Mapper::url('/PopupTutor/PopupTutorFF.html'); ?>";
                }
                else {
                  pgTutor = "<?php echo Mapper::url('/PopupTutor/PopupTutorIE.html'); ?>";                    
                }                

                //Define a página de tutorial para desbloqueio de popups
                document.getElementById("frmPopUp").src = pgTutor;

                //Exibe o div de popup bloqueado
                document.getElementById("divMsgBlocked").style.display = "block";

                //window.resizeTo(540, 430);

                //Posiciona no centro da tela    
                window.moveTo((screen.width / 2) - (document.body.clientWidth / 2), (screen.height / 2) - (document.body.clientHeight / 2));

                window.focus();
            }
        </script>
    </body>
</html>
