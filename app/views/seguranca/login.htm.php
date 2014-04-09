<script type="text/javascript">
	$(document).ready( function() {
		document.getElementById("usuario").focus();		
	});
</script>
<style type="text/css">
.powered{margin-bottom: 0px}
.pbf{font-family:Arial;font-size:11px;text-align:center;margin:50px 0 100px 0;color:#333333;}
.pbf span{font-size:15px;font-weight:bold;}
.pbf sup{font-size:7px;}
.pbf .alt{font-weight:bold;}
.pbf .alt:hover{text-decoration:underline;}
.pbf a,.pbf a:link,.pbf a:visited,.pbf a:hover,.pbf a:active{color:#333333;}
</style>

<div id="wrapper">	    
	<div id="main" class="clearfix">	 	
    	<div id="topo"> 
			<div class="g960"> 
	    		<h1 id="logo"></h1> 
	    		<div class="fright"> 
					<div id="db-name">Portal Florence Palmares</div>
				</div><!-- .fright --> 
			</div><!-- .g960 --> 
		</div><!-- #topo --><br><br>
		<br><br>
		<div id="tela_login_top" style="margin: 0pt auto;"></div> 
		<div id="tela_login" style="margin: 0pt auto;"> 
			<div class="air-hor"> 
				<div id="divForm"> </div> 
    			<form class="login" id="login" name="login" method="post" action="<?php echo Mapper::url("/seguranca/login")?>"> 
     				<!-- <h4 class="login">Usuário:</h4> -->
     				Usu&aacute;rio:<br /> 
   					<input name="usuario" tabindex="1" id="usuario" autocomplete="off" size="30" maxlength="255" class="txt" type="text"><br> 
    				<h4 class="login air-top"></h4>
    				<!-- <h4 class="login air-top">Senha:</h4> -->
    				Senha:<br /> 
     				<input name="senha" value="" tabindex="2" id="senha" size="30" maxlength="255" class="txt" type="password"> 
    				<div class="clear"></div>			
		    		<div class="bloco"> 
						<button tabindex="3" type="submit" value="Login">Entrar</button> 
		    		</div> 
    		    	<div id="status_login" class="round6 aviso">Entre com Seu Nome de Usuário e Senha.</div> 
    			</form> 
			</div><!-- .spacer --> 
		</div> <!-- tela_login --> 
		<div id="tela_login_bot"></div>
		<div id="conteudo-bot" class="round-img"> </div> 	
	</div><!-- #main -->
	<div class="powered">
		<div class="pbf">
        	Powered by <span>Ws-Systemas</span><br>
        	Ajudando a Crescer com <a title="Ws-Systemas, Soluções para sua Empresa!" href="http://www.ws-systemas.com.br" target="_blank">Soluções Inteligentes para sua Empresa!</a>
    	</div>
	</div>
</div><!-- #wrapper -->	 
<div id="rodape"></div><!-- #rodape -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43682819-1', 'florencepalmares.com');
  ga('send', 'pageview');

</script>