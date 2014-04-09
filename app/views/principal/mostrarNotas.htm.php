<?php echo $html->stylesheet("notas.css");?>
<?php echo $html->stylesheet("notas2.css");?>

<div class="cabecalho">
	<table cellpadding="0" cellspacing="0" border="0">
    	<tbody>
            <tr>
                <td width="100%" align="left"><?php echo Session::read("matricula");?>&nbsp;&nbsp;|&nbsp;&nbsp;<strong><?php foreach($aluno as $row){echo $row['name']; } ?></strong></td>
                <td align="right"><a href="javascript:void(0);" onclick="javascript:window.print();" title="Imprimir Listagem"><strong>IMPRIMIR</strong></a></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="titulo">&nbsp;NOTAS</div>
<div class="corpo">
	<table class="grid" width="100%" cellpadding="4" cellspacing="0" border="0" >
    	<tbody>
            <tr>
            	<th class="msgTextoColunas" width="400" align="left" >&nbsp;&nbsp;Disciplina </th>
                <!--<th class="msgTextoColunas" width="" align="left" >|&nbsp;&nbsp;&nbsp;Notas </th>-->
            </tr>
        </tbody>
    </table>
    <table class="grid" width="100%" cellpadding="4" cellspacing="0" border="0" >
    	<tbody>                       
            <?php				
				$cadeiraID = null;
				$semaforo  = false;				
				foreach($notas as $row) {                						
					if($cadeiraID != $row['cadeira_id']) {               
						if($semaforo) {
							foreach($medias as $media) {
								if($media['cadeira_id'] == $cadeiraID) {
									if ($media['media'] - (int)$media['media'] > 0.5 && $media['media'] - (int)$media['media'] < 1) {
										$media['media'] =  (int)$media['media'] + 1;
									} elseif ($media['media'] - (int)$media['media'] < 0.5 && $media['media'] - (int)$media['media'] > 0 ) {
										$media['media'] = (int)$media['media'] + 0.5;
									}else{}
									
									echo '<td align="center" width="80"><b><i>MÉDIA:&nbsp;&nbsp;' . number_format($media['media'], 2, '.', '') . '</i></b></td>';
									if($media['media'] >= 7) {
										echo '<td align="center" width="80"><b>APROVADO</b></td>';
									}
									else {
										echo '<td align="center" width="80"><b>REPROVADO</b></td>';
									}									
									break;
								}
							}
							echo "</tr>";
						}
						echo '<tr>';
						echo '<td align="left">'   . $row['nome'] . '</td>';			
						echo '<td align="center" width="50">' . number_format($row['nota'], 2, '.', '') . '</td>'; 
						
						$cadeiraID = $row['cadeira_id'];
						$semaforo  = true;								                                    
					}
					else {							 				
						
						echo '<td align="center" width="50">' . number_format($row['nota'], 2, '.', '') . '</td>';
						
						$cadeiraID = $row['cadeira_id'];
						$semaforo  = true;
					}				
				}
				foreach($medias as $media) {
					if($media['cadeira_id'] == $cadeiraID) {
						if ($media['media'] - (int)$media['media'] > 0.5 && $media['media'] - (int)$media['media'] < 1) {
							$media['media'] =  (int)$media['media'] + 1;
						} elseif ($media['media'] - (int)$media['media'] < 0.5 && $media['media'] - (int)$media['media'] > 0 ) {
							$media['media'] = (int)$media['media'] + 0.5;
						}else{}
						
						echo '<td align="center" width="80"><b><i>MÉDIA:&nbsp;&nbsp;' . number_format($media['media'], 2, '.', '') . '</i></b></td>';
						if($media['media'] >= 7) {
										echo '<td align="center" width="80"><b>APROVADO</b></td>';
									}
									else {
										echo '<td align="center" width="80"><b>REPROVADO</b></td>';
									}
						break;
					}
				}
				echo "</tr>";
			?>     
        </tbody>         
    </table>
    <br />
</div>