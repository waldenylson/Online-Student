<?php
include_once 'include/provasVO.php';
class SimuladosController extends AppController{
	public    $uses          = array("Ranking");
	protected $requiredLevel = 1;	
	public    $layout        = "simulados";

	public function index(){
		$this->autoRender = false;
	}

    public function makeRanking(){
        Config::write("cssURL", "ranking.css");

        $somaPontos               = 0;
        $totalPontos              = 0;
        $questoesRespondidasArray = array();
        $arrayRanking             = array();
        
        $alunosResponderamProvas  = Model::fetch("SELECT * FROM alunos_responderam_provas");        

        foreach ($alunosResponderamProvas as $row) {
            $simuladosEntregues = Model::fetch("SELECT * FROM alunos_provas WHERE(alunos_provas.aluno_id =" . $row['id'] . ")");
                        
            foreach ($simuladosEntregues as $row1) {
                $questoesRespondidasArray = unserialize($row1["respostas"]);
                if(!empty($questoesRespondidasArray))
                    $sql = "SELECT questoes.id, questoes.pontuacao, questoes.correta FROM questoes, alunos_provas WHERE( (questoes.id IN(" . implode(",", array_keys($questoesRespondidasArray)) . ")) AND (alunos_provas.id =" . $row1['id'] . ") )";
                else
                    $sql = "SELECT questoes.id, questoes.pontuacao, questoes.correta FROM questoes, alunos_provas WHERE( (questoes.id IN(0)) AND (alunos_provas.id =" . $row1['id'] . ") )";
                
                $dados = Model::fetch($sql);
                foreach ($dados as $row2) {
                    if($questoesRespondidasArray[$row2["id"]] == $row2["correta"]) {                        
                        $somaPontos += $row2["pontuacao"];
                    }
                }                
            }
            $totalPontos += $somaPontos;

            $alunosResponderamProvasArray["id"]        = $row["id"];
            $alunosResponderamProvasArray["matricula"] = $row["matricula"];
            $alunosResponderamProvasArray["aluno"]     = $row["aluno"];
            $alunosResponderamProvasArray["curso"]     = $row["curso"];
            $alunosResponderamProvasArray["pontuacao"] = $totalPontos;

            $arrayRanking[] = $alunosResponderamProvasArray;
            $somaPontos     = 0;
            $totalPontos    = 0;
        }

        Model::begin();        
        foreach ($arrayRanking as $row) {
            try {
                foreach ($arrayRanking as $row) {
                    $this->Ranking->save($row);
                }
                Model::commit();                
            } catch (Exception $e) {
                $this->setFlash($e->getMessage());
                Model::rollback();
            }
        }
        $data = Model::fetch("SELECT * FROM ranking ORDER BY pontuacao DESC LIMIT 0,10");
        $this->set("dados", $data);
    }

	public function responderSimulado(){
		$data          = array();
        $simuladosID   = array();

        $matricula = Session::read("matricula");
        $alunoID   = Model::fetch("SELECT alunos.id FROM alunos WHERE(alunos.matricula = '$matricula')");
        
        $provas = Model::fetch("SELECT * FROM provas WHERE(provas.id IN(SELECT prova_id FROM cursos_provas cp WHERE(cp.curso_id = (SELECT a.curso_id FROM alunos a WHERE(a.matricula = '$matricula')))) AND provas.id NOT IN(SELECT alunos_provas.prova_id FROM alunos_provas WHERE(alunos_provas.aluno_id = (SELECT alunos.id FROM alunos WHERE(alunos.matricula = '$matricula'))))) LIMIT 1");
        
        foreach ($provas as $row) {
            $sql          = "SELECT * FROM questoes WHERE id IN(" . $row["questoes"] . ")";
            $quetoesProva = Model::fetch($sql); 

            foreach ($quetoesProva as $row1) {
                
                $objProvas = new Provas(); 
                               
                $objProvas->idProva         = $row["id"];
                $objProvas->idQuestao       = $row1["id"];
                $objProvas->questao         = $row1["enunciado"]; 
                $objProvas->resposta1       = $row1["resposta1"];
                $objProvas->resposta2       = $row1["resposta2"];
                $objProvas->resposta3       = $row1["resposta3"];
                $objProvas->resposta4       = $row1["resposta4"];
                $objProvas->respostaCorreta = $row1["correta"];
               
                $data[] = $objProvas;
            }
        }
        $this->set("simulados", $data);
        $this->set("alunoID", $alunoID);
    }

    public function corrigirSimulado(){
        $this->autoRender = false;
        if (!empty($this->data)) {
            $alunoID = $this->data["aluno_id"];
            $provaID = $this->data["prova_id"];
            
            $questoesRespondidasArray = array();
            
            while ($questaoRecebidaNoArray = current($this->data)) {
                if (substr(key($this->data), 0, 7) == 'questao') {
                    $questoesRespondidasArray[substr(key($this->data), 7, 2)] = $questaoRecebidaNoArray;
                }                
                next($this->data);
            }

            $respostasEnviadas = serialize($questoesRespondidasArray); //ArrayToStr ------------------->
            
            if ((!empty($alunoID)) && (!empty($provaID))):
                $retorno = Model::query("INSERT INTO alunos_provas VALUES(null, '$alunoID', '$provaID', '$respostasEnviadas', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
            endif;
            
            
            if($retorno) { 
                $this->setFlash("Simulado Enviado para Correção com Sucesso!");
                $this->redir("/principal/index");
            }
            else
                $this->setFlash("Erro no Processamento dos Dados!");
                $this->redir("/simulados/responderSimulado");
        } else {
            $this->setFlash("Nenhum Dado foi Recebido!");
            $this->redir("/simulados/responderSimulado");
        }
    }

    public function simuladoEntregue($idSimulado = null){
        $this->layout              = "simuladosCorrigidos";
        $data                      = array();
        $matricula                 = Session::read("matricula");
        $questoesRespondidasArray  = array();

        $provas           = Model::fetch("SELECT * FROM provas p, alunos_provas ap WHERE(p.id = '$idSimulado' AND ap.prova_id = '$idSimulado' AND ap.aluno_id = (SELECT id FROM alunos WHERE(alunos.matricula = '$matricula')))");
        $simuladoEntregue = Model::fetch("SELECT * FROM alunos_provas WHERE(alunos_provas.prova_id = '$idSimulado' AND alunos_provas.aluno_id = (SELECT id FROM alunos WHERE(alunos.matricula = '$matricula')))");

        try {
            $questoesRespondidasArray = unserialize($simuladoEntregue[0]["respostas"]);

            foreach ($provas as $row) {
                $sql          = "SELECT * FROM questoes WHERE id IN(" . $row["questoes"] . ")";
                $quetoesProva = Model::fetch($sql);

                foreach ($quetoesProva as $row1) {

                    $objProvas = new Provas();

                    $objProvas->idProva         = $row["id"];
                    $objProvas->idQuestao       = $row1["id"];
                    $objProvas->questao         = $row1["enunciado"]; 
                    $objProvas->resposta1       = $row1["resposta1"];
                    $objProvas->resposta2       = $row1["resposta2"];
                    $objProvas->resposta3       = $row1["resposta3"];
                    $objProvas->resposta4       = $row1["resposta4"];
                    $objProvas->respostaCorreta = $row1["correta"];
                   
                    $data[] = $objProvas;
                }
            }
            $this->set("simulados", $data);
            $this->set("simuladoRespondido", $questoesRespondidasArray);
        } catch (Exception $e) {
            $msg = 'Ocorreu um Erro no Processamento dos Dados!\n' . $e->getMessage();
            $this->setFlash($msg);
        }
    }

    public function simuladosRespondidos() {
        $matricula = Session::read("matricula");
        
        $data = Model::fetch("SELECT * FROM alunos_provas ap WHERE(ap.aluno_id = (SELECT id FROM alunos a WHERE(a.matricula = '$matricula')))");
        $this->set("dados", $data);
    }

    public function openTestWindow() {
        $this->layout = "testWindow";   
    }
}