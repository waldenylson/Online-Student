﻿<form name="novaCadeira" id="novaCadeira" action="<?php echo Mapper::url("/cadeiras/novo"); ?>" method="post" onsubmit="">
	<fieldset class="borda1">
        <legend><b><i>&nbsp;.:&nbsp;Cadastro Cadeiras&nbsp;:.&nbsp;</i></b></legend>
        <table width="558" border="0" cellpadding="3" cellspacing="0" class="borda2" >
            <tr bgcolor="#e6e9ee" height="25">
                <td><b>Nome:</b><br /><input type="text" size="54" name="nome" id="nome" /></td>
            </tr>
            <tr bgcolor="#f7f7f7">
                <td><b>Descrição:</b><br />
                	<textarea name="descricao" id="descricao" cols="46" rows="5"></textarea>
                </td>                
            </tr>                      
        </table>
        <div style="padding-bottom: 2px; padding-left: 2px;">
        	<input type="submit" value=" Cadastrar " title="Enviar Dados!" />&nbsp;
            <input type="reset"  value="  Limpar  "  title="Limpar Dados!" />
         </div>
    </fieldset>
</form>