<?php
include_once 'include/provasVO.php';
class QuizController extends AppController {
    public $requiredLevel = 2;
    public $uses          = array("Questoes", "Provas", "CursosProvas"); 
    
    public function index() {
        $this->autoRender = false;      
    }

    public function alunosResponderamSimulado($simuladoID = null) {
        $somaPontos               = 0;
        $totalPontos              = 0;
        $questoesRespondidasArray = array();

        $alunosResponderamEstaProva = Model::fetch("SELECT ap.*, a.matricula, a.nome as 'aluno', c.nome as 'curso' FROM alunos_provas ap, alunos a, cursos c WHERE((ap.prova_id = '$simuladoID') AND (ap.aluno_id = a.id) AND (a.curso_id = c.id))");

        foreach ($alunosResponderamEstaProva as $row) {
            $simuladosEntregues = Model::fetch("SELECT * FROM alunos_provas WHERE(alunos_provas.aluno_id =" . $row['id'] . ")");
            
            $questoesRespondidasArray = unserialize($row["respostas"]);
            if(!empty($questoesRespondidasArray)) {
                $sql = "SELECT questoes.id, questoes.pontuacao, questoes.correta FROM questoes WHERE(questoes.id IN(" . implode(",", array_keys($questoesRespondidasArray)) . "))";
            } else {
                $sql = "SELECT questoes.id, questoes.pontuacao, questoes.correta FROM questoes WHERE(questoes.id IN(0))";
            }

            $dados = Model::fetch($sql);
            foreach ($dados as $row2) {
                if($questoesRespondidasArray[$row2["id"]] == $row2["correta"]) {                        
                    $somaPontos += $row2["pontuacao"];
                }
            }
            $totalPontos += $somaPontos;

            $alunosResponderamProvasArray["id"]        = $row["id"];
            $alunosResponderamProvasArray["matricula"] = $row["matricula"];
            $alunosResponderamProvasArray["aluno"]     = $row["aluno"];
            $alunosResponderamProvasArray["curso"]     = $row["curso"];
            $alunosResponderamProvasArray["pontuacao"] = $totalPontos;

            $arrayAlunos[] = $alunosResponderamProvasArray;
            $somaPontos     = 0;
            $totalPontos    = 0;
        }

        $this->set("dados", $arrayAlunos);
    }

    public function editarSimulado($id = null) {
        try {
            Session::write("idSimuladoEmEdicao", $id);

            $questoesSimulado = Model::fetch("SELECT questoes FROM provas WHERE(provas.id = $id)");

            foreach ($questoesSimulado as $row) {
                $questoes = $row["questoes"];
            }
            Session::write("questoes", $questoes);

            $this->setAction("novaProva");            
        } catch (Exception $e) {
            $this->setFlash('Ocorreu um Erro no Processamento dos Dados!');
        }
    }

    public function deletarSimulado($id = null) {
        $this->autoRender = false;
        $retorno = Model::query("DELETE FROM provas WHERE(provas.id = $id)");

        if($retorno) {
            $this->setFlash('Dados Excluídos com Sucesso!');
            $this->redir("/quiz/simuladosCadastrados");

			Model::query("DELETE FROM ranking");
        }
        else {
            $this->setFlash('Erro ao Excluir os Dados!');
            $this->redir("/quiz/simuladosCadastrados");
        }
    }

    public function liberarSimulado($id = null) {
        if(!empty($this->data)) {
            //$sql     = "INSERT INTO cursos_provas VALUES(null, {$this->data['curso_id']}, {$this->data['prova_id']})";
            $data = Model::fetch("SELECT COUNT(*) as 'qtd' FROM cursos_provas cp WHERE(cp.curso_id = {$this->data['curso_id']} AND cp.prova_id = {$this->data['prova_id']})");
            foreach($data as $row) {
                if($row["qtd"] == 0) {
                    $retorno = $this->CursosProvas->save($this->data);        
                } else {
                    // $this->data["id"] = $id;
                    // $retorno = $this->CursosProvas->save($this->data);
                    $this->setFlash("Simulado Já Liberado para Esta Turma!");
                }
            }            
            if($retorno)
                $this->setFlash("Simulado Liberado com Sucesso!");
        }
        $this->set("idProva", $id);
        $this->set("cursos",   Model::fetch('SELECT id, nome FROM cursos ORDER BY nome'));
    }

    public function removerQuestaoSimuladoEmMontagem() {
        $this->autoRender = false;
        try {
            $idQuestao = $this->data["dados"];

            $questoesGravadasSessao = Session::read("questoes"); // Verifica se tem dados na variavel ----------->

            $arrayOfQuestions    = array();
            $newArrayOfQuestions = array();
            $arrayOfQuestions    = explode(",", $questoesGravadasSessao);
             
            // Faço a concatenação dos dados verificando se o valor já existe ----------------->
            if (!empty($questoesGravadasSessao)) {
                $questoes = $questoesGravadasSessao;

                foreach($arrayOfQuestions as $row) {
                    if( $row != $idQuestao) {
                        array_push($newArrayOfQuestions, $row);
                    }
                }                
            } 
            // -------------------------------------------------------------------------------->
            
            // Removo a ultima virgula do array em seguida gravo novamente na Sessao ---------->
            $questoes = implode(",", $newArrayOfQuestions);
            Session::write("questoes", $questoes);        
            // -------------------------------------------------------------------------------->                       
            $cadeiraID = Session::read("cadeiraID"); // Verifica qual cadeira das questoes ---->

            echo 0;                                
        }
        catch (Exception $e) {
            echo $e;           
        }
    }

    public function simuladosCadastrados(){
        $data          = array();
        $simuladosID   = array();
        
        try {
            $provas = Model::fetch("SELECT * FROM provas");
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
        } catch (Exception $e) {
            $this->setFlash('Ocorreu um Erro no Processamento dos Dados!');
        }
    }

    public function novaProva() {        
        try {
            if(!empty($this->data)){                      
                $cadeiraID = $this->data["cadeira_id"];            
                if($this->data["cadeira_id"] != "legenda") {
                    $data = Model::fetch("SELECT * FROM questoes WHERE(questoes.cadeira_id = $cadeiraID) ORDER BY questoes.enunciado");
                }            
                $this->set("dados", $data);
                Session::write("cadeiraID", $cadeiraID);
            }
            $this->set("cadeiras", Model::fetch("SELECT id, nome FROM cadeiras ORDER BY nome"));                
        } catch (Exception $e) {
            $this->setFlash('Ocorreu um Erro no Processamento dos Dados!');
        }                    
    }

    public function unsetQuestoes(){
        $this->autoRender = false;

        pr(Session::read("questoes"));         
        Session::delete("questoes");        
    }

    public function checkDataInSession(){
        $this->autoRender = false;
        $q = Session::read("questoes");
        if (!empty($q)) {
            echo 0;
        }
        else echo 1;
    }

    public function simuladoEmMontagem(){
        try {
            $sql = "SELECT * FROM questoes WHERE id IN(" . Session::read("questoes") . ")";
            $questoes = Model::fetch($sql);
            $this->set("dados", $questoes);
        } catch (Exception $e) {
            $this->setFlash('Ocorreu um Erro no Processamento dos Dados!');
        }
    }

    public function gerarSimulado(){
        $this->autoRender = false;
        $idSimuladoEmEdicao = Session::read("idSimuladoEmEdicao");
        
        if(empty($idSimuladoEmEdicao)){
            $questoesSimulado = Session::read("questoes");            
            if(!empty($questoesSimulado)) {
                $retorno = Model::query("INSERT INTO provas values(NULL, '$questoesSimulado', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");    
                if($retorno) {
                    echo 0;
                    Session::delete("questoes");
                } else echo 1;
            } else echo 1;            
        } 
        else {
            $questoesSimulado = Session::read("questoes");
            if(!empty($questoesSimulado)) {
                $retorno = Model::query("UPDATE provas SET questoes='$questoesSimulado', modified=CURRENT_TIMESTAMP WHERE(provas.id = $idSimuladoEmEdicao)");    
                if($retorno) {
                    echo 0;
                    Session::delete("questoes");
                    Session::delete("idSimuladoEmEdicao");
                } else echo 1;
            } else echo 1;
        }
    }

    public function saveDataInCurrentSession(){
        $this->autoRender = false;       
        
        try {
                $questoesGravadasSessao = Session::read("questoes"); // Verifica se tem dados na variavel --->

                $arrayOfQuestions = array();
                $arrayOfQuestions = explode(",", $questoesGravadasSessao);
                 
                // Faço a concatenação dos dados verificando se o valor já existe ----------------->
                if (!empty($questoesGravadasSessao)) {
                    $questoes = $questoesGravadasSessao . ",";

                    foreach($this->data["dados"] as $row) {
                        if (!in_array($row, $arrayOfQuestions)) {
                            $questoes .= $row . ",";
                        }
                    }
                } else {            
                    foreach($this->data["dados"] as $row) {
                        if (!in_array($row, $arrayOfQuestions)) {
                            $questoes .= $row . ",";
                        }
                    }            
                }
                // -------------------------------------------------------------------------------->

                
                // Removo a ultima virgula do array em seguida gravo novamente na Sessao ---------->
                $questoes = substr($questoes, 0, strlen($questoes)-1);
                Session::write("questoes", $questoes);        
                // -------------------------------------------------------------------------------->
                           
                $cadeiraID = Session::read("cadeiraID"); // Verifica qual cadeira das questoes ---->

                echo 0;                       
            }
        catch (Exception $e) {
            echo 1;           
        }                     
    }  

    public function novaQuestao(){
        Config::write("jsURL", "questoes.js");
        if(!empty($this->data)) {           
            $retorno = $this->Questoes->save($this->data);
        
            if($retorno) {
                $this->setFlash('Dados Salvos com Sucesso!');
            }
            else {
                $this->setFlash('Erro ao Salvar os Dados!\nVerifique todos os Campos do Formulário!');
            }            
        }   
        $this->set("cadeiras", Model::fetch("SELECT id, nome FROM cadeiras ORDER BY nome"));
        $this->set("respostas", Model::fetch("SELECT * FROM questoes"));
    }
    
    public function editarQuestao($id = null) {
        $options = array("conditions" => array("id" => $id));

        Config::write("jsURL", "questoes_editar.js");
        
        if(!empty($this->data)) {
            /** Completa o Array com o ID do Registro a ser Alterado */
            $this->data['id'] = $id;
            
            /** Persiste o Array no Banco de Dados e retorna o Resultado da Operação */
            $retorno = $this->Questoes->save($this->data);

            if($retorno) {
                $this->setFlash('Dados Alterados com Sucesso!');
            }
            else {
                $this->setFlash('Erro ao Salvar os Dados!\nVerifique todos os Campos do Formulário!');
            }         
        }

        $this->set("cadeiras", Model::fetch("SELECT id, nome FROM cadeiras ORDER BY nome"));
        $this->set("questao", $this->Questoes->first($options));        
        $this->set("nomeCadeira", Model::fetch("SELECT id, nome FROM cadeiras WHERE (cadeiras.id = (SELECT cadeira_id FROM questoes WHERE (questoes.id = '$id'))) ORDER BY nome"));
    }
    
    public function deletarQuestao($id = null) {
        $this->autoRender = false;
        
        $retorno = $this->Questoes->delete($id);
         
        if($retorno) {
            $this->setFlash('Dados Excluídos com Sucesso!');
        }
        else {
            $this->setFlash('Erro ao Excluir os Dados!');
        }
    }
}