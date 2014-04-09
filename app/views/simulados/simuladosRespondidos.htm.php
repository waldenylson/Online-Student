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
	strong{
		font-family:"Courier New", Courier, monospace;
		font-size:16px;
	}
	.borda {
		background-color: #FFFFFF;
		border: 1px solid #3166A5;
		padding: 10px;
		margin-left: 10px;
		margin-right: 10px;	
	}
</style>
<fieldset class="borda">
    <legend><b><i>&nbsp;.:&nbsp;Meus Simulados Respondidos&nbsp;:.&nbsp;</i></b></legend>
    <table>
		<thead>    
	        <tr style="border: 1px solid #000;">
	            <th style="width: 10%;">&nbsp;&nbsp;&nbsp;&nbsp;C&Oacute;DIGO&nbsp;</th>
	            <th style="width: 15%;">&nbsp;&nbsp;&nbsp;&nbsp;PROVA</th>
	            <th style="width: 20%;">&nbsp;&nbsp;&nbsp;DATA DA PROVA</th>
	            <th style="width: 15%;">&nbsp;&nbsp;&nbsp;A&Ccedil;&Otilde;ES</th>
	        </tr>
	    </thead>
	    <thead>
	    	<?php if(!empty($dados)) foreach($dados as $row) { ?>   
	        <tr name="<?php echo $row["matricula"]; ?>" id="<?php echo $row["matricula"]; ?>" onclick="mudarFundo(this.id, this.className);"  >
	            <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo str_pad($row['id'], 4, "0", STR_PAD_LEFT); ?></td>
	            <td>&nbsp;&nbsp;&nbsp;&nbsp;#<?php echo str_pad($row['prova_id'], 4, "0", STR_PAD_LEFT);      ?></td>
	            <td>&nbsp;&nbsp;<?php echo date("d/m/Y H:i:s", strtotime($row['created'])); ?></td>            
	            <td>
	                &nbsp;&nbsp;&nbsp;<a href="<?php echo Mapper::url("/simulados/simuladoEntregue/" . $row['prova_id']); ?>" title="Gabarito Simulado">&nbsp;<?php echo $html->image("quiz/button-view.gif", array("border" => "0")); ?>&nbsp;</a>
	            </td>                        
	        </tr>       
	        <?php } ?>
	    </thead>   
	</table>
</fieldset>