<?php 
	include"conexao/config.php";
	include"lib/session.php";
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Florence Palmares - Painel Administrativo do Sistema</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>

<script type="text/javascript">
  /// FUNÇÃO POPUP ALTERAR FOTO
  $(document).ready(function() {
	  $(".img_2").click(function() {
			  var tabBox_1 = (".box_popup");
		  $(tabBox_1).fadeIn(300);
			  var popMargTop = ($(tabBox_1).height() + 24) / 2; 
			  var popMargLeft = ($(tabBox_1).width() + 24) / 2; 
		  $(tabBox_1).css({ 
			  'margin-top' : -popMargTop,
			  'margin-left' : -popMargLeft
		  });
			  $("body").append('<div id="mask"></div>');
			  $("#mask").fadeIn(300);
			  		$.post("ajax/imagefile.php", function(img){
		  		    complete:$(".bp_load").fadeIn(0).html(img);
				});
		  return false;
	  });
	  $(".bp_fechar").live('click', function() { 
		  $("#mask , #box_popup").fadeOut(300 , function(){
			  $("#mask").remove();
			  $("#box_popup").remove();
			  $("body").append('<div id="box_popup" class="box_popup"></div>');
			  $("#box_popup").append('<div class="bp_titulo"><div class="bp_titulo_1">Alterar Foto</div><span class="bp_fechar"><img src="img/fechar.png" alt="" /></span></div>');
			  $("#box_popup").append('<div class="bp_load"><div class="bp_load_1"><img src="img/loader.gif" alt="" />Carregando...</div></div>');
		  }); 
		  return false;
	  });
  });
  
  /// ENVIA A IMAGEM
  $(document).ready(function(){ 
	$('#photoimg').live('change', function(){ 
	  $(".preview").html('');
	  $(".fileinput_button").hide(0);
	  $(".fileinput_load").fadeIn(0);
	  $(".fileinput_load").html('<img src="img/loader-2.gif" alt="" />');
	  $("#imageform").ajaxForm({
		target: '.preview'
	  }).submit();
	});
  }); 
</script>
</head>

<body bgcolor="#FFFFFF">
<?php
/// ID SESSÃO
$id_session = $_GET["aluno"];
Session::write("codigoAlunoConfigFotoUpload", $id_session);

$sql = mysql_query("SELECT * FROM foto_aluno WHERE aluno_id = '$id_session'") or die("Erro ao selecionar");
	   $res = mysql_fetch_array($sql);
?>
<div id="box_popup" class="box_popup">
    <div class="bp_titulo">
        <div class="bp_titulo_1">Alterar Foto</div><!--bp_titulo_1-->
        <span class="bp_fechar"><img src="img/fechar.png" alt="" /></span>  
    </div>
    
    <div class="bp_load">
        <div class="bp_load_1"><img src="img/loader.gif" alt="" /> Carregando...</div><!--bp_load_1-->
    </div>
</div><!--box_popup-->
  
<div id="conteudo">
  <div class="titulo">Upload da Imagem</div>
  <div class="bloco">
      <div class="img"><img class="img_1" src="<?php echo "upload/thumb/".$res['img'];?>" alt="" /></div>    
      <img class="img_2" src="img/alterar-foto.png" alt="" />
  </div>
</div><!--conteudo--> 
</body>
</html>