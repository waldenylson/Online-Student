<!DOCTYPE HTML>
<html lang="pt-br" class="Modern_Monkey">
    <head>
        <meta charset="utf-8">
        <title>Simulado Florence Escola Técnica</title>
        
        <?php echo $html->script("simulados.js");       ?>
        <?php echo $html->stylesheet("simulados.css");  ?>
        <?php echo $html->script("jquery.min.js");      ?>

        <?php $cssURL = Config::read("cssURL"); ?>
        <?php if(!empty($cssURL)) echo $html->stylesheet(Config::read("cssURL")); ?>

        <script type="text/javascript">
            var minutos     = 59;
            var timeCounter = 60;
            $(function(){
                window.setInterval(function() {
                    
                    var updateTime  = eval(timeCounter) - eval(1);
                    
                    if(minutos == 0 && updateTime == 0){
                        $("#frmS").submit();
                    }

                    if(updateTime <= 9){
                        $("span[id=timer]").html(minutos + ":0" + updateTime);                        
                    } else $("span[id=timer]").html(minutos + ":" + updateTime);

                    if (updateTime == 0){
                        minutos--;
                        updateTime = 60;                        
                    }

                    timeCounter = updateTime;
                    
                }, 1000);
            });

            // $(window).bind('beforeunload', function(){ 
            //     return "Deseja Realmente Cancelar o Simulado?\n" + "Esta Operação Não poderá ser desfeita e\n" + "este Simaludo não poderá mais ser Respondido";
            // });
        </script>
    </head>
    <body onload="setup();" class="notranslate">
        <?php echo $this->contentForLayout; ?>
    </body>
</html>