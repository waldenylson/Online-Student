<?php
class AlunosController extends AppController {
		
	public $requiredLevel = 2;	
	
	public function index() {
		$this->autoRender = false;
	}
	
	public function novo()
	{
		Config::write("jsURL", "alunos.js");
					
		if (!empty($this->data)) {
				
			/* Ultima matrícula */
			$nextMatricula = Model::fetch("SELECT COUNT(*) AS 'total', MAX(matricula) AS 'matricula' FROM alunos");
			
			foreach($nextMatricula as $row)
			{				
				if ($row['total'] == 0) {
					$this->data['matricula'] = 101310000;
				}
				else {
					$this->data['matricula'] = $row['matricula'] + 1;	
				}			
			}

			/* Converte a Data para Formato Unix */
			$unixArrayDate = explode('/', $this->data['data_nascimento']);
			$unixArrayTime = explode(':', date('H:i:s', time("00:00:00")));
			
			$unixDate = mktime($unixArrayTime[0], $unixArrayTime[1], $unixArrayTime[2],
			                   $unixArrayDate[1], $unixArrayDate[0], $unixArrayDate[2]);
			                   
			$this->data['data_nascimento'] = $unixDate;
			
			
			if($this->checaCPF($this->data['cpf'], $this->data['id'])) {
				$this->setFlash('CPF já Cadastrado!');
			} else {
				$retorno = $this->Alunos->save($this->data);
			}
			
			if ($retorno) {
				$this->setFlash('Dados Salvos com Sucesso!');
			}
			else {
				$this->setFlash('Erro ao Salvar os Dados,\nVerifique os Campos do Formulário!');
			}		
		}
		
		$this->set("cursos", Model::fetch("SELECT id, nome FROM cursos ORDER BY nome"));
	}
	
	public function editar($id = null)
	{
		$options = array("conditions" => array("id" => $id));
		
		Config::write("jsURL", "alunos.js");		
		
		if (!empty($this->data)) {
			
			/** Completa o Array com o ID do Registro a ser Alterado */
            $this->data['id'] = $id;

			/* Converte a Data para Formato Unix */
			$unixArrayDate = explode('/', $this->data['data_nascimento']);
			$unixArrayTime = explode(':', date('H:i:s', time("00:00:00")));
			
			$unixDate = mktime($unixArrayTime[0], $unixArrayTime[1], $unixArrayTime[2],
			                   $unixArrayDate[1], $unixArrayDate[0], $unixArrayDate[2]);
			                   
			$this->data['data_nascimento'] = $unixDate;
			
			//$retorno = $this->Alunos->save($this->data);
			if($this->checaCPF($this->data['cpf'], $this->data['id'])) {
				$this->setFlash('CPF já Cadastrado!');
			} else {
				$retorno = $this->Alunos->save($this->data);
			}			
			
			if ($retorno) {
				$this->setFlash('Dados Salvos com Sucesso!');
			}
			else {
				$this->setFlash('Erro ao Salvar os Dados,\nVerifique os Campos do Formulário!');
			}		
		}		
		
		$this->set("aluno", $this->Alunos->first($options));
		
		$this->set("estados",   Model::fetch("SELECT uf       FROM estados WHERE (estados.uf NOT IN (SELECT uf       FROM alunos WHERE (alunos.id = '$id'))) ORDER BY uf  "));
		$this->set("cursos",    Model::fetch("SELECT id, nome FROM cursos  WHERE (cursos.id  NOT IN (SELECT curso_id FROM alunos WHERE (alunos.id = '$id'))) ORDER BY nome"));
		$this->set("nomeCurso", Model::fetch("SELECT id, nome FROM cursos  WHERE (cursos.id  =      (SELECT curso_id FROM alunos WHERE (alunos.id = '$id'))) ORDER BY nome"));
		
	}
	
	public function deletar($id = null)
	{
		$this->autoRender = false;		
		
		$retorno = $this->Alunos->delete($id);
		
		if ($retorno) {
			$this->setFlash('Registro Excluído com Sucesso!');
		}
		else {
			$this->setFlash('Erro ao Excluir os Dados!');
		}		
	}
	
	public function createAlunoLogin($alunoID = null)
	{
		$this->autoRender = false;		
		
		$options   = array("conditions" => array("id" => $alunoID));	
		$aluno     = $this->Alunos->first($options);
		$matricula = $aluno['matricula'];
		$retorno   = Model::query("INSERT INTO login_aluno VALUES ('{$alunoID}', '{$matricula}')");
		
		if ($retorno) {
			$this->setFlash('Login criado com Sucesso!!');
		}
		else {
			$this->setFlash('Erro na Criação do Login!');
		}
	}
	
	private function checaCPF($value = null, $id = null) {
		$valida = Model::fetch("SELECT COUNT(*) AS 'existe', alunos.id FROM alunos WHERE(alunos.cpf = '$value')");
		
		foreach($valida as $row) {
			if($row['existe'] > 0 && ($value <> '' && $value <> null) && ($row['id'] <> $id) ) {
				return true;
			} else {
				return false;
			}
		}	
	}
	
	
}