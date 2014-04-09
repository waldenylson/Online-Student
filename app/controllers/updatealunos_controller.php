<?php
class UpdateAlunosController extends AppController {
	
	public    $uses          = array();
	protected $requiredLevel = 1;

	public function index() {
		$this->setAction("atualizarSenhaAluno");
	}
	
	public function atualizarSenhaAluno() {
		$layout        = "";
		Config::write("jsURL", "alunoSenha.js");		
		if(!empty($this->data)) {
			$matricula = Session::read("matricula");
			$this->updatePassword($matricula);
		}
	}
	
	private function updatePassword($matricula = null) {
		
		$alunoID = Model::fetch("SELECT alunos.id FROM alunos WHERE( alunos.matricula = '$matricula')");				
		$alunoID = $alunoID[0]['id'];
		$retorno = Model::query("UPDATE login_aluno SET senha='{$this->data['senha']}', modified=CURRENT_TIMESTAMP WHERE (aluno_id = '$alunoID')");
		
		if ($retorno) {
			$this->setFlash('Dados Salvos com Sucesso!');
		}
		else {
			$this->setFlash('Erro ao Salvar os Dados,\nVerifique os Campos do Formulário!');
		}		
	}	
}