<?php
class PrincipalController extends AppController {

	public    $uses          = array();
	protected $requiredLevel = 1;	
	public    $layout        = "principal";
	
	public function index() {
		//$this->autoRender = false;
		//echo Session::read("nivelUsuario");		
	}
	
	public function mostrarNotas() {
		$matricula = Session::read("matricula");
		$this->set("notas", $this->getNotas());
		$this->set("aluno",  Model::fetch("SELECT a.id, a.nome as 'name', c.nome FROM alunos a, cursos c WHERE( (a.curso_id = c.id) AND (a.matricula = '$matricula') ) ORDER BY c.nome"));
		$this->set("medias", Model::fetch("SELECT AVG(notas.nota) as 'media', notas.cadeira_id FROM notas WHERE notas.aluno_id = (SELECT id FROM alunos WHERE(alunos.matricula = '$matricula')) GROUP BY notas.cadeira_id ORDER BY cadeira_id"));
	}
	
	private function getNotas() {
		$matricula = Session::read("matricula");
		$this->matriculaAluno = $matricula;
		$data = Model::fetch("SELECT * FROM notas INNER JOIN cadeiras ON cadeiras.id = notas.cadeira_id  WHERE notas.aluno_id = (SELECT id FROM alunos WHERE(alunos.matricula = '$matricula')) ORDER BY cadeiras.nome");
		return $data;		
	}

	public function boletoDownload($matricula = null) {
		$this->autoRender = false;
		$boleto = Model::fetch("SELECT alunos.boleto FROM alunos WHERE alunos.matricula = $matricula");

		header("Content-type: application/pdf");
		echo $boleto[0]["boleto"];
	}	
}