<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">	
		<title>Florence Palmares - Painel Administrativo do Sistema</title>        
        
		<?php echo $html->stylesheet("admin.css");                          ?>
		<?php echo $html->stylesheet("arquivos/SpryMenuBarVertical.css");   ?>
        <?php echo $html->stylesheet("arquivos/SpryMenuBarHorizontal.css"); ?>		
        
        <?php echo $html->script("jquery.min.js");             ?>
                      
        <?php echo $html->script("arquivos/SpryMenuBar.js");   ?>
        <?php echo $html->script("arquivos/base.js");          ?>
        <?php echo $html->script("arquivos/utility.js");       ?>
        <?php echo $html->script("arquivos/style.js");         ?>
        
        <?php echo $html->script("js.js"); ?>
		
		<?php echo $html->script(Config::read("jsURL"));       ?>
        
        <script type="text/javascript" src="<?php echo Mapper::url("/shadowbox/shadowbox.js"); ?>" ></script>
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