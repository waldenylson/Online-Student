<?php

$numero1 = rand(0,9);
$numero2 = rand(0,9);

$resultado=0;

?>


<div id="seg_chamada">
<?= $html->image("banersegundachamada.png"); ?>
<form action="validar_segundachamada.php" method="POST">
  <table style="margin-left:10px; margin-top:15px; ">
    <tr>
      <td><?= $html->image("icon-prova.png"); ?></td><td style="font-size:14px; background-color:#D4EAFF; font-weight:bold; margin-bottom:15px; font-family:Verdana, Arial, Helvetica, sans-serif; color:#006699; width:675px; "> Formulário </td>
    </tr>
  </table>
  <table style="margin-left:100px; margin-top:15px; " border="0">
    <tr>
      <td style="width:130px; font-size:12px; font-family:Verdana, Arial, Helvetica, sans-serif; color:#333333; margin-left:20px;">Nome Completo:</td>
      <td>
        <input type="text" maxlength="255" name="nome" style="width:300px;" />
      </td>
    </tr>
    <tr>
      <td style="width:130px; font-size:12px; font-family:Verdana, Arial, Helvetica, sans-serif; color:#333333; margin-left:20px;">E-mail:</td>
      <td>
        <input type="text" maxlength="255" name="email" style="width:300px;" />
      </td>
    </tr>
    <tr>
      <td style="width:130px; font-size:12px; font-family:Verdana, Arial, Helvetica, sans-serif; color:#333333; margin-left:20px;">Telefone<span class="red">*</span></td>
<td><span id="sprytextfield3">
  <input name="telefone" type="text" id="telefone" style="width:150px;" maxlength="255" />
</td>
</tr>
<tr>
  <td style="width:130px; font-size:12px; font-family:Verdana, Arial, Helvetica, sans-serif; color:#333333; margin-left:20px;">Endereço: <span class="red">*</span></td>
  <td><span id="sprytextfield5">
    <input type="text" maxlength="255" name="rua" style="width:300px;" />
  </td>
</tr>
<tr>
<td style="width:130px; font-size:12px; font-family:Verdana, Arial, Helvetica, sans-serif; color:#333333; margin-left:20px;">Número: <span class="red">*</span></td>
<td><span id="sprytextfield6">
  <input type="text" maxlength="255" name="numero" style="width:50px;" />
</td>
</tr>
<tr>
<td style="width:130px; font-size:12px; font-family:Verdana, Arial, Helvetica, sans-serif; color:#333333; margin-left:20px;">Bairro: <span class="red">*</span></td>
<td><span id="sprytextfield7">
  <input type="text" maxlength="255" name="bairro" style="width:150px;" />
</td>
</tr>
<tr>
<td style="width:130px; font-size:12px; font-family:Verdana, Arial, Helvetica, sans-serif; color:#333333; margin-left:20px;">Cidade: <span class="red">*</span></td>
<td><span id="sprytextfield8">
  <input type="text" maxlength="255" name="cidade" style="width:150px" />
</td>
</tr>
<tr>
<td style="width:130px; font-size:12px; font-family:Verdana, Arial, Helvetica, sans-serif; color:#333333; margin-left:20px;">CPF:</td>
<td>
  
  
  <input type="text" maxlength="255" name="cpf" style="width:150px;">
  
  </td>
</tr>
<tr>
<td style="width:130px; font-size:12px; font-family:Verdana, Arial, Helvetica, sans-serif; color:#333333; margin-left:20px;">CURSO: <span class="red">*</span></td>
<td>
  <select id="cadeira_id" name="cadeira_id" style="width: auto;">
    <?php foreach($cadeiras as $row) { ?>
    <option value="<?php echo $row['id']; ?>"><?php echo $row['nome']; ?></option>                
    <?php } ?>
  </select>
</td>
</tr>
<tr>
<td style="width:130px; font-size:12px; font-family:Verdana, Arial, Helvetica, sans-serif; color:#333333; margin-left:20px;">Turma: <span class="red">*</span></td>
<td><span id="sprytextfield10">
  <input name="turma" type="text" id="turma" style="width:150px;" maxlength="255" />
</td>
</tr>
<tr>
<td style="width:130px; font-size:12px; font-family:Verdana, Arial, Helvetica, sans-serif; color:#333333; margin-left:20px;">Informações: <span class="red">*</span></td>
<td><textarea name="informacoes" rows="3" id="informacoes" style="width:355px;">Informe a data da prova, professor e materia, informações adicionais que facilite a solicitação da Segunda Chamada!</textarea></td>
</tr>
<tr>
  <td style="width:130px; font-size:12px; font-family:Verdana, Arial, Helvetica, sans-serif; color:#333333; margin-left:20px;">Efetue a Soma:</td>
  <td align="center"><table>
    <tr>
      <td style="border:1px solid #333; padding:2px; font-weight:bold;"><? echo $numero1 ?>
            <input type="hidden" name="numero1" value="<? echo $numero1 ?>"/>
        + <? echo  $numero2 ?>
        <input type="hidden" name="numero2" value="<? echo $numero2; ?>"/></td>
      <td>&nbsp;<span id="sprytextfield11">
        <input type="text" maxlength="2" name="resultado"  style="width:45px;"/>
      </td>
      <br />
      <td></center></td>
    </tr>
  </table>
     
  </td>
</tr>
<tr>
  <td style="width:130px; font-size:12px; font-family:Verdana, Arial, Helvetica, sans-serif; color:#333333; margin-left:20px;">&nbsp;</td>
  <td align="center"><input type="submit" value="Enviar" "></td>
</tr>
</table>
</form>
</div>

</div>

