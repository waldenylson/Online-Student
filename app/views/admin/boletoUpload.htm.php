<style type="text/css">
.borda1 {
    background-color: #FFFFFF;
    border: 1px solid #3166A5;
    padding: 1px;
    margin-left: 10px;
    margin-right:10px;
    margin-top: 10px;
    margin-bottom: 10px;
    padding-bottom: 5px;
    padding-left: 10px;
    padding-top: 10px;   
}
</style>
<form name="boletoUpload" id="boletoUpload" action="<?php echo Mapper::url("/admin/boletoUpload/") . '/' . $matricula; ?>" enctype="multipart/form-data" method="post">
	<fieldset class="borda1">
    	<legend><b><i>&nbsp;.:&nbsp;Upload de Boletos dos Alunos&nbsp;:.&nbsp;</i></b></legend>
    	<table width="558" border="0" cellpadding="3" cellspacing="0" class="borda2">
            <tr bgcolor="#e6e9ee" height="25">
                <td width="20%"><b>Arquivo PDF:</b></td>
                <td>
                    <input type="file" size="25" name="boleto" id="boleto" />
                    <input type="submit" value="Enviar Arquivo" />
                </td>
            </tr>
        </table>
    </fieldset>
</form>