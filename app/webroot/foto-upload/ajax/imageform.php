<?php
  session_start();
  sleep(2);
  include"../conexao/config.php";
  include"../lib/session.php";
    
  /// ID SESSÃO
  $id_session = Session::read("codigoAlunoConfigFotoUpload");
 
  /// PASTA DE DESTINO
  $pasta = "../upload/temp/";

  /// FORMATOS PERMITIDOS
  $valid_formats = array("jpg", "png", "gif");
  	
  if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
		$name = $_FILES['photoimg']['name'];
		$size = $_FILES['photoimg']['size'];
					
	if(strlen($name)){	
			list($txt, $ext) = explode(".", $name);
		
	  if(in_array($ext,$valid_formats)){
		  
					/// PEGA AS DIMENSÕES DA IMAGEM
					$type = $_FILES['photoimg']['type'];
					if(!empty($type)){ $tam_name = getimagesize($_FILES['photoimg']['tmp_name']);}
		
		if($size<(1024*1024)){
						
				$actual_image_name = $id_session."-".sha1(uniqid(rand(), true)).time().".".$ext;
				$tmp = $_FILES['photoimg']['tmp_name'];
		  
		  if($tam_name[0] > 170){
			  
			if($tam_name[1] > 170){	
		  
		  	  if($tam_name[0] >= 600 || $tam_name[1] >= 400){
			  
			  /// FUNÇÃO PARA REDIMENSIONAR A IMAGEM
			  if($type == 'image/png'){ $img = imagecreatefrompng($tmp);}elseif($type == 'image/gif'){ $img = imagecreatefromgif($tmp);}else{ $img = imagecreatefromjpeg($tmp);}
			  	$x = imagesx($img);
				$y = imagesy($img);
		  
			  if($x < $y){
				$altura   = 400;
				$largura  = ($altura * $x) / $y;
			  }else{
				$largura  = 400;
				$altura   = ($largura * $y) / $x;
			  }	
			  $nova = imagecreatetruecolor($largura, $altura);
			  imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $altura, $x, $y);
			  if($type == 'image/png'){ $move_uploaded_file = imagepng($nova, $pasta.$actual_image_name);}elseif($type == 'image/gif'){ $move_uploaded_file = imagegif($nova, $pasta.$actual_image_name);}else{ $move_uploaded_file = imagejpeg($nova, $pasta.$actual_image_name);}
		  	  /// FIM - FUNÇÃO PARA REDIMENSIONAR A IMAGEM
			  
			  }else{ 
				$largura  = $tam_name[0]; 
				$altura   = $tam_name[1];
			  	$move_uploaded_file = move_uploaded_file($tmp, $pasta . $actual_image_name);
			  }
		  
			  if($move_uploaded_file){
				  
					$del_img = mysql_query("SELECT temp FROM foto_aluno WHERE aluno_id = '$id_session'") or die("Erro ao consultar");
							   $res_del = mysql_fetch_array($del_img);
								          $delet = $res_del['temp'];
										  if($delet != "avatar.jpg"){
								          chdir("../upload/temp/");
								          $del = unlink($delet);
										  }
				
					mysql_query("UPDATE foto_aluno SET temp = '$actual_image_name' WHERE aluno_id = '$id_session'") or die("Erro ao consultar");
						
					echo "-";
					?>
					<script type="text/javascript">
                    $(document).ready(function(){
					  $(".bp_load").remove();
					  $("#box_popup").css("height","500px");
					  $("#box_popup").css("width","620px");
					  $("#box_popup").css("position","fixed");
						  var tabBox_2 = ("#box_popup");
					  $(tabBox_2).fadeIn(300);
						  var popMargTop = 500 / 2; 					  
						  var popMargLeft = 620 / 2; 
					  $(tabBox_2).css({ 
						  'margin-top' : -popMargTop,
						  'margin-left' : -popMargLeft
					  });
                      $.ajax({
                          type: "POST",
                          url: "ajax/imagecrop.php",
                          data: "largura="+ "<?php echo $largura;?>" + "&altura="+ "<?php echo $altura;?>",
                          cache: false,
                          success: function(html){
							  $("#box_popup").append(html);						  
                          }
                      });
                      return false;
                    }); 
                    </script>
                    <?php
					exit;												
			  }else
				  echo "Falha ao enviar!";
			  ?>
				  <script type="text/javascript">
                    $(document).ready(function(){ 
                      $(".fileinput_button").fadeIn(0);
                      $(".fileinput_load").hide(0);
                    }); 
                  </script>
                  <?php
			}else
				echo "A foto deve ter a altura maior que 170 px";
				?>
				<script type="text/javascript">
				  $(document).ready(function(){ 
					$(".fileinput_button").fadeIn(0);
					$(".fileinput_load").hide(0);
				  }); 
				</script>
				<?php
		  }else
			  echo "A foto deve ter a largura maior que 170 px";
			  ?>
			  <script type="text/javascript" >
                $(document).ready(function(){ 
                  $(".fileinput_button").fadeIn(0);
                  $(".fileinput_load").hide(0);
                }); 
              </script>
              <?php
		}else
			echo "A foto deve ser de no máximo 1 MB";
			?>
			<script type="text/javascript">
			  $(document).ready(function(){ 
				$(".fileinput_button").fadeIn(0);
				$(".fileinput_load").hide(0);
			  }); 
			</script>
			<?php					
	  }else
		  echo "O formato da foto não é válido!";
		  ?>
		  <script type="text/javascript">
            $(document).ready(function(){ 
              $(".fileinput_button").fadeIn(0);
              $(".fileinput_load").hide(0);
            }); 
          </script>
		  <?php
	}else
	  echo "Selecione uma foto!";
	  ?>
	  <script type="text/javascript">
		$(document).ready(function(){ 
		  $(".fileinput_button").fadeIn(0);
		  $(".fileinput_load").hide(0);
		}); 
	  </script>
	  <?php
  exit;
  }
?>
