<form name="notas" id="notas" action="<?php echo Mapper::url("/notas/editar/{$nota['id']}"); ?>" method="post" onsubmit="">
	<fieldset class="borda1">
    	<legend><b><i>&nbsp;.:&nbsp;Atualiza&ccedil;&atilde;o de NOTA&nbsp;:.&nbsp;</i></b></legend>
        <table width="558" border="0" cellpadding="3" cellspacing="0" class="borda2">
            <tr bgcolor="#f7f7f7" height="25">
                <td width="10%"><b>Aluno:</b></td>
                <td>
					<input type="hidden" name="aluno_id" id="aluno_id" value="<?php echo $nota['aluno_id']; ?>" />
					<?php foreach($aluno as $row) { ?>                     	 
                        <input type="text" value="<?php echo $row['nome']; ?>" size="55" disabled="disabled" />
                    <?php } ?>
                </td>
            </tr>
            <tr bgcolor="#e6e9ee" height="25">
                <td width="10%"><b>Cadeira:</b></td>
                <td>
                	<input type="hidden" name="cadeira_id" id="cadeira_id" value="<?php echo $nota['cadeira_id']; ?>" />
					<?php foreach($cadeira as $row) { ?>						
						<input type="text" value="<?php echo $row['nome']; ?>" size="55" disabled="disabled" />
					<?php } ?>                	
                </td>
            </tr>
            <tr bgcolor="#f7f7f7" height="25">
                <td width="10%"><b>Comentário:</b></td>
                <td>        
					<textarea name="comentario" id="comentario" cols="35"><?php echo $nota['comentario']; ?></textarea>
				</td>
            </tr>
            <tr bgcolor="#e6e9ee" height="25">
                <td width="10%"><b>Nota:</b></td>				
				<td><input type="text" id="nota" name="nota" size="15" value="<?php echo number_format($nota['nota'], 2, '.', ''); ?>" /></td>
            </tr>            
        </table>
        <div style="padding-bottom: 2px; padding-left: 2px;">
        	<input type="submit" value=" Salvar Dados " title="Enviar Dados!" />&nbsp;
            <input type="reset"  value="   Limpar  "    title="Limpar Dados!" />
         </div>
	</fieldset>
</form>
