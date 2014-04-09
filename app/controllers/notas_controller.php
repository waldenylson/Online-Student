<?php
class NotasController extends AppController {
	
    public $requiredLevel = 2;
	
	private $id      = null;
    private $IDaluno = null;

    public function index($alunoID = null) {
        Config::write("jsURL", "notas.js");    	
		
        if(!empty($this->data)) {
            $this->IDaluno = $this->data['aluno_id'];            
			$this->novo();
        }
        $this->set("aluno",    Model::fetch("SELECT id, nome FROM alunos   WHERE (alunos.id = '$alunoID' )"));
        $this->set("cadeiras", Model::fetch("SELECT id, nome FROM cadeiras WHERE (cadeiras.id IN (SELECT cadeira_id FROM cadeiras_cursos WHERE (cadeiras_cursos.curso_id = (SELECT curso_id FROM alunos WHERE (alunos.id = '$alunoID')) ) ) ) ORDER BY nome"));
    }

    private function novo() {
        $retorno = $this->Notas->save($this->data);
		
        if($retorno) {
            $this->setFlash('Dados Salvos com Sucesso!');            
        }
        else {
            $this->setFlash('Erro ao Salvar os Dados!\nVerifique todos os Campos do Formulário!');            
        }
    }

    public function editar($id = null) {        
		$options = array("conditions" => array("id" => $id));
		Config::write("jsURL", "notas_editar.js");    	
		
        if(!empty($this->data)) {            
			/** Completa o Array com o ID do Registro a ser Alterado */
			$this->data['id'] = $id;			
			
			$retorno = $this->Notas->save($this->data);
			//pr($this->data);
			if($retorno) {
				$this->setFlash('Dados Alterados com Sucesso!');
			}
			else {
				$this->setFlash('Erro ao Salvar os Dados!\nVerifique todos os Campos do Formulário!');
			}		
        }
        $this->set("nota", $this->Notas->first($options));
		
		$this->set("aluno",    Model::fetch("SELECT id, nome FROM alunos   WHERE (alunos.id = (SELECT aluno_id FROM notas WHERE notas.id = '$id') )"));
        $this->set("cadeira",  Model::fetch("SELECT id, nome FROM cadeiras WHERE (cadeiras.id = (SELECT cadeira_id FROM notas WHERE (notas.id = '$id')))"));	
	}

	public function deletar($id = null) {
		
		$this->autoRender = false;		
		
		$retorno = $this->Notas->delete($id);
		
		if ($retorno) {
			$this->setFlash('Registro Excluído com Sucesso!');
			$this->boxClose();
		}
		else {
			$this->setFlash('Erro ao Excluir os Dados!');
		}		
	}
}
