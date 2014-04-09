<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"> 	
		<title>Florence Palmares - Login do Sistema</title>        
        
		<?php echo $html->stylesheet("login.css");           ?>
		<?php echo $html->stylesheet("estilos.css");           ?>
        
		<?php echo $html->script("jquery.min.js");             ?>		
		<?php echo $html->script("jquery.validate.js");        ?>		        
		
		<?php echo $html->script(Config::read("jsURL"));       ?>
        
        <style type="text/css">
			.login{
				background:transparent url(../images/cadeado.jpg) repeat-x scroll 0 0;
			}
        </style>
			
    </head>
    <body class="mysql login" bgcolor="#FFFFFF">
        <?php echo $this->contentForLayout; ?>
    </body>
</html>