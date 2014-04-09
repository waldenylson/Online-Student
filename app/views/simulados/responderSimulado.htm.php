<?php if(empty($simulados)){
    AppController::setFlash("Não Existem Simulados a Serem Respondidos!");    
    AppController::closeWindow();
}?>
<form name="frmS" method="post" action="<?php echo Mapper::url("/simulados/corrigirSimulado"); ?>" id="frmS">
    <!--content area-->
    <div id="PageContentDiv">
        <h1 class="sTitle">
            <div>Simulado Florence Escola Técnica</div>&nbsp;<br class="clear">
        </h1>
        <div class="pTitle">
            <h2></h2>&nbsp;<div id="timer" style="float:right;"><b>Tempo Restante:  <span id="timer" style="font-size:13px"></span></b></div><br class="clear">
        </div>
        <?php $cont=1;$cont2=1010; foreach ($simulados as $row) { ?>
        <div class="pgHdr">
            <div id="q1" class="question" style="margin:0 0 0 0;width:auto">
                <div class="qContent">
                    <h3 class="qHeader notranslate">
                        <abbr class="noborder" title="Questão <?php echo $cont; ?>"><?php echo $cont; ?></abbr>.&nbsp;<?php echo $row->questao; ?>
                    </h3>
                    <div class="qBody">
                        <table cellspacing="0" cellpadding="0" border="0" style="width:100%;">
                            <tbody>
                                <tr>
                                    <td valign="top" style="width:100%;">
                                        <div class="qOption hover">
                                            <input type="radio" class="rb" id="input_questao<?php echo $cont2; ?>" name="questao<?php echo $row->idQuestao; ?>" value="a">
                                            <label for="input_questao<?php echo $cont2; ?>" id="linput_questao<?php echo $cont2; $cont2++; ?>" class="rb_off">
                                                <?php echo $html->image("t.gif"); ?>
                                                <span class="qLabel"><?php echo $row->resposta1; ?></span>
                                            </label>
                                        </div>
                                        <div class="qOption hover">
                                            <input type="radio" class="rb" id="input_questao<?php echo $cont2; ?>" name="questao<?php echo $row->idQuestao; ?>" value="b">
                                            <label for="input_questao<?php echo $cont2; ?>" id="linput_questao<?php echo $cont2; $cont2++; ?>" class="rb_off">
                                                <?php echo $html->image("t.gif"); ?>
                                                <span class="qLabel"><?php echo $row->resposta2; ?></span>
                                            </label>
                                        </div>
                                        <div class="qOption hover">
                                            <input type="radio" class="rb" id="input_questao<?php echo $cont2; ?>" name="questao<?php echo $row->idQuestao; ?>" value="c">
                                            <label for="input_questao<?php echo $cont2; ?>" id="linput_questao<?php echo $cont2; $cont2++; ?>" class="rb_off">
                                                <?php echo $html->image("t.gif"); ?>
                                                <span class="qLabel"><?php echo $row->resposta3; ?></span>
                                            </label>
                                        </div>
                                        <div class="qOption hover">
                                            <input type="radio" class="rb" id="input_questao<?php echo $cont2; ?>" name="questao<?php echo $row->idQuestao; ?>" value="d">
                                            <label for="input_questao<?php echo $cont2; ?>" id="linput_questao<?php echo $cont2; $cont2++; ?>" class="rb_off">
                                                <?php echo $html->image("t.gif"); ?>
                                                <span class="qLabel"><?php echo $row->resposta4; ?></span>
                                            </label>
                                        </div>                                                    
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <?php $cont++; } ?>
    <!--end content area--> 
    <div id="panButtonBar">
        <div style="text-align:center;">
            <input type="submit" value="Entregar Simulado &gt;&gt;" onclick="return confirm('Deseja Mesmo Entregar o Simulado?')" id="entregarSimulado" class="btn btntext grey">
        </div>
    </div>
    <input type="hidden" name="prova_id" id="prova_id" value="<?php echo $row->idProva; ?>">
    <input type="hidden" name="aluno_id" id="aluno_id" value="<?php echo  $alunoID[0]['id']?>">
</form>
<footer>
    <div class="pbf">
        Powered by <span>Ws-Systemas</span><br>
        Ajudando a Crescer com <a title="Ws-Systemas, Soluções para sua Empresa!" href="http://www.ws-systemas.com.br" target="_blank">Soluções Inteligentes para sua Empresa!</a>
    </div>
</footer>