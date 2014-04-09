<?php
  session_start();
  sleep(1);
  include"../conexao/config.php";
  include"../lib/session.php";
    
  /// ID SESSÃO
  $id_session = Session::read("codigoAlunoConfigFotoUpload");

  /// PEGA A IMAGEM ATUAL
  $sql = mysql_query("SELECT img FROM foto_aluno WHERE aluno_id = '$id_session'") or die(mysql_error());
		 $res = mysql_fetch_array($sql);
				$img  = $res['img'];
				
?>
<img class="img_1" src="upload/thumb/<?php echo $img;?>" alt="" />