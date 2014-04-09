<form name="novaQuestao" id="novaQuestao" action="<?php echo Mapper::url("/quiz/novaQuestao"); ?>" method="post" onsubmit="">
	<fieldset class="borda1">
    	<legend><b><i>&nbsp;.:&nbsp;Cadastro de Quest&otilde;es&nbsp;:.&nbsp;</i></b></legend>
    	<table width="558" border="0" cellpadding="3" cellspacing="0" class="borda2" style="padding-bottom:2px;">
            <tr bgcolor="#f7f7f7" height="25">
                <td width="10%"><b>C&oacute;digo:</b></td>
                <td><input type="text" size="25" value="Gerado Automaticamente" disabled="disabled" /></td>
            </tr>
            <tr bgcolor="#e6e9ee" height="25">
                <td width="10%"><b>Cadeira:</b></td>
                <td>
                    <select id="cadeira_id" name="cadeira_id" style="width: auto;">                        
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
                <textarea cols="60" rows="1" name="enunciado" id="enunciado" placeholder="Entre com o Enunciado da Quetão..."></textarea></td>
            </tr>
        </table>
        <table width="558" border="0" cellpadding="3" cellspacing="0" class="borda2" style="padding-top:0px;">
            <tr bgcolor="#e6e9ee">
                <td width="17%"><b>Alternativa A:</b></td>
                <td><input name="resposta1" id="resposta1" type="text" size="65" /></td>
            </tr>
            <tr bgcolor="#f7f7f7">
                <td width="15%"><b>Alternativa B:</b></td>
                <td><input name="resposta2" id="resposta2" type="text" size="65" /></td>
            </tr>
            <tr bgcolor="#e6e9ee">
                <td width="15%"><b>Alternativa C:</b></td>
                <td><input name="resposta3" id="resposta3" type="text" size="65" /></td>
            </tr>
            <tr bgcolor="#f7f7f7">
                <td width="15%"><b>Alternativa D:</b></td>
                <td><input name="resposta4" id="resposta4" type="text" size="65" /></td>
            </tr>
            <tr bgcolor="#e6e9ee">
                <td width="15%"><b>Pontuação:</b></td>
				<td><input name="pontuacao" id="pontuacao" type="text" size="20" /></td>
            </tr>
			<tr bgcolor="#f7f7f7">
				<td width="15%"><b>Correta:</b></td>
                <td>
                    <input type="radio" name="correta" id="correta" value="a" checked="checked" /><b>A</b>
                    <input type="radio" name="correta" id="correta" value="b" /><b>B</b>
                    <input type="radio" name="correta" id="correta" value="c" /><b>C</b>
                    <input type="radio" name="correta" id="correta" value="d" /><b>D</b>
                </td>
			</tr>
        </table>      
        <div style="padding-bottom: 2px; padding-left: 2px;">
            <input type="submit" value=" Cadastrar " title="Enviar Dados!" />&nbsp;
            <input type="reset"  value="  Limpar  "  title="Limpar Dados!" />
        </div>
    </fieldset>
</form>
