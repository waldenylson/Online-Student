﻿<style type="text/css">
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
<div id="keywordDIV">
    <fieldset class="borda">
    	<legend><b><i>&nbsp;.:&nbsp;Pesquisa R&aacute;pida de Professores&nbsp;:.&nbsp;</i></b></legend>
        <form action="<?php echo Mapper::url("/admin/pesquisarProfessores"); ?>" method="post">        
            <strong>Nome Professor:</strong>
            <input type="text" name="keyword" id="keyword" size="50" >
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
            <th style="width: 5%;">&nbsp;&nbsp;CPF&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th style="width: 30%;">&nbsp;&nbsp;NOME</th>
            <th style="width: 10%;">&nbsp;DATA NASCIMENTO&nbsp;</th>
            <th style="width: 12%;">&nbsp;CIDADE</th>
            <th style="width: 12%;">&nbsp;AÇÃO</th>		     
        </tr>
    </thead>
    <thead>
		<?php if(!empty($dados)) foreach($dados as $row) { ?>   
        <tr>
            <td><?php echo $row['cpf']; ?></td>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo date("d/m/Y", $row['data_nascimento']); ?></td>
            <td><?php echo $row['cidade']; ?></td>
            <td>            	
                <a href="<?php echo Mapper::url("/professores/editar/"  . $row['id']); ?>" title=" Editar Professor "  rel="shadowbox" >&nbsp;<?php echo $html->image("acoes/b_edit.png", array("border" => "0")); ?>&nbsp;</a>
            	<a href="<?php echo Mapper::url("/professores/deletar/" . $row['id']); ?>" title=" Excluir Professor " rel="shadowbox;height=100;width=220" >&nbsp;<?php echo $html->image("acoes/b_drop.png", array("border" => "0")); ?>&nbsp;</a>
            </td>                        
        </tr>       
        <?php } ?>
    </thead>   
</table>