<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <?php echo $html->script("jquery.min.js");    ?>
	<?php echo $html->script("jquery.corner.js"); ?>   
    <?php echo $html->script("DD_roundies_0.0.2a-min.js"); ?>
	<?php echo $html->script("js.js"); 			  ?>
    
    <script type="text/javascript">
		$(document).ready(function() {
			<?php					
			$user_agente = $_SERVER["HTTP_USER_AGENT"];
			
			if(ereg("MSIE", $user_agente)){			
				echo "DD_roundies.addRule('#codigo',    '3px');";
				echo "DD_roundies.addRule('#inscricao', '3px');";
				echo "DD_roundies.addRule('#nome',      '3px');";
				echo "DD_roundies.addRule('#curso',     '3px');";
				echo "DD_roundies.addRule('#obs',       '3px');";
				   							
			}
			else{
				echo '$("div").corner("3px");';				
			}								
		?>			
		});		
	</script>
	
	<script type="text/javascript">
		$("document").ready(function() {
			getDestino("codigo");
			//Ajax('GET', '<?php echo Mapper::url("/cracha/geraCodigoBarra/{$matricula}"); ?>');			
		});
	</script>

<title>Gerando Crach&aacute;</title>

<style type="text/css">
#nome{
	margin: 0px;
	padding-top:0px;
	padding-left: 0px;
	border: 1px solid #000;	
	font-family:"Comic Sans MS", cursive;
	font-size: 12px;
	font-weight:bold;
	text-align:center;
	width:220px;
	height:auto;
	margin-left: 10px;
}
#codigo{
	clear:both;	
	border: 1px solid #000;
	height: 65px;
	height:75px;
	width:220px;
	margin-left:10px;
	
				
}

#inscricao{
	border: 1px solid #000;
	padding-left: 1px;
	padding-right: 1px;
	font-family:"Comic Sans MS", cursive;
	font-size: 12px;
	float: left;
	text-align: center;
	height:15px;
	width:63px;
	margin-left: 10px;

}
#curso{
	
	border: 1px solid #000;
	font-family:"Comic Sans MS", cursive;
	font-size: 10px;
	float: right;
	text-align: center;
	height:15px;
	width:152px;
	
	
	
}
#cracha{
	width: 232px;
	height: 207px;	
	margin-left: 20px;
}

#foto{
	width: 220px;
	height: 240px;
	border: 1px solid #000;
	margin-left: 10px;
	margin-top: 10px;	
	background-image:url(http://florencepalmares.com/sistema/images/frentecracha.png);
	background-repeat:no-repeat;
}

.barras {
	margin-left:30px;
	position: fixed;
	padding-top: 0px;

}

</style>
</head>
<body bgcolor="#FFFFFF" onload="javascript:window.print();">	
	<div id="cracha">
      
        <div id="foto">
        	
        </div>
          <div id="nome">
            <?php  foreach($nome as $row) echo $row['nome']; ?>            
        </div>                       	
        <div id="inscricao">
            <?php echo $matricula; ?>
        </div>            
        <div id="curso">
            <?php foreach($curso as $row) echo $row['nome'];?>
        </div>
		<div id="codigo">
        	<iframe frameborder="0" scrolling="no" id="codBarras" class="barras" src="/sistema/classBarraC.php?codigo=<?php echo Session::read("codigoBarra"); ?>")></iframe>
      </div>		
    </div>
  
</body>
</html>
