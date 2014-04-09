<?php	
  /// DADOS DE ACESSO AO SERVIDOR MySQL LOCALHOST
  $host_db = "mysql12.uni5.net";
  $user_db = "florencepalmar02";
  $pass_db = "183314eu";
  $my_db   = "florencepalmar02";
	
  /// REALIZA A CONEXÃO
  $conect = mysql_connect($host_db,$user_db ,$pass_db);
            mysql_select_db($my_db, $conect);
?>
