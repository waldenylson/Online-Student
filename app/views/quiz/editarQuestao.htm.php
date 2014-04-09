<form name="editarQuestao" id="editarQuestao" action="<?php echo Mapper::url("/quiz/editarQuestao/{$questao['id']}"); ?>" method="post" onsubmit="">
	<fieldset class="borda1">
    	<legend><b><i>&nbsp;.:&nbsp;Cadastro de Quest&otilde;es&nbsp;:.&nbsp;</i></b></legend>
    	<table width="558" border="0" cellpadding="3" cellspacing="0" class="borda2" style="padding-bottom:2px;">
            <tr bgcolor="#f7f7f7" height="25">
                <td width="10%"><b>C&oacute;digo:</b></td>
                <td><input type="text" size="25" value="<?php echo $questao["id"]; ?>" disabled="disabled" /></td>
            </tr>
            <tr bgcolor="#e6e9ee" height="25">
                <td width="10%"><b>Cadeira:</b></td>
                <td>
                    <select id="cadeira_id" name="cadeira_id" style="width: auto;">                        
                        <option value="<?php echo $questao['cadeira_id']; ?>" selected="selected"><?php foreach($nomeCadeira as $row){ echo $row['nome']; } ?></option>
						<?php foreach($cadeiras as $row){ ?>
                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["nome"]; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>                                               
        </table>
         
        <table width="558" border="0" cellpadding="3" cellspacing="0" class="borda2" style="padding-top:0px;padding-bottom:2px;">
            <tr bgcolor="#f7f7f7">
                <td><b>Enunciado:</b><br />
                <textarea cols="60" rows="1" name="enunciado" id="enunciado" placeholder="Entre com o Enunciado da Quetão..."><?php echo $questao["enunciado"]; ?></textarea></td>
            </tr>
        </table>
        <table width="558" border="0" cellpadding="3" cellspacing="0" class="borda2" style="padding-top:0px;">
            <tr bgcolor="#e6e9ee">
                <td width="17%"><b>Alternativa A:</b></td>
                <td><input name="resposta1" id="resposta1" type="text" size="65" value="<?php echo $questao["resposta1"]; ?>" /></td>
            </tr>
            <tr bgcolor="#f7f7f7">
                <td width="15%"><b>Alternativa B:</b></td>
                <td><input name="resposta2" id="resposta2" type="text" size="65" value="<?php echo $questao["resposta2"]; ?>" /></td>
            </tr>
            <tr bgcolor="#e6e9ee">
                <td width="15%"><b>Alternativa C:</b></td>
                <td><input name="resposta3" id="resposta3" type="text" size="65" value="<?php echo $questao["resposta3"]; ?>" /></td>
            </tr>
            <tr bgcolor="#f7f7f7">
                <td width="15%"><b>Alternativa D:</b></td>
                <td><input name="resposta4" id="resposta4" type="text" size="65" value="<?php echo $questao["resposta4"]; ?>" /></td>
            </tr>
            <tr bgcolor="#e6e9ee">
                <td width="15%"><b>Pontuação:</b></td>
				<td><input name="pontuacao" id="pontuacao" type="text" size="20" value="<?php echo number_format($questao["pontuacao"], 2, '.', ''); ?>" /></td>
            </tr>
			<tr bgcolor="#f7f7f7">
				<td width="15%"><b>Correta:</b></td>
                <td>
					<?php
						switch($questao["correta"]) {
							case "a":
								echo('<input type="radio" name="correta" id="correta" value="a" checked="checked" /><b>A</b>');
								echo('<input type="radio" name="correta" id="correta" value="b" /><b>B</b>');
								echo('<input type="radio" name="correta" id="correta" value="c" /><b>C</b>');
								echo('<input type="radio" name="correta" id="correta" value="d" /><b>D</b>');
								break;
							case "b":
								echo('<input type="radio" name="correta" id="correta" value="a" /><b>A</b>');
								echo('<input type="radio" name="correta" id="correta" value="b" checked="checked" /><b>B</b>');
								echo('<input type="radio" name="correta" id="correta" value="c" /><b>C</b>');
								echo('<input type="radio" name="correta" id="correta" value="d" /><b>D</b>');
								break;
							case "c":
								echo('<input type="radio" name="correta" id="correta" value="a" /><b>A</b>');
								echo('<input type="radio" name="correta" id="correta" value="b" /><b>B</b>');
								echo('<input type="radio" name="correta" id="correta" value="c" checked="checked" /><b>C</b>');
								echo('<input type="radio" name="correta" id="correta" value="d" /><b>D</b>');
								break;
							case "d":
								echo('<input type="radio" name="correta" id="correta" value="a" /><b>A</b>');
								echo('<input type="radio" name="correta" id="correta" value="b" /><b>B</b>');
								echo('<input type="radio" name="correta" id="correta" value="c" /><b>C</b>');
								echo('<input type="radio" name="correta" id="correta" value="d" checked="checked" /><b>D</b>');
								break;
						}
					?>
                    
                    
                </td>
			</tr>
        </table>      
        <div style="padding-bottom: 2px; padding-left: 2px;">
            <input type="submit" value="Salvar Dados " title="Enviar Dados!" />&nbsp;
            <input type="reset"  value="  Limpar  "  title="Limpar Dados!" />
        </div>
    </fieldset>
</form>
