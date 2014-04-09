<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Florence Palmares - Página do Super Usuário do Sitema</title>

	<?php echo $html->script("jquery.min.js"); ?>
	<script type="text/javascript" src="<?php echo Mapper::url("/shadowbox/shadowbox.js"); ?>" ></script>
    <link   type="text/css" href="<?php echo Mapper::url("/shadowbox/shadowbox.css"); ?>" rel="stylesheet"  />
    
    <script type="text/javascript">
        Shadowbox.init({
            language: "pt",
            player: ["img", "html", "swf"],
            modal: true							
        });
    </script>
    <style type="text/css">
    	a:link {
   			text-decoration: none; 
    		color: #0000FF
		}
		
		a:visited {
			text-decoration: none; 
			color: #0000FF
		}
		
		a:hover {
			text-decoration: underline; 
			color: #0000FF;
		}
		
		a:active {
			text-decoration: none
		}
	</style>
</head>

<body>
    <a  id="novoAluno"           title="Cadastro de Alunos" 		href="<?php echo Mapper::url("/alunos/novo"); ?>"       		rel="shadowbox;">Novo Aluno</a>&nbsp; | &nbsp;
    <a  id="novoProfessor" 		 title="Cadastro de Professores" 	href="<?php echo Mapper::url("/professores/novo"); ?>" 			rel="shadowbox;">Novo Professor</a>&nbsp; | &nbsp;
    <a  id="novaCadeira"         title="Cadastro de Cadeiras" 		href="<?php echo Mapper::url("/cadeiras/novo"); ?>" 			rel="shadowbox;">Nova Cadeira</a>&nbsp; | &nbsp;
    <a  id="novoCurso"           title="Cadastro de Cursos" 		href="<?php echo Mapper::url("/cursos/novo"); ?>" 				rel="shadowbox;">Novo Curso</a>&nbsp; | &nbsp;
    <a  id="novaRelCursoCadeira" title="Nova Relação" 				href="<?php echo Mapper::url("/cadeirascursos/novo"); ?>"      	rel="shadowbox;">Relacionar Cadeira x Curso</a>&nbsp; | &nbsp;
    <a  id="novaRelProfCadeira"  title="Nova Relação" 				href="<?php echo Mapper::url("/professorescadeiras/novo"); ?>" 	rel="shadowbox;">Relacionar Professor x Cadeira</a>&nbsp; | &nbsp;
    
    <a class="" href="<?php echo Mapper::url("/admin/pesquisarAlunos"); ?>" target="conteudoVariavel" >Pesquisar Alunos&nbsp;</a>&nbsp; | &nbsp;
    <a class="" href="<?php echo Mapper::url("/admin/pesquisarProfessores"); ?>" target="conteudoVariavel" >Pesquisar Professores&nbsp;</a>&nbsp; | &nbsp;
    <a class="" href="<?php echo Mapper::url("/admin/pesquisarCursos"); ?>" target="conteudoVariavel" >Pesquisar Cursos&nbsp;</a>&nbsp; | &nbsp;
    <a class="" href="<?php echo Mapper::url("/admin/pesquisarCadeiras"); ?>" target="conteudoVariavel" >Pesquisar Cadeiras&nbsp;</a>&nbsp; | &nbsp;
    <a class="" href="<?php echo Mapper::url("/admin/pesquisarRelacaoCadeiraCurso"); ?>" target="conteudoVariavel" >Pesquisar Relação Cadeira x Curso&nbsp;</a>&nbsp; | &nbsp;
    <a class="" href="<?php echo Mapper::url("/admin/pesquisarRelacaoCadeiraProfessor"); ?>" target="conteudoVariavel" >Pesquisar Relação Professor x Cadeira&nbsp;</a> &nbsp; | &nbsp;
    <a class="" href="<?php echo Mapper::url("/usuarios/novo"); ?>" title="Novo Usuário" rel="shadowbox" >Novo Usuário&nbsp;</a>&nbsp; | &nbsp;
    <a class="" href="<?php echo Mapper::url("/admin/pesquisarUsuario"); ?>" target="conteudoVariavel" >Pesquisar Usuário&nbsp;</a><br />
    
    
    
    <iframe id="conteudoVariavel" name="conteudoVariavel" style="border: 0px; width: 100%; height: 500px; margin-top: 10px;"></iframe>

</body>
</html>