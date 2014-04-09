<?php if(!empty($dados)){ pr($dados); }?>
<form name="execSQL" id="execSQL" action="<?php echo Mapper::url("/admin/execSQL"); ?>" method="post" onsubmit="">
	<fieldset class="borda1">
    	<legend><b><i>&nbsp;.:&nbsp;Executar Consulta SQL Direto no Banco de Dados&nbsp;:.&nbsp;</i></b></legend>
    	<table width="558" border="0" cellpadding="3" cellspacing="0" class="borda2">
            <tr bgcolor="#f7f7f7">
                <td><b>Sentença SQL</b><br />
                	<textarea name="sql" id="sql" cols="46" rows="5"></textarea>
                </td>                
            </tr>               
        </table>
         <div style="padding-bottom: 2px; padding-left: 2px;">
        	<input type="submit" value=" Executar " title="Enviar Dados!" />&nbsp;
            <input type="reset"  value="  Limpar  "  title="Limpar Dados!" />
         </div>
    </fieldset>
</form>
