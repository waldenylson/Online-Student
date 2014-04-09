<script src="<?php echo Mapper::url("/jquery.treeview/jquery.treeview.min.js"); ?>"> </script>
<link   href="<?php echo Mapper::url("/jquery.treeview/jquery.treeview.css"); ?>" rel="stylesheet"  />

<script type="text/javascript">
    $(document).ready(function(){
    	$("ul").treeview();
    });
</script>

<style type="text/css">
    a:link {
        text-decoration: none;
        color: #0000FF;
        font-size: 11px;        
    }
    a:visited {
        text-decoration: none;
        color: #0000FF;
    }
    a:hover {
        text-decoration: underline; 
        color: #0000FF;
        font-size: 12px;
    }
    a:active {
        text-decoration: none;
    }
    .borda {
        background-color: #FFFFFF;
        border: 1px solid #3166A5;
        padding: 10px;
        margin-left: 10px;
        margin-right: 10px; 
    }  
    .acoes { margin-bottom: 2px } 
</style>

<fieldset class="borda">
    <legend><b><i>&nbsp;.:&nbsp;Simulado Cadastrados&nbsp;:.&nbsp;</i></b></legend>    
    <?php 
        $semaforo = 0; 
        if(empty($simulados)) {
            echo("<script>");
            echo("alert('Ainda Não existem Simulados Cadastrados!')" . ";");
            echo("</script>");
        }
    ?>    
    <?php foreach ($simulados as $row) { ?>
        <?php            
            if($semaforo != $row->idProva) {
                echo '</ul>';
                echo '</li>';
                echo '</ul>';
            }            
        ?>
        <?php if($semaforo != $row->idProva) { ?>
            <ul class="filetree">
                <li class="closed">
                    <span class="folder">&nbsp;Questões Selecionadas para o Simulado Código #<?php echo $row->idProva; ?>&nbsp;&nbsp;&nbsp;<div class="acoes"><a href="<?php echo Mapper::url('/quiz/editarSimulado/'). '/'. $row->idProva;?>">EDITAR</a>&nbsp;<a href="<?php echo Mapper::url('/quiz/deletarSimulado/'). '/'. $row->idProva;?>" onclick="javascript:return confirm('Deseja Mesmo Excluir o Simulado?')">EXCLUIR</a>&nbsp;<a href="<?php echo Mapper::url('/quiz/liberarSimulado/'). '/'. $row->idProva;?>">LIBERAR</a>&nbsp;<a rel="shadowbox" href="<?php echo Mapper::url('/quiz/alunosResponderamSimulado/'). '/'. $row->idProva;?>">ALUNOS</a></div></span>
                    <ul>                        
                        <li class="closed">
                            <span class="file"><?php echo $row->questao; ?></span>
                            <ul>
                                <li class="file"><?php if($row->respostaCorreta == "a") echo "<b>"; ?><?php echo "a) " . $row->resposta1; ?><?php if($row->respostaCorreta == "a") echo "</b>"; ?></li>
                                <li class="file"><?php if($row->respostaCorreta == "b") echo "<b>"; ?><?php echo "b) " . $row->resposta2; ?><?php if($row->respostaCorreta == "b") echo "</b>"; ?></li>
                                <li class="file"><?php if($row->respostaCorreta == "c") echo "<b>"; ?><?php echo "c) " . $row->resposta3; ?><?php if($row->respostaCorreta == "c") echo "</b>"; ?></li>
                                <li class="file"><?php if($row->respostaCorreta == "d") echo "<b>"; ?><?php echo "d) " . $row->resposta4; ?><?php if($row->respostaCorreta == "d") echo "</b>"; ?></li>
                            </ul>
                        </li>                   
                    <!-- </ul>      
                </li>
            </ul> -->            
        <?php } ?>
        <?php if($semaforo == $row->idProva) { ?>               
            <li class="closed">
                <span class="file"><?php echo $row->questao; ?></span>
                <ul>
                    <li class="file"><?php if($row->respostaCorreta == "a") echo "<b>"; ?><?php echo "a) " . $row->resposta1; ?><?php if($row->respostaCorreta == "a") echo "</b>"; ?></li>
                    <li class="file"><?php if($row->respostaCorreta == "b") echo "<b>"; ?><?php echo "b) " . $row->resposta2; ?><?php if($row->respostaCorreta == "b") echo "</b>"; ?></li>
                    <li class="file"><?php if($row->respostaCorreta == "c") echo "<b>"; ?><?php echo "c) " . $row->resposta3; ?><?php if($row->respostaCorreta == "c") echo "</b>"; ?></li>
                    <li class="file"><?php if($row->respostaCorreta == "d") echo "<b>"; ?><?php echo "d) " . $row->resposta4; ?><?php if($row->respostaCorreta == "d") echo "</b>"; ?></li>
                </ul>
            </li>
        <?php } ?> 
        <?php $semaforo = $row->idProva; ?>
    <?php } ?>
</fieldset>