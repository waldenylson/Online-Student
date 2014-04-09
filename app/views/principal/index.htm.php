<?php $matricula = Session::read("matricula"); ?>
<table cellpadding="0" cellspacing="0" width="100%" align="center" bgcolor="#eeeeee" border="0">
    <tbody>
        <tr><td><table cellpadding="0" cellspacing="0" width="100%" bgcolor="#eeeeee" border="0"></table></td></tr>
        <tr>
            <td align="center">
                <table cellpadding="0" cellspacing="0" width="100%" border="0">
                    <tbody>
                        <tr>
                            <td width="400px"><?php echo $html->image("logo.jpg", array("border" => "0")); ?></td>
                            <td>                            	
                                <table cellpadding="0" cellspacing="0" bgcolor="#eeeeee" border="0">
                                    <tbody>                                    	
                                        <tr>
                                            <td align="center" bgcolor="#eeeeee">                                            	
                                                <ul id="MenuBar1" class="MenuBarHorizontal MenuBarActive">
                                                    <li><a href="<?php echo Mapper::url("/principal/index"); ?>"><?php echo $html->image("arquivos/home.png",                 array("width" => "24", "border" => "0", "height" => "24 ")); ?><br>&nbsp;HOME&nbsp;</a></li>
                                                    <li><a tabindex="-1" href="javascript:void(0);" class="MenuBarItemSubmenu"><?php echo $html->image("arquivos/alunos.png", array("width" => "24", "border" => "0", "height" => "24 ")); ?><br>&nbsp;ALUNO&nbsp;</a>
                                                        <ul class="">
															<li><a onclick="javascript:abreLink('mostrarNotas');" class="" tabindex="-1" href="javascript:void(0);">Consultar Notas</a></li>
                                                        </ul>
                                                    </li>                                                    
                                                    <li><a tabindex="-1" href="javascript:void(0);" class="MenuBarItemSubmenu"><?php echo $html->image("arquivos/quiz4.png",   array("width" => "24", "border" => "0", "height" => "24 ")); ?><br>&nbsp;SIMULADOS&nbsp;</a>
                                                        <ul>
                                                            <li><a class="" tabindex="-1" href="<?php echo Mapper::url("/simulados/openTestWindow"); ?>" target="conteudoVariavel">Responder Silmulado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                                                            <li><a class="" tabindex="-1" href="<?php echo Mapper::url("/simulados/simuladosRespondidos"); ?>" target="conteudoVariavel">Simulados Respondidos&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                                                            <li><a class="" tabindex="-1" href="<?php echo Mapper::url("/simulados/makeRanking"); ?>" rel="shadowbox;width=500;">Ranking Top 10&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a tabindex="-1" href="<?php echo Mapper::url("/principal/boletoDownload/$matricula"); ?>" class="MenuBarHorizontal MenuBarActive" target="_blank"><?php echo $html->image("arquivos/boleto.png",   array("width" => "24", "border" => "0", "height" => "24 ")); ?><br>&nbsp;BOLETO&nbsp;</a>
                                                    </li>
                                                    <li><a tabindex="-1" href="javascript:void(0);" class="MenuBarItemSubmenu"><?php echo $html->image("arquivos/key.png", array("width" => "25", "border" => "0", "height" => "25")); ?><br>&nbsp;ACESSO&nbsp;</a>
                                                        <ul class="">
                                                            <li><a onclick="javascript:abreLink('atualizarSenhaAluno');" class="" tabindex="-1" href="javascript:void(0);">Alterar Senha&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>                                                         
                                                        </ul>
                                                    </li>                                                                                                        
                                                </ul>
                                            </td>
                                        </tr>
                                        <!--<tr></tr>-->
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>                
            </td>
        </tr>
        <tr>            
            <td class="logoff" align="right"> | <a href="<?php echo Mapper::url("/seguranca/logout"); ?>">SAIR</a></td>
        </tr>
        <!--<tr><td align="center"></td></tr>-->
    </tbody>
</table>
<a href="<?php echo Mapper::url("/principal/mostrarNotas"); ?>" rel="shadowbox" id="mostrarNotas" name="mostrarNotas"></a>
<a href="<?php echo Mapper::url("/updatealunos"); ?>" rel="shadowbox" id="atualizarSenhaAluno" name="atualizarSenhaAluno"></a>

<iframe id="conteudoVariavel" name="conteudoVariavel" style="border: 0px; width: 100%; height: 500px;"></iframe>

<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
function abreLink(id){
	$("#"+id).click();
}
</script>
