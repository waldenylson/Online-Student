<form name="novoUsuario" id="novoUsuario" action="<?php echo Mapper::url("/usuarios/editar/{$usuario['id']}"); ?>" method="post" onsubmit="">
	<fieldset class="borda1">
		<legend><b><i>&nbsp;.:&nbsp;Cadastro de Usuários&nbsp;:.&nbsp;</i></b></legend>
		<table width="558" border="0" cellpadding="3" cellspacing="0" class="borda2">
			<tr bgcolor="#f7f7f7" height="25">
				<td width="10%"><b>Nome:</b></td>
				<td><input type="text" size="50" name="nome" id="nome" value="<?php echo $usuario['nome']; ?>" /></td>
			</tr>
			<tr bgcolor="#e6e9ee" height="25">
				<td width="10%"><b>Data&nbsp;Nascimento:</b></td>
				<td><input type="text" id="data_nascimento" name="data_nascimento" value="<?php echo date("d/m/Y", $usuario['data_nascimento']); ?>" /></td>
			</tr>
			<tr bgcolor="#f7f7f7" height="25">
				<td width="10%"><b>Sexo:</b></td>
				<td>
					<input class="radio" type="radio" name="sexo" id="sexo" value="1" <?php if($usuario['sexo'] == 1){ echo 'checked="checked"'; } ?> /><b>Masculino</b>
					<input class="radio" type="radio" name="sexo" id="sexo" value="0" <?php if($usuario['sexo'] == 0){ echo 'checked="checked"'; } ?> /><b>Feminino </b>
				</td>
			</tr>
			<tr bgcolor="#e6e9ee" height="25">
				<td width="10%"><b>Naturalidade:</b></td>
				<td><input type="text" id="naturalidade" name="naturalidade" size="30" value="<?php echo $usuario['naturalidade']; ?>" /></td>
			</tr>
			<tr bgcolor="#f7f7f7" height="25">
				<td width="10%"><b>Nacionalidade:</b></td>
				<td><input type="text" id="nacionalidade" name="nacionalidade" size="30" value="<?php echo $usuario['nacionalidade']; ?>" /></td>
			</tr>
			<tr bgcolor="#e6e9ee" height="25">
				<td width="10%"><b>Endere&ccedil;o:</b></td>
				<td><input type="text" id="endereco" name="endereco" size="50" value="<?php echo $usuario['endereco']; ?>" /></td>
			</tr>
			<tr bgcolor="#f7f7f7" height="25">
				<td width="10%"><b>Bairro:</b></td>
				<td><input type="text" id="bairro" name="bairro" size="30" value="<?php echo $usuario['bairro']; ?>" /></td>
			</tr>
			<tr bgcolor="#e6e9ee" height="25">
				<td width="10%"><b>Cidade:</b></td>
				<td><input type="text" id="cidade" name="cidade" size="30" value="<?php echo $usuario['cidade']; ?>" /></td>
			</tr>
			<tr bgcolor="#f7f7f7" height="25">
				<td width="10%"><b>Estado:</b></td>
				<td>
                	<select id="uf" name="uf" style="width: 7em;">
                        <option value="<?php echo $usuario['uf']; ?>" selected="selected"><?php echo $usuario['uf']; ?></option>
                        <?php foreach($estados as $row){ ?>
                        <option value="<?php echo $row['uf']; ?>"><?php echo $row['uf']; ?></option>
                        <?php } ?>                    
					</select>
                </td>
			</tr>
			<tr bgcolor="#e6e9ee" height="25">
				<td width="10%"><b>CEP:</b></td>
				<td><input type="text" id="cep" name="cep" size="25" value="<?php echo $usuario['cep']; ?>" /></td>
			</tr>
			<tr bgcolor="#f7f7f7" height="25">
				<td width="10%"><b>Tel Residencial:</b></td>
				<td><input type="text" id="tel_residencial" name="tel_residencial" value="<?php echo $usuario['tel_residencial']; ?>" /></td>
			</tr>
			<tr bgcolor="#e6e9ee" height="25">
				<td width="20%"><b>Tel Celular:</b></td>
				<td><input type="text" id="tel_celular" name="tel_celular" value="<?php echo $usuario['tel_celular']; ?>" /></td>
			</tr>
			<tr bgcolor="#f7f7f7" height="25">
				<td width="10%"><b>Tel Comercial:</b></td>
				<td><input type="text" id="tel_comercial" name="tel_comercial" value="<?php echo $usuario['tel_comercial']; ?>" /></td>
			</tr>
			<tr bgcolor="#e6e9ee" height="25">
				<td width="10%"><b>E-Mail:</b></td>
				<td><input type="text" id="email" name="email" size="45" value="<?php echo $usuario['email']; ?>" /></td>
			</tr>
			<tr bgcolor="#f7f7f7" height="25">
				<td width="10%"><b>Identidade:</b></td>
				<td><input type="text" id="identidade" name="identidade" size="30" value="<?php echo $usuario['identidade']; ?>" /></td>
			</tr>
			<tr bgcolor="#e6e9ee" height="25">
				<td width="10%"><b>Emissor:</b></td>
				<td><input type="text" id="emissor" name="emissor" value="<?php echo $usuario['emissor']; ?>" /></td>
			</tr>
			<tr bgcolor="#f7f7f7" height="25">
				<td width="10%"><b>CPF:</b></td>
				<td><input type="text" id="cpf" name="cpf" size="20" value="<?php echo $usuario['cpf']; ?>" /></td>
			</tr>
			<tr bgcolor="#e6e9ee" height="25">
            	<td width="10%"><b>Nível:</b></td>
            	<td>
            		<input class="radio" type="radio" name="nivel" id="nivel" value="2" <?php if($usuario['nivel'] == 2){ echo 'checked="checked"'; } ?> /><b>Usuário</b>
                	<input class="radio" type="radio" name="nivel" id="nivel" value="3" <?php if($usuario['nivel'] == 3){ echo 'checked="checked"'; } ?>/><b>Administrador</b>              	
                </td>
            </tr>            
		</table>
		<div style="padding-bottom: 2px; padding-left: 2px;">
        	<input type="submit" value=" Salvar Dados " title="Enviar Dados!" />&nbsp;
            <input type="reset"  value="   Limpar   "   title="Limpar Dados!" />
        </div>
		
	</fieldset>
</form>
