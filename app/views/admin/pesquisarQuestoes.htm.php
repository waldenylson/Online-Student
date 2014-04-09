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
	
	#keywordDIV{
		/*
		border: 1px solid #999;		
		padding: 10px;
		margin-bottom: 3px;
		margin-left: 5px;
		margin-right: 5px;	 */
	}
	#keyword{
		height: 17px;
	}
	#button{		
		<?php					
			$user_agente = $_SERVER["HTTP_USER_AGENT"];
			
			if(ereg("MSIE", $user_agente)){			
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
	
</style>
<?php echo $html->script("utilitarios.js");         ?>
<?php echo $html->script("jquery.autocomplete-min.js"); ?>
<?php echo $html->stylesheet("utilitarios.css");  ?>
<?php echo $html->stylesheet("autoComplete.css"); ?>


<div id="keywordDIV">
    <fieldset class="borda">
    	<legend><b><i>&nbsp;.:&nbsp;Pesquisa R&aacute;pida de Quest&otilde;es&nbsp;:.&nbsp;</i></b></legend>
        <form action="<?php echo Mapper::url("/admin/pesquisarQuestoes"); ?>" method="post">        
            <strong>Enunciado:</strong>
            <input type="text" name="keyword" id="keyword" size="50" autocomplete="false" >
            <button type="submit" style="border: 1px solid #CCC" id="button">
                PESQUISAR
                <?php echo $html->image("acoes/b_search.png");?>
            </button>               
        </form>	
    </fieldset>	
</div>
<table>
	<thead>    
        <tr style="border: 1px solid #000;">
            <th width="30%">&nbsp;&nbsp;CADEIRA&nbsp;</th>
            <th width="50%">&nbsp;&nbsp;ENUNCIADO</th>
			<th width="10%">&nbsp;&nbsp;PONTUA&Ccedil;&Atilde;O</th>
            <th width="10%">&nbsp;A&Ccedil;&Otilde;ES</th>            		     
        </tr>
    </thead>
    <thead>
		<?php //pr($dados); ?>
		<?php if(!empty($dados)) foreach($dados as $row) { ?>   
        <tr name="<?php echo $row["id"]; ?>" id="<?php echo $row["id"]; ?>" onclick="mudarFundo(this.id, this.className);"  >
            <td><?php echo $row['nomeCadeira'];    ?></td>
            <td><?php echo $row['enunciado'];      ?></td>
			<td><?php echo number_format($row['pontuacao'], 2, '.', '');      ?></td>
            <td width="19%">            	
                <a href="<?php echo Mapper::url("/quiz/editarQuestao/"    . $row['id']); ?>"   title=" Editar Quest&atilde;o  "  rel="shadowbox" >&nbsp;<?php echo $html->image("acoes/b_edit.png", array("border" => "0")); ?>&nbsp;</a>
            	<a href="<?php echo Mapper::url("/quiz/deletarQuestao/"  . $row['id']); ?>" title=" Excluir Aluno " rel="shadowbox;height=100;width=220">&nbsp;<?php echo $html->image("acoes/b_drop.png", array("border" => "0")); ?>&nbsp;</a>
            </td>                        
        </tr>       
        <?php } ?>
    </thead>   
</table>

<script type="text/javascript">
//<![CDATA[
    var autocompletar;

    jQuery(function() {
    	var options = {
    		serviceUrl: '/sistema/admin/autosuggestionNew',
    		width: 900,
    		delimiter: /(,|;)\s*/,
    		deferRequestBy: 0, //miliseconds
    		params: { country: 'Yes' },
    		noCache: false //set to true, to disable caching
    	};
    
    	autocompletar = $('#keyword').autocomplete(options);
    });
//]]>

</script>
