<form name="novoAluno" id="novoAluno" action="<?php echo Mapper::url("/alunos/novo"); ?>" enctype="multipart/form-data" method="post">
	<fieldset class="borda1">
    	<legend><b><i>&nbsp;.:&nbsp;Cadastro de Alunos&nbsp;:.&nbsp;</i></b></legend>
    	<table width="558" border="0" cellpadding="3" cellspacing="0" class="borda2">
            <tr bgcolor="#e6e9ee" height="25">
                <td width="10%"><b>Matr&iacute;cula:</b></td>
                <td><input type="text" size="25" value="Gerado Automaticamente" disabled="disabled" /></td>
            </tr>
            <tr bgcolor="#f7f7f7" height="25">
                <td width="10%"><b>Nome:</b></td>
                <td><input type="text" size="50" name="nome" id="nome" /></td>
            </tr>

            <tr  bgcolor="#e6e9ee" height="25">
                <td width="10%"><b>Foto:</b></td>
                <td><input type="file" name="foto" id="foto" /></td>
            </tr>

            <tr bgcolor="#f7f7f7" height="25">
                <td width="10%"><b>Curso:</b></td>
                <td>
                    <select id="curso_id" name="curso_id" style="width: auto;">
                        <?php foreach($cursos as $row){ ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nome']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#e6e9ee" height="25">
                <td width="20%"><b>Data&nbsp;Nascimento:</b></td>
                <td><input type="text" id="data_nascimento" name="data_nascimento" /></td>
            </tr>
            <tr bgcolor="#f7f7f7" height="25">
                <td width="10%"><b>Sexo:</b></td>
                <td>
                	<input class="radio" type="radio" name="sexo" id="sexo" value="1" checked="checked" /><b>Masculino</b>
                    <input class="radio" type="radio" name="sexo" id="sexo" value="0" /><b>Feminino</b>
                </td>
            </tr>
            <tr bgcolor="#e6e9ee" height="25">
                <td width="20%"><b>Naturalidade:</b></td>
                <td><input type="text" id="naturalidade" name="naturalidade" size="30" /></td>
            </tr>
            <tr bgcolor="#f7f7f7" height="25">
                <td width="20%"><b>Nacionalidade:</b></td>
                <td><input type="text" id="nacionalidade" name="nacionalidade" size="30" /></td>
            </tr>
            <tr bgcolor="#e6e9ee" height="25">
                <td width="20%"><b>Endere&ccedil;o:</b></td>
                <td><input type="text" id="endereco" name="endereco" size="50" /></td>
            </tr>
            <tr bgcolor="#f7f7f7" height="25">
                <td width="20%"><b>Bairro:</b></td>
                <td><input type="text" id="bairro" name="bairro" size="30" /></td>
            </tr>
            <tr bgcolor="#e6e9ee" height="25">
                <td width="20%"><b>Cidade:</b></td>
                <td><input type="text" id="cidade" name="cidade" size="30" /></td>
            </tr>
            <tr bgcolor="#f7f7f7" height="25">
                <td width="20%"><b>Estado:</b></td>
                <td>
                    <select id="uf" name="uf" style="width: 7em;">
                        <option value="AC">AC</option>
                        <option value="AL">AL</option>
                        <option value="AM">AM</option>
                        <option value="AP">AP</option>
                        <option value="BA">BA</option>
                        <option value="CE">CE</option>
                        <option value="DF">DF</option>
                        <option value="ES">ES</option>
                        <option value="GO">GO</option>
                        <option value="MA">MA</option>
                        <option value="MG">MG</option>
                        <option value="MS">MS</option>
                        <option value="MT">MT</option>
                        <option value="PA">PA</option>
                        <option value="PB">PB</option>
                        <option value="PE">PE</option>
                        <option value="PI">PI</option>
                        <option value="PR">PR</option>
                        <option value="RJ">RJ</option>
                        <option value="RN">RN</option>
                        <option value="RO">RO</option>
                        <option value="RR">RR</option>
                        <option value="RS">RS</option>
                        <option value="SC">SC</option>
                        <option value="SE">SE</option>
                        <option value="SP">SP</option>
                        <option value="TO">TO</option>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#e6e9ee" height="25">
                <td width="20%"><b>CEP:</b></td>
                <td><input type="text" id="cep" name="cep" size="25" /></td>
            </tr>
            <tr bgcolor="#f7f7f7" height="25">
                <td width="20%"><b>Tel Residencial:</b></td>
                <td><input type="text" id="tel_residencial" name="tel_residencial" /></td>
            </tr>
            <tr bgcolor="#e6e9ee" height="25">
                <td width="20%"><b>Tel Celular:</b></td>
                <td><input type="text" id="tel_celular" name="tel_celular" /></td>
            </tr>
            <tr bgcolor="#f7f7f7" height="25">
                <td width="20%"><b>Tel Comercial:</b></td>
                <td><input type="text" id="tel_comercial" name="tel_comercial" /></td>
            </tr>
            <tr bgcolor="#e6e9ee" height="25">
                <td width="20%"><b>E-Mail:</b></td>
                <td><input type="text" id="email" name="email" size="45" /></td>
            </tr>
            <tr bgcolor="#f7f7f7" height="25">
                <td width="20%"><b>Identidade:</b></td>
                <td><input type="text" id="identidade" name="identidade" size="30" /></td>
            </tr>
            <tr bgcolor="#e6e9ee" height="25">
                <td width="20%"><b>Emissor:</b></td>
                <td><input type="text" id="emissor" name="emissor" /></td>
            </tr>
            <tr bgcolor="#f7f7f7" height="25">
                <td width="20%"><b>CPF:</b></td>
                <td><input type="text" id="cpf" name="cpf" size="20" /></td>
            </tr>            
        </table>
         <div style="padding-bottom: 2px; padding-left: 2px;">
        	<input type="submit" value=" Cadastrar " title="Enviar Dados!" />&nbsp;
            <input type="reset"  value="  Limpar  "  title="Limpar Dados!" />
         </div>
    </fieldset>
</form>
