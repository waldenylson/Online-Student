<script type="text/javascript">    
$(function () {
    var cadeiras = new Array;
    $("#cadeira_id").change(function () {
        var cadeira_id = $("#cadeira_id").val();
        $.cookie("cadeiraID", cadeira_id);
        $("#loading").fadeIn("fast");
        $("#frmGerarSimulado").submit();
    });
    $('#cadeira_id option[value="' + $.cookie("cadeiraID") + '"]').attr({
        selected: "selected"
    });
    $.cookie("cadeiraID", null);
    $("#enviarFormulario").click(function () {
        if (cadeiras.length >= 1) {
            $(".formulario").hide("slow");
            $(".loading").fadeIn("slow");
            $.post("<?php echo Mapper::url('/quiz/saveDataInCurrentSession'); ?>", { dados: cadeiras }, function (retorno_PHP) {
                $(".loading").fadeOut("fast");
                if (retorno_PHP == 0) {
                    $(".sucessoAddQuestoesSimulado").fadeIn("slow")
                } else {
                    $(".erroDB").fadeIn("slow");
                    //$(".erroDB").html(retorno_PHP);
                }
                $("#voltarAddQuestoesSimulado").click(function () {
                    $(".sucessoAddQuestoesSimulado").hide("slow");
                    $(".formulario").fadeIn("slow");
                    // $('#cadeira_id option[value="legenda"]').attr({
                    //     selected: "selected"
                    // });

                    $('#cadeira_id option[value="' + $.cookie("cadeiraID") + '"]').attr({
                        selected: "selected"
                    });

                    //$("#frmGerarSimulado").submit()
                });
                $("#voltarErroDB").click(function () {
                    $(".formulario").fadeIn("slow");
                    $(".erroDB").hide("slow");
                    // $('#cadeira_id option[value="legenda"]').attr({
                    //     selected: "selected"
                    // })
                    $('#cadeira_id option[value="' + $.cookie("cadeiraID") + '"]').attr({
                        selected: "selected"
                    });
                });
            });
        } else {
            $(".erro").slideDown("slow").delay(3e3);
            $(".erro").slideUp("slow")
        }
    });

    $("#gerarSimulado").click(function () {        
        $(".formulario").hide("slow");
        $(".loading").fadeIn("slow");
        $.post("<?php echo Mapper::url('/quiz/gerarSimulado'); ?>", { dados: null }, function (retorno_PHP) {
            $(".loading").fadeOut("fast");
            if (retorno_PHP == 0) {
                $(".sucessoMontagemSimulado").fadeIn("slow")
            } else {
                $(".erroDB").fadeIn("slow");
                //$(".erroDB").html(retorno_PHP);
            }
            $("#voltarMontagemSimulado").click(function () {
                $(".sucessoMontagemSimulado").hide("slow");
                $(".formulario").fadeIn("slow");
                $('#cadeira_id option[value="legenda"]').attr({
                    selected: "selected"
                });
                $("#frmGerarSimulado").submit()
            });
            $("#voltarErroDB").click(function () {
                $(".formulario").fadeIn("slow");
                $(".erroDB").hide("slow");
                // $('#cadeira_id option[value="legenda"]').attr({
                //     selected: "selected"
                // })
                $('#cadeira_id option[value="' + $.cookie("cadeiraID") + '"]').attr({
                    selected: "selected"
                });
            });
        });        
    });
    
    $(":checkbox").click(function () {
        if ($(this).is(":checked")) {
            cadeiras.push($(this).val());
        } else {
            var b = $(this).val();
            cadeiras = $.grep(cadeiras, function (a) {
                return a != b
            });
        }
    });

    $("#visualizarSimuladoEmConstrucao").click(function(){
        $.post("<?php echo Mapper::url('/quiz/checkDataInSession'); ?>", { dados: null }, function (retorno_PHP) {
            var str = retorno_PHP;
            if (str.substring(0,1) == 0) {
                $("#simuladoEmMontagemLink").click();
            } else {
                alert("Simulado não Contém Nenhuma Questão!");                                
            }
        });        
    });

    $("#cancelarSimulado").click(function(){
        $.post("<?php echo Mapper::url('/quiz/unsetQuestoes'); ?>", { dados: null }, function (retorno_PHP) {
            alert("Questões Selecionadas Excluidas!");
        });
    });
})
</script> 
<script type="text/javascript" src="<?php echo Mapper::url("/shadowbox/shadowbox.js"); ?>"> </script>
<link   type="text/css" href="<?php echo Mapper::url("/shadowbox/shadowbox.css"); ?>" rel="stylesheet"  />
        
<script type="text/javascript">
    Shadowbox.init({
        language: "pt",
        player: ["img", "html", "swf"],
        modal: true                         
    });
</script>

<style type="text/css">
    /* Tables */
    table {             
        clear: both;
        color: #333;
        margin-bottom: 10px;
        font-family: Tahoma, Geneva, sans-serif;
        font-size: 12px;
        padding-left: 5px;
        padding-right: 5px;
    }
    table th {      
        background-image:url("<?php echo Mapper::url("/images/tbg_th1.png"); ?>");      
        text-align: justify;
    }
    
    tr {
        background:none repeat scroll 0 0 #DBE7F9;              
    }
    tr:hover {
        background:none repeat scroll 0 0 #B4CAE9;
        cursor: default;
    }
    
    tr td{
        padding-left: 5px;
    }
    tr td a:link{
        text-decoration: none;
    }   
   
    #keyword{
        height: 17px;
    }
    #button{        
        <?php                   
            $user_agente = $_SERVER["HTTP_USER_AGENT"];
            
            if(preg_match('/\.([^\.]*$)/', "MSIE", $user_agente)){         
                echo "padding-bottom: 0.3em;";                          
            }
            else{
                echo "padding-bottom: 2px;";                
            }                               
        ?>
    }
    strong{
        font-family:"Courier New", Courier, monospace;
        font-size:16px;
    }
    a:link {
        text-decoration: none;
        color: #0000FF;
    }
    a:visited {
        text-decoration: none;
        color: #0000FF;
    }
    a:hover {
        text-decoration: none; 
        color: #0000FF;
    }
    a:active {
        text-decoration: none;
    }
    .borda {
        background-color: #FFFFFF;
        border: 1px solid #3166A5;
        padding: 10px;
        margin-left: 10px;
        margin-right: 10px; 
    }
    .erro {
        display: none;
        background-color: #E54949;
        width: 500px;
        height: 30px;
        margin: 0 auto;
        text-align: center;
        padding-top: 10px;
    } 
    .erroDB {
        display: none;
        background-color: #ccc;
        width: 500px;
        height: 40px;
        margin: 0 auto;
        text-align: center;
        padding-top: 10px;
    }
    .cursorHand {
        cursor: pointer;
    }
    .cursorHandCancel {
        cursor: pointer;
        padding-bottom: 5px;
    } 
</style>
<div class="erro"> <b><i>Simulado Deve Conter no Mínimo uma Quest&atilde;o!</i></b></div>
<fieldset class="borda">
    <legend><b><i>&nbsp;.:&nbsp;Montando Simulado&nbsp;:.&nbsp;</i></b></legend> 
    <div class="formulario">
        <fieldset class="borda">              
            <form name="frmGerarSimulado" id="frmGerarSimulado" action="<?php echo Mapper::url("/quiz/novaProva"); ?>" method="post">
                <strong>Cadeira Simulado:</strong>
                <select id="cadeira_id" name="cadeira_id" style="width: auto; margin-top:10px;">
                    <option id="legenda" name="legenda" value="legenda" selected="selected">Selecione o A Cadeira do Simulado a ser Gerado...</option>
                    <?php if(!empty($cadeiras)) foreach($cadeiras as $row) { ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nome']; ?></option>
                    <?php } ?>
                </select>
                <div id="loading" style="float:right; margin-right:500px; display:none;">
                    <b><img  height="35" width="35" src='/sistema/images/indicator.gif'></b>                    
                </div>                      
            </form>   
        </fieldset>   
        <table>
            <thead>    
                <tr style="border: 1px solid #000;">           
                    <th width="80%">&nbsp;&nbsp;ENUNCIADO</th>
                    <th width="10%">&nbsp;&nbsp;PONTUA&Ccedil;&Atilde;O</th>
                    <th width="10%">&nbsp;SELECIONA</th>                      
                </tr>
            </thead>                   
            <thead>            
                <?php if(!empty($dados)) foreach($dados as $row) { ?>   
                <tr>
                    <td><a href="<?php echo Mapper::url('/quiz/editarQuestao/') . '/' . $row["id"]; ?>" title="Visualizar a Questão Completa..." rel="shadowbox;"><?php echo $row['enunciado'];    ?></a></td>            
                    <td><?php echo number_format($row['pontuacao'], 2, '.', '');      ?></td>
                    <td><input type="checkbox" id="questao" name="questao" value="<?php echo $row["id"]; ?>" /></td>                        
                </tr>       
                <?php } ?>
            </thead>                   
        </table>
        <fieldset class="borda" style="width:831px; height: 20px; padding-top: 0px; margin-left: 7px">
            <?php echo $html->image("quiz/button-plus-big.gif", array("id" => "enviarFormulario", "title" => "Adicionar Quest&otilde;es Selecionadas ao Simulado!", "class" => "cursorHand")); ?>
            <?php echo $html->image("quiz/button-gear.gif", array("id" => "gerarSimulado", "title" => "Gerar Simulado!", "class" => "cursorHandCancel")); ?>
            <?php echo $html->image("quiz/button-view.gif", array("id" => "visualizarSimuladoEmConstrucao", "title" => "Ver Simulado em Montagem!", "class" => "cursorHandCancel")); ?>
            <?php echo $html->image("quiz/button-cross.gif", array("id" => "cancelarSimulado", "title" => "Cancelar Montagem do Simulado!", "class" => "cursorHandCancel")); ?>           
        </fieldset>        
    </div>    
    <div class="loading" style="display:none;">
        <div style="text-align:center;">
            <b><i>&nbsp;&nbsp;&nbsp;&nbsp;Carregando, aguarde...</b></i><br />
            <b><img src='/sistema/images/indicator.gif' /></b>
        </div>        
    </div>
    <div class="sucessoMontagemSimulado" style="display:none;">
        <div style="text-align:center;">
            <b><i>&nbsp;&nbsp;&nbsp;&nbsp;Simulado Gerado com Sucesso!</b></i><br />
            <button id="voltarMontagemSimulado">Voltar</button>
        </div>        
    </div>
    <div class="sucessoAddQuestoesSimulado" style="display:none;">
        <div style="text-align:center;">
            <b><i>&nbsp;&nbsp;&nbsp;&nbsp;Quest&atilde;o(es) Adicionada(s) ao Simulado com Sucesso!</b></i><br />
            <button id="voltarAddQuestoesSimulado">Voltar</button>
        </div>        
    </div>
    <div class="erroDB">
        <b><i>Ocorreu um Erro no Processamento do Banco de Dados!</i></b><br />
        <button id="voltarErroDB">Voltar</button>
    </div>   
</fieldset>
<a href="<?php echo Mapper::url("/quiz/simuladoEmMontagem"); ?>" id="simuladoEmMontagemLink" rel="shadowbox" title="Estimativa do Simulado"></a>