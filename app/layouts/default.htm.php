<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">				
		<title></title>        
        
		<?php echo $html->stylesheet("estilos.css");           ?>
        
		<?php echo $html->script("jquery.min.js");             ?>
		<?php echo $html->script("jquery.maskedinput.js");     ?>
		<?php echo $html->script("jquery.validate.js");        ?>
		<?php echo $html->script("jquery.validate.custom.js"); ?> 
		<?php echo $html->script("jquery.cookie.js");          ?>        
		
		<?php $jsURL = Config::read("jsURL"); ?>
        <?php if(!empty($jsURL)) echo $html->script(Config::read("jsURL")); ?>	

		<script type="text/javascript" src="<?php echo Mapper::url("/shadowbox/shadowbox.js"); ?>"> </script>
        <link   type="text/css" href="<?php echo Mapper::url("/shadowbox/shadowbox.css"); ?>" rel="stylesheet"  />
        
        <script type="text/javascript">
			Shadowbox.init({
				language: "pt",
				player: ["img", "html", "swf"],
				modal: true							
			});
		</script>        	
    </head>
    <body bgcolor="#FFFFFF">		
		<?php echo $this->contentForLayout; ?>		
    </body>
</html>