<?php //pr($dados); ?>
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
		margin-top: 15px;	
	}
</style>
<fieldset class="borda">
    <legend><b><i>&nbsp;.:&nbsp;&nbsp;Alunos Responderam Simulado&nbsp;&nbsp;:.&nbsp;</i></b></legend>
    <table>
		<thead>
	        <tr style="border: 1px solid #000;">
	            <th style="width: 10%;">&nbsp;&nbsp;&nbsp;&nbsp;MATR&Iacute;CULA&nbsp;</th>
	            <th style="width: 20%;">&nbsp;&nbsp;&nbsp;&nbsp;NOME</th>
	            <th style="width: 10%;">&nbsp;&nbsp;&nbsp;CURSO</th>
	            <th style="width: 10%;">&nbsp;&nbsp;&nbsp;PONTUA&Ccedil;&Atilde;O</th>
	        </tr>
	    </thead>
	    <thead>
	    	<?php if(!empty($dados)) foreach($dados as $row) { ?>
	        <tr>
	            <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row["matricula"]; ?> </td>
	            <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row["aluno"];     ?> </td>
	            <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row["curso"];     ?> </td>
	            <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row["pontuacao"]; ?> </td>
	        </tr>
	        <?php } ?>
	    </thead>   
	</table>
</fieldset>