<style type="text/css">
	.logado{
		font-size: 10px;
		font-family:Verdana, Geneva, sans-serif;
		color: #06F;		
	}
	
	#rodape{
		border: 1px solid #999;
		background-color: #CCC;
		position: fixed;
		text-align: center;
		padding-top: 3px;		
		width: 98%;
		height: 15px;
		bottom: 0;
		left: 1%; 
		right: 1%;	
	}
</style>
<table cellpadding="0" cellspacing="0" width="100%" align="center" bgcolor="#eeeeee" border="0">
    <tbody>
        <tr><td><table cellpadding="0" cellspacing="0" width="100%" bgcolor="#eeeeee" border="0"></table></td></tr>
        <tr>
            <td align="center">
                <table cellpadding="0" cellspacing="0" width="100%" border="0">
                    <tbody>
                        <tr>
                            <td><!--<h1>LOGO/BANNER EMPRESA</h1> --><?php echo $html->image("logo.jpg", array("border" => "0")); ?></td>
                            <td>
                                <table cellpadding="0" cellspacing="0" bgcolor="#eeeeee" border="0">
                                    <tbody>
                                        <tr>
                                            <td align="center" bgcolor="#eeeeee">
                                                <ul id="MenuBar1" class="MenuBarHorizontal MenuBarActive">
                                                    <li><a href="<?php echo Mapper::url("/admin/index"); ?>"><?php echo $html->image("arquivos/home.png",                         array("width" => "24", "border" => "0", "height" => "24 ")); ?><!--<img src="arquivos/home.png" width="24" border="0" height="24">--><br>&nbsp;HOME&nbsp;</a></li>
                                                    <li><a tabindex="-1" href="javascript:void(0);" class="MenuBarItemSubmenu"><?php echo $html->image("arquivos/alunos.png",     array("width" => "24", "border" => "0", "height" => "24 ")); ?><!--<img src="arquivos/config.png" width="24" border="0" height="24">--><br>&nbsp;ALUNOS&nbsp;</a>
                                                        <ul class="">
															<li><a onclick="javascript:abreLink('novoAluno');"     class="" tabindex="-1" href="javascript:void(0);">Novo Registro&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
															<li><a class="" tabindex="-1" href="<?php echo Mapper::url("/admin/pesquisarAlunos"); ?>" target="conteudoVariavel" >Pesquisar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                                                            <li><a class="" tabindex="-1" href="<?php echo Mapper::url("/admin/pesquisarAlunosByMatricula"); ?>" target="conteudoVariavel" >Atualizar Notas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
													        <li><a class="" tabindex="-1" href="javascript:void(0);" onclick="javascript:abreLink('atualizaSenhaAluno');">Atualizar Senha Aluno&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>  
                                                        </ul>
                                                    </li>
                                                    <li><a tabindex="-1" href="javascript:void(0);" class="MenuBarItemSubmenu"><?php echo $html->image("arquivos/professores.png", array("width" => "24", "border" => "0", "height" => "24")); ?><!--<img src="arquivos/conectados.png" width="24" border="0" height="24">--><br>&nbsp;PROFESSORES&nbsp;</a>
                                                        <ul class="">
															<li><a onclick="javascript:abreLink('novoProfessor');" class="" tabindex="-1" href="javascript:void(0);">Novo Registro&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
															<li><a class="" tabindex="-1" href="<?php echo Mapper::url("/admin/pesquisarProfessores"); ?>" target="conteudoVariavel" >Pesquisar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
														</ul>
                                                    </li>
                                                    <li><a tabindex="-1" href="javascript:void(0);" class="MenuBarItemSubmenu"><?php echo $html->image("arquivos/cursos2.png",   array("width" => "24", "border" => "0", "height" => "24 ")); ?><!--<img src="arquivos/operacao.png" width="24" border="0" height="24">--><br>&nbsp;CURSOS&nbsp;</a>
                                                        <ul>
															<li><a onclick="javascript:abreLink('novoCurso');" class="" tabindex="-1" href="javascript:void(0);">Novo Registro&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
															<li><a class="" tabindex="-1" href="<?php echo Mapper::url("/admin/pesquisarCursos"); ?>" target="conteudoVariavel" >Pesquisar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
														</ul>
                                                    </li>
                                                    <li><a tabindex="-1" href="javascript:void(0);" class="MenuBarItemSubmenu"><?php echo $html->image("arquivos/disciplinas2.png",   array("width" => "24", "border" => "0", "height" => "24 ")); ?><!--<img src="arquivos/financas.png" width="24" border="0" height="24">--><br>&nbsp;CADEIRAS&nbsp;</a>
                                                        <ul>
															<li><a onclick="javascript:abreLink('novaCadeira');" class="" tabindex="-1" href="javascript:void(0);">Novo Registro&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
															<li><a class="" tabindex="-1" href="<?php echo Mapper::url("/admin/pesquisarCadeiras"); ?>" target="conteudoVariavel">Pesquisar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
														</ul>
                                                    </li>
                                                    <li><a tabindex="-1" href="javascript:void(0);" class="MenuBarItemSubmenu MenuBarItemSubmenu"><?php echo $html->image("arquivos/relacionamento.png", array("width" => "24", "border" => "0", "height" => "24 ")); ?><!--<img src="arquivos/relatorio.png" width="24" border="0" height="24">--><br>&nbsp;RELAÇÕES&nbsp;</a>
                                                        <ul>
															<li>
                                                            	<a class="MenuBarItemSubmenu" tabindex="-1" href="javascript:void(0);" >Cursos x Cadeiras&nbsp;&nbsp;&nbsp;</a>
                                                            	<ul>
                                                                	<li><a href="javascript:void(0);" onclick="javascript:abreLink('novaRelCursoCadeira');" >Novo Registro</a></li>
                                                                    <li><a href="<?php echo Mapper::url("/admin/pesquisarRelacaoCadeiraCurso"); ?>" target="conteudoVariavel" >Pesquisar</a></li>
                                                                </ul>
                                                            </li>
															<li>
                                                            	<a class="MenuBarItemSubmenu" tabindex="-1" href="javascript:void(0);">Cadeiras x Professores</a>
                                                            	<ul>
                                                                	<li><a href="javascript:void(0);" onclick="javascript:abreLink('novaRelProfCadeira');" >Novo Registro</a></li>
                                                                    <li><a href="<?php echo Mapper::url("/admin/pesquisarRelacaoCadeiraProfessor"); ?>" target="conteudoVariavel" >Pesquisar</a></li>
                                                                </ul>
                                                            </li>                                                 
                                                        </ul>
                                                    </li>
													<li><a tabindex="-1" href="javascript:void(0);" class="MenuBarItemSubmenu"><?php echo $html->image("arquivos/relatorio.png",   array("width" => "24", "border" => "0", "height" => "24 ")); ?><br>&nbsp;RELATÓRIOS&nbsp;</a>
                                                        <ul>
															<li><a class="" tabindex="-1" href="javascript:void(0);" onclick="javascript:abreLink('listarAlunos');">Lista de Alunos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
															<li><a class="" tabindex="-1" href="javascript:void(0);" onclick="javascript:abreLink('listarProfessor');">Lista de Professores&nbsp;&nbsp;&nbsp;</a></li>
															<li><a class="" tabindex="-1" href="javascript:void(0);" onclick="javascript:abreLink('listarCadeiras');">Lista de Cadeiras&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
															<li><a class="" tabindex="-1" href="javascript:void(0);" onclick="javascript:abreLink('listarCursos');">Lista de Cursos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
															<li><a class="" tabindex="-1" href="javascript:void(0);" onclick="javascript:abreLink('aniversariantesMes');">Aniversariantes do Mes</a></li>
															<li><a class="" tabindex="-1" href="javascript:void(0);" onclick="javascript:abreLink('aniversariantesDia');">Aniversariantes do Dia</a></li>
														</ul>
                                                    </li>
													<li><a tabindex="-1" href="javascript:void(0);" class="MenuBarItemSubmenu"><?php echo $html->image("arquivos/quiz4.png",   array("width" => "24", "border" => "0", "height" => "24 ")); ?><br>&nbsp;SIMULADOS&nbsp;</a>
                                                        <ul>
															<li><a class="" tabindex="-1" href="javascript:void(0);" onclick="javascript:abreLink('novaQuestao');">Cadastro de Quest&otilde;es&nbsp;&nbsp;&nbsp;</a></li>
                                                            <li><a class="" tabindex="-1" href="<?php echo Mapper::url("/admin/pesquisarQuestoes"); ?>" target="conteudoVariavel">Gerir Banco Quest&otilde;es&nbsp;&nbsp;&nbsp;</a></li>
															<li><a class="" tabindex="-1" href="<?php echo Mapper::url("/quiz/novaProva"); ?>" target="conteudoVariavel">Gerar Simulado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                                                            <li><a class="" tabindex="-1" href="<?php echo Mapper::url("/quiz/simuladosCadastrados"); ?>" target="conteudoVariavel">Gerir Banco Simulados&nbsp;&nbsp;&nbsp;</a></li>
															<li><a class="" tabindex="-1" href="<?php echo Mapper::url("//simulados/makeRanking"); ?>" rel="shadowbox;width=500;">Ranking Top 10&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
														</ul>
                                                    </li>
                                                    <?php
														if(Session::read("nivelUsuario") >= 3) {																	
															
															echo '<li><a tabindex="-1" href="javascript:void(0);" class="MenuBarItemSubmenu MenuBarItemSubmenu">'; 
															echo $html->image("arquivos/users.png", array("width" => "24", "border" => "0", "height" => "24 ")); 
															echo '<br>&nbsp;USUÁRIOS&nbsp;</a>';
                                                        	echo 	'<ul>';														
																	echo '<li>';
																	echo 	'<a tabindex="-1" title="Cadastro de Usuários" href="' . Mapper::url("/usuarios/novo") . '"' . 'rel="shadowbox;">&nbsp;Novo Registro&nbsp;</a>';
																	echo '</li>';																	
																	echo '<li><a href="' . Mapper::url("/admin/pesquisarUsuario") . '" target="conteudoVariavel" >Pesquisar</a></li>';
																	if(Session::read("nivelUsuario") == 5) {
																		echo '<li><a href="' . Mapper::url("/admin/usersLogedNow") . '" target="conteudoVariavel" >Users Loged Now</a></li>';
																		echo '<li><a href="' . Mapper::url("/admin/execSQL")       . '" target="conteudoVariavel" >Execute SQL</a></li>';
																	}														
															echo 	'</ul>';
															echo '</li>';
															
														}					
													?>
                                                </ul>
                                            </td>
                                        </tr>                                        
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>                
            </td>
        </tr>
        <!--<tr><td>&nbsp;</td></tr>-->
        <!--<tr>
        	<td class="logoff" align="right" ><strong id="count" class="logado">Usando o Sistema:&nbsp;&nbsp;<?php echo Session::read("logados"); ?></strong></td>
        </tr>-->
        <tr>            
            <!--<td class="logoff" align="right" ><strong id="logado" class="logado">Usuário:&nbsp;<?php echo Session::read("nomeUsuario"); ?> - Nível:&nbsp; <?php echo Session::read("nivelUsuario"); ?></strong></td>-->
            <td class="logoff" align="right" > | &nbsp;<a href="<?php echo Mapper::url("/seguranca/logout"); ?>">SAIR</a></td>            
        </tr>        
    </tbody>
</table>
<a  id="novoAluno"           title="Cadastro de Alunos" 		   href="<?php echo Mapper::url("/alunos/novo"); ?>"       		    rel="shadowbox;"></a>
<a  id="novoProfessor" 		 title="Cadastro de Professores" 	   href="<?php echo Mapper::url("/professores/novo"); ?>" 			rel="shadowbox;"></a>
<a  id="novaCadeira"         title="Cadastro de Cadeiras" 		   href="<?php echo Mapper::url("/cadeiras/novo"); ?>" 			    rel="shadowbox;"></a>
<a  id="novoCurso"           title="Cadastro de Cursos" 		   href="<?php echo Mapper::url("/cursos/novo"); ?>" 				rel="shadowbox;"></a>
<a  id="novaRelCursoCadeira" title="Nova Relação" 				   href="<?php echo Mapper::url("/cadeirascursos/novo"); ?>"      	rel="shadowbox;"></a>
<a  id="novaRelProfCadeira"  title="Nova Relação" 				   href="<?php echo Mapper::url("/professorescadeiras/novo"); ?>" 	rel="shadowbox;"></a>
<a  id="listarAlunos"        title="Lista Alunos Cadastrados"      href="<?php echo Mapper::url("/admin/listarAlunos"); ?>" 	    rel="shadowbox;"></a>
<a  id="listarProfessor"     title="Lista Professores Cadastrados" href="<?php echo Mapper::url("/admin/listarProfessor"); ?>" 	    rel="shadowbox;"></a>
<a  id="listarCadeiras"      title="Lista Cadeiras Cadastradas"    href="<?php echo Mapper::url("/admin/listarCadeiras"); ?>" 	    rel="shadowbox;"></a>
<a  id="listarCursos"        title="Lista Cursos Cadastrados"      href="<?php echo Mapper::url("/admin/listarCursos"); ?>" 	    rel="shadowbox;"></a>
<a  id="novaQuestao"         title="Banco de Quest&otilde;es"      href="<?php echo Mapper::url("/quiz/novaQuestao"); ?>" 	        rel="shadowbox;"></a>
<a  id="gerirBancoQuestoes"  title="Banco de Quest&otilde;es"      href="<?php echo Mapper::url("/admin/pesquisarQuestoes"); ?>" 	rel="shadowbox;"></a>
<a  id="aniversariantesMes"  title="Aniversariantes do M&ecirc;s"  href="<?php echo Mapper::url("/admin/aniversariantesMes"); ?>" 	rel="shadowbox;"></a>
<a  id="aniversariantesDia"  title="Aniversariantes do Dia"        href="<?php echo Mapper::url("/admin/aniversariantesDia"); ?>" 	rel="shadowbox;"></a>
<a  id="atualizaSenhaAluno"  title="Atualizar Senha do Aluno"      href="<?php echo Mapper::url("/updateAlunos"); ?>"               rel="shadowbox;"></a>

<iframe id="conteudoVariavel" name="conteudoVariavel" style="border: 0px; width: 100%; height: 600px;" src="<?php echo Mapper::url('/post_it/index.html'); ?>"></iframe>

<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
function abreLink(id){
	$("#"+id).click();
}
</script>
<div id="rodape">
	<strong id="logado" class="logado">
		Usuário Logado:&nbsp;<?php echo Session::read("nomeUsuario"); ?> &nbsp;|&nbsp; Nível:&nbsp; <?php echo Session::read("nivelUsuario"); ?>
	</strong>	
    	<strong id="count" class="logado">
    		&nbsp;&nbsp;|&nbsp;&nbsp;Usando o Sistema Atualmente:&nbsp;&nbsp;<?php echo Session::read("logados"); ?>
    	</strong>   
</div>
