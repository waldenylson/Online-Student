<form name="updatePassword" id="updatePassword" action="<?php echo Mapper::url("/updatealunos/atualizarSenhaAluno"); ?>" method="post" >
	<fieldset class="borda1">
        <legend><b><i>&nbsp;.:&nbsp;Alterar Senha de Acesso ao sistema&nbsp;:.&nbsp;</i></b></legend>
        <table width="600" border="0" cellpadding="3" cellspacing="0" class="borda2">            
            <tr bgcolor="#e6e9ee" height="25">
                <td width="20%"><b>Senha:</b></td>
                <td><input type="password" size="20" name="senha" id="senha" /></td>              
            </tr>
            <tr bgcolor="#f7f7f7" height="25">
            	<td width="21%"><b>Confirme a Senha:</b></td>
                <td><input type="password" size="20" name="confirmaSenha" id="confirmaSenha" /></td>
            </tr>
        </table>   
        <div style="padding-bottom: 2px; padding-left: 2px;">
        	<input type="submit" value=" Alterar Dados " title="Enviar Dados!" />&nbsp;
            <input type="reset"  value="  Limpar  "  title="Limpar Dados!" />
        </div>        
	</fieldset>	
</form>