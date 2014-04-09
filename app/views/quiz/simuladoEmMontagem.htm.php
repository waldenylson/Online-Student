<script type="text/javascript">
$(function () {
    $("img").click(function () {          
        var a = "#teste"+this.id;
        $.post("<?php echo Mapper::url('/quiz/removerQuestaoSimuladoEmMontagem'); ?>", { dados: this.id }, function (retorno_PHP) {
            if (retorno_PHP == 0) {
                $(a).fadeOut("slow");    
            } else {
                alert("Ocorreu um Erro no Processamento dos Dados");    
            }                        
        });        
    });
});
</script>

<style type="text/css">
    a:link {
        text-decoration: none;
        color: #0000FF;
    }
    a:visited {
        text-decoration: none;
        color: #0000FF;
    }
    a:hover {
        text-decoration: underline; 
        color: #0000FF;
    }
    a:active {
        text-decoration: none;
    }

    .borda2 {
		background-color: #FFFFFF;
		border: 1px solid #3166A5;
		padding: 1px;
		margin-left: 10px;
		margin-right:10px;
		margin-top: 10px;
		margin-bottom: 10px;
		padding-bottom: 5px;
		color: #5A5E66;
		font-family: Tahoma, Geneva, sans-serif;
		font-size: 13px;
		text-decoration: none;
	}
    .cursorHandCancel {
        cursor: pointer;
        height: 11px;
        width: 14px;
    }
</style>

<script type="text/javascript" src="<?php echo Mapper::url("/shadowbox/shadowbox.js"); ?>"> </script>
<link   type="text/css" href="<?php echo Mapper::url("/shadowbox/shadowbox.css"); ?>" rel="stylesheet"  />
        
<script type="text/javascript">
    Shadowbox.init({
        language: "pt",
        player: ["img", "html", "swf"],
        modal: true                         
    });
</script>

<fieldset class="borda2">
    <legend><b><i>&nbsp;.:&nbsp;Montando Simulado - Quest&otilde;es já Selecionadas&nbsp;:.&nbsp;</i></b></legend>
	<ul>
		<?php if(!empty($dados)) foreach($dados as $row) { ?> 
			<li id="<?php echo 'teste'.$row['id'];?>">
				<a href="<?php echo Mapper::url('/quiz/editarQuestao/') . '/' . $row["id"]; ?>" title="Visualizar a Questão Completa..." rel="shadowbox"><?php echo $row['enunciado']; ?></a>
                <?php echo $html->image("quiz/button-cross.gif", array("id" => $row["id"], "title" => "Excluir Questão!", "class" => "cursorHandCancel", "onclick" => "javascript:remover(this.id);")); ?>                
			</li>	      
		<?php } ?>	
	</ul>
</fieldset>
<div class="retorno"></div>