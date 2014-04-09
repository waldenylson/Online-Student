<form action="<?php echo Mapper::url("/quiz/liberarSimulado/{$idProva}"); ?>" method="post">
	<fieldset class="borda1">
    	<legend><b><i>&nbsp;.:&nbsp;Libera&ccedil;&atilde;o de SIMULADOS&nbsp;:.&nbsp;</i></b></legend>
        <table width="558" border="0" cellpadding="3" cellspacing="0" class="borda2">
            <tr bgcolor="#e6e9ee" height="25">
                <td width="25%"><b>C&oacute;digo da Prova:</b></td>
                <td><input type="text" id="prova_id" name="prova_id" value="<?php echo $idProva; ?>" readonly></td>
            </tr>
            <tr bgcolor="#f7f7f7" height="25">
                <td width="10%"><b>Curso:</b></td>
                <td>
                	<select id="curso_id" name="curso_id" style="width: auto;">                		
						<?php foreach($cursos as $row) { ?>
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
