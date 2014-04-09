<style type="text/css">	
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
		text-decoration: underline; 
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
	
	.divCabecalho {		
		clear: both;
		background-image:url("<?php echo Mapper::url("/images/tbg_th1.png"); ?>");		
		text-align: justify;
		border-bottom-color:#000;
		border-bottom-style:solid;
		border-bottom-width:1px;
		float:left;		
		height:auto;
		margin-bottom:3px;
		margin-left: 10px;
		margin-right: 50px;	
		width: 98%;
	}
	
	.divListagem {		
		clear: both;		
		text-align: justify;
		border-bottom-color: #7A7A7A;
		border-bottom-style:solid;
		border-bottom-width:1px;
		float:left;		
		height:auto;
		margin-bottom:3px;
		margin-left: 10px;		
		width: 98%;
	}
	
	.divNome {
		color:#000000;
		float:left;
		font-family:Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px;
		font-weight:lighter;
		height:15px;
		padding-top:4px;
		text-align:left;
		width: 30%;
	}
	
	.divEndereco {
		color:#000000;
		float:left;
		font-family:Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px;
		font-weight:lighter;
		height:auto;
		padding-left:4px;
		padding-top:4px;
		text-align:left;
		width: 30%;
	}
	
	.divCidade {
		color:#000000;
		float:left;
		font-family:Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px;
		font-weight:lighter;
		height:auto;
		padding-left:4px;
		padding-top:4px;
		text-align:left;
		width:18%;
	}
	
	.divTelefone {
		color:#000000;
		float:left;
		font-family:Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px;
		font-weight:lighter;
		height:auto;
		padding-left:4px;
		padding-top:4px;
		text-align:left;
		width:15%;
	}
	
	.print {
		text-align: right;
		margin-right: 20px;
		margin-bottom: 2px;
	}
</style>
<div class="print"><a href="javascript:void(0);" onclick="window.print();"><strong>IMPRIMIR</strong></a></div>
<div id="corpo">
	<div class="divCabecalho">
		<div class="divNome"><b><strong>&nbsp;NOME</strong></b></div>
		<div class="divEndereco">     <b><strong>&nbsp;ENDEREÇO     </strong></b></div>
		<div class="divCidade">    <b><strong>&nbsp;CIDADE    </strong></b></div>
		<div class="divTelefone">   <b><strong>&nbsp;TELEFONE   </strong></b></div>
	</div>
	<?php if(!empty($dados)) foreach($dados as $row) { ?>   
		<div class="divListagem">
			<div class="divNome"><?php echo '&nbsp;&nbsp;&nbsp;' . $row['nome']; ?></div>
			<div class="divEndereco">     <?php echo '&nbsp;&nbsp;&nbsp;' . $row['endereco'];      ?></div>
			<div class="divCidade">    <?php echo '&nbsp;&nbsp;&nbsp;' . $row['cidade'];     ?></div>
			<div class="divTelefone">   <?php echo '&nbsp;&nbsp;&nbsp;' . $row['tel_residencial'];    ?></div>
		</div>		   
	<?php } ?>
</div>