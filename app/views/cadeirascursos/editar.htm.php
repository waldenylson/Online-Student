<form name="novaRelacao" id="novaRelacao" action="<?php echo Mapper::url("/cadeirascursos/editar/{$relacao['id']}"); ?>" method="post" onsubmit="">
	<fieldset class="borda1">
    	<legend><b><i>&nbsp;.:&nbsp;Rela&ccedil;&atilde;o CURSOS x CADEIRAS&nbsp;:.&nbsp;</i></b></legend>
        <table width="558" border="0" cellpadding="3" cellspacing="0" class="borda2">
            <tr bgcolor="#f7f7f7" height="25">
                <td width="10%"><b>Curso:</b></td>
                <td>
                	<select id="curso_id" name="curso_id" style="width: auto;">
                		<option value="<?php echo $relacao['curso_id']; ?>" selected="selected"><?php foreach($nomeCurso as $row){ echo $row['nome']; } ?></option>
						<?php foreach($cursos as $row) { ?>
                    	<option value="<?php echo $row['id']; ?>"><?php echo $row['nome']; ?></option>
                    	<?php } ?>
                	</select>
                </td>
            </tr>
            <tr bgcolor="#e6e9ee" height="25">
                <td width="20%"><b>Cadeira:</b></td>
                <td>
                	<select id="cadeira_id" name="cadeira_id" style="width: auto;">
                		<option value="<?php echo $relacao['cadeira_id']; ?>" selected="selected"><?php foreach($nomeCadeira as $row){ echo $row['nome']; } ?></option>
						<?php foreach($cadeiras as $row) { ?>
                    	<option value="<?php echo $row['id']; ?>"><?php echo $row['nome']; ?></option>
                    	<?php } ?>
                	</select>
                </td>
            </tr>            
        </table>
        <div style="padding-bottom: 2px; padding-left: 2px;">
        	<input type="submit" value=" Salvar Dados " title="Enviar Dados!" />&nbsp;
            <input type="reset"  value="   Limpar  "    title="Limpar Dados!" />
         </div>
	</fieldset>
</form>
