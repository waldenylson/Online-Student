<?php
class AdminController extends AppController {
	
	public $requiredLevel = 2;
	
	public $uses   = array();
	public $layout = "admin";
	
	public function index() {
		//$this->autoRender = false;
	}
	
	public function phpinfo(){
		$this->autoResnder = false;
		echo phpinfo();
	}
	
	public function pesquisarAlunos() {		
		if(!empty($this->data)) {
			$alunoNome = $this->data['keyword'];
			$data = Model::fetch("SELECT a.id, a.matricula, a.nome, a.curso_id, a.cidade, c.nome as 'curso' FROM alunos a, cursos c WHERE(a.nome LIKE '%$alunoNome%') AND (a.curso_id = c.id) ORDER BY a.nome, c.nome, a.cidade");
			$this->set("dados", $data);
		}
	}
	
	public function pesquisarAlunosByMatricula() {		
		if(!empty($this->data)) {
			//pr($this->data);
			$matricula = $this->data['keyword'];
			$data = Model::fetch("SELECT a.id, a.matricula, a.nome, a.curso_id, a.cidade, c.nome as 'curso' FROM alunos a, cursos c WHERE(a.matricula = '$matricula') AND (a.curso_id = c.id) ORDER BY a.nome");
			$this->set("dados", $data);
		}
	}
	
	public function pesquisarProfessores() {		
		if(!empty($this->data)) {
			$professorNome = $this->data['keyword'];
			$data = Model::fetch("SELECT * FROM professores WHERE(professores.nome LIKE '%$professorNome%') ORDER BY professores.nome");
			$this->set("dados", $data);
		}
	}
	
	public function pesquisarCursos() {		
		if(!empty($this->data)) {
			$cursoNome = $this->data['keyword'];
			$data = Model::fetch("SELECT * FROM cursos WHERE(cursos.nome LIKE '%$cursoNome%') ORDER BY cursos.nome");
			$this->set("dados", $data);
		}
	}
	
	public function pesquisarCadeiras() {		
		if(!empty($this->data)) {
			$cadeiraNome = $this->data['keyword'];
			$data = Model::fetch("SELECT * FROM cadeiras WHERE(cadeiras.nome LIKE '%$cadeiraNome%') ORDER BY cadeiras.nome");
			$this->set("dados", $data);
		}
	}
	
	public function pesquisarRelacaoCadeiraCurso() {		
		if(!empty($this->data)) {
			$cursoNome = $this->data['keyword'];
			$data = Model::fetch("SELECT cc.id, c.nome AS 'cursoNome', cd.nome AS 'cadeiraNome' FROM cadeiras_cursos cc, cursos c, cadeiras cd WHERE( (cd.id = cc.cadeira_id) AND (c.id = cc.curso_id) AND (c.nome LIKE '%$cursoNome%') ) ORDER BY c.nome, cd.nome");
			$this->set("dados", $data);
		}	
	}
	
	public function pesquisarRelacaoCadeiraProfessor() {		
		if(!empty($this->data)) {
			$professorNome = $this->data['keyword'];
			$data = Model::fetch("SELECT pc.id, p.nome AS 'professorNome', cd.nome AS 'cadeiraNome' FROM professores_cadeiras pc, professores p, cadeiras cd WHERE( (cd.id = pc.cadeira_id) AND (p.id = pc.professor_id) AND (p.nome LIKE '%$professorNome%') ) ORDER BY p.nome, cd.nome");
			$this->set("dados", $data);
		}	
	}
	
	public function pesquisarUsuario(){
		if(!empty($this->data)) {
			$usuarioNome = $this->data['keyword'];
			$data = Model::fetch("SELECT * FROM usuarios WHERE(usuarios.nome LIKE '%$usuarioNome%') ORDER BY usuarios.nome");
			$this->set("dados", $data);
		}
	}
	
	public function pesquisarQuestoes(){
		if(!empty($this->data)){
			$enunciado = $this->data["keyword"];
			$data = Model::fetch("SELECT questoes.id, questoes.enunciado, questoes.pontuacao, cadeiras.nome as 'nomeCadeira' FROM questoes, cadeiras WHERE(questoes.enunciado LIKE '%$enunciado%' AND questoes.cadeira_id = cadeiras.id) ORDER BY questoes.enunciado, cadeiras.nome");
			$this->set("dados", $data);
		}
	}
	
	public function listarAlunos() {		
		$data = Model::fetch("SELECT a.nome, a.matricula, a.cidade, c.nome as 'nomeCurso' FROM alunos a, cursos c WHERE(a.curso_id = c.id)  ORDER BY a.curso_id ASC");
		$this->set("dados", $data);		
	}
	
	public function aniversariantesMes() {		
		$data = Model::fetch("SELECT a.nome, a.matricula, a.cidade, a.data_nascimento, c.nome as 'nomeCurso' FROM alunos a, cursos c WHERE(MONTH(FROM_UNIXTIME(data_nascimento)) = MOD(MONTH(CURDATE()), 12) AND (a.curso_id = c.id) ) ORDER BY a.curso_id, a.nome, a.cidade ASC");
		$this->set("dados", $data);		
	}
	
	public function aniversariantesDia() {		
		$data = Model::fetch("SELECT a.nome, a.matricula, a.cidade, a.data_nascimento, c.nome as 'nomeCurso' FROM alunos a, cursos c WHERE(MONTH(FROM_UNIXTIME(data_nascimento)) = MOD(MONTH(CURDATE()), 12) AND DAY(FROM_UNIXTIME(data_nascimento)) = DAY(CURDATE()) AND a.curso_id = c.id ) ORDER BY a.curso_id, a.nome, a.cidade ASC");
		$this->set("dados", $data);		
	}
	 
	public function listarProfessor() {		
		$data = Model::fetch("SELECT * FROM professores LIMIT 0, 1000");
		$this->set("dados", $data);		
	}
	
		 
	public function listarCadeiras() {		
		$data = Model::fetch("SELECT * FROM cadeiras LIMIT 0, 1000");
		$this->set("dados", $data);		
	}
	
	public function listarCursos() {		
		$data = Model::fetch("SELECT * FROM cursos LIMIT 0, 1000");
		$this->set("dados", $data);		
	}
	
	public function listarAlunosByCurso($curso = null) {		
		$data = Model::fetch("SELECT a.id, a.matricula, a.nome, a.curso_id, a.cidade, c.nome as 'curso' FROM alunos a, cursos c WHERE(a.curso_id = c.id AND c.id = '$curso') ORDER BY a.nome, c.nome, a.cidade");
		$this->set("dados", $data);		
	}
	
	public function usersLogedNow(){
		$data = Model::fetch("SELECT * FROM usuarios_logados");
		$this->set("dados", $data);
	}
	
	public function execSQL(){
		if(!empty($this->data)){			
			if(strtoupper(substr($this->data["sql"], 0, 6)) == "SELECT") {
				$sql = $this->data["sql"];
				$data = Model::fetch($sql);
				$this->set("dados", $data);
			}else {
				$this->setFlash("Somente Consultas são Permitidas!");
			}
			
		}
	}
	
	/* Atualisar Notas  -----------------------------*/
	public function mostrarNotas($matriculaAluno = null) {
		$matricula = $matriculaAluno;
		$this->set("notas", $this->getNotas($matricula));
		$this->set("aluno",  Model::fetch("SELECT a.id, a.matricula, a.nome as 'name', c.nome FROM alunos a, cursos c WHERE( (a.curso_id = c.id) AND (a.matricula = '$matricula') ) ORDER BY c.nome"));
		$this->set("medias", Model::fetch("SELECT AVG(notas.nota) as 'media', notas.cadeira_id FROM notas WHERE notas.aluno_id = (SELECT id FROM alunos WHERE(alunos.matricula = '$matricula')) GROUP BY notas.cadeira_id ORDER BY cadeira_id"));
	}
	
	private function getNotas($matriculaAluno = null) {
		$matricula = $matriculaAluno;
		$this->matriculaAluno = $matricula;
		$data = Model::fetch("SELECT notas.id AS 'notaID', notas.aluno_id, notas.cadeira_id, notas.nota, cadeiras.nome, cadeiras.id AS 'cadeiraID' FROM notas INNER JOIN cadeiras ON cadeiras.id = notas.cadeira_id  WHERE notas.aluno_id = (SELECT id FROM alunos WHERE(alunos.matricula = '$matricula')) ORDER BY cadeiras.nome");
		return $data;		
	}
	/* --------------------------------------------------- */

	/* Deletar Notas  -----------------------------*/
	public function mostrarNotasDeletar($matriculaAluno = null) {
		$matricula = $matriculaAluno;
		$this->set("notas", $this->getNotas($matricula));
		$this->set("aluno",  Model::fetch("SELECT a.id, a.matricula, a.nome as 'name', c.nome FROM alunos a, cursos c WHERE( (a.curso_id = c.id) AND (a.matricula = '$matricula') ) ORDER BY c.nome"));
		$this->set("medias", Model::fetch("SELECT AVG(notas.nota) as 'media', notas.cadeira_id FROM notas WHERE notas.aluno_id = (SELECT id FROM alunos WHERE(alunos.matricula = '$matricula')) GROUP BY notas.cadeira_id ORDER BY cadeira_id"));
	}
	/* --------------------------------------------------- */
	
	/*----------------------------------------------------*/
	public function autosuggestion(){
		$this->autoRender = false;		
		$query            = $_GET["query"];

		$counter          = '0';

		echo "{";

		echo "query:'$query',";

		echo "suggestions:[";

		
		$result = Model::fetch("SELECT nome FROM alunos WHERE nome LIKE '$query%' ORDER BY nome DESC");
		
		foreach($result as $row) {
		
			$counter++;

			if ($counter > 1) {
				echo ",";
			}

			$name = $row["nome"];
			echo "'$name'";				
		}
		echo "]}";
	}
	
	public function autosuggestionNew(){
			$this->autoRender = false;		
			$query            = $_GET["query"];

			$counter          = '0';

			echo "{";

			echo "query:'$query',";

			echo "suggestions:[";


			$result = Model::fetch("SELECT enunciado FROM questoes WHERE enunciado LIKE '$query%' ORDER BY enunciado DESC");

			foreach($result as $row) {

				$counter++;

				if ($counter > 1) {
					echo ",";
				}

				$name = $row["enunciado"];
				echo "'$name'";				
			}
			echo "]}";
		}	
	/*----------------------------------------------------*/
	
	/* Upload e Download dos Boletos em PDF -------------------------*/
	public function boletoUpload($matricula = null) {
		$this->set("matricula", $matricula);

		if($_FILES["boleto"]["error"] == 0) {
			$tmpName    = $_FILES["boleto"]["tmp_name"];
			$nome       = $_FILES["boleto"]["name"];
			$tamanho    = $_FILES["boleto"]["size"];

			if(!empty($_FILES["boleto"])) {				
				if($_FILES["boleto"]["type"] == "application/pdf") {					
					$fp       = fopen($tmpName, "rb");
 					$conteudo = fread($fp, $tamanho);
 					$conteudo = addslashes($conteudo);

					fclose($fp);

					$sql = "UPDATE alunos SET alunos.boleto = " . "'" . $conteudo . "'" . "WHERE alunos.matricula = $matricula";

					$retorno = Model::query($sql);

					if($retorno) {
						$this->setFlash("Arquivo Carregado com Sucesso!");
					} else {
						$this->setFlash("Erro ao Carregar o Arquivo!");
					}
				} else {
					$this->setFlash("Formato de Arquivo Inválido!\\nEscolha um Arquivo PDF!");
				}
			}
		}
	} 

	public function boletoDownload($matricula = null) {
		$this->autoRender = false;
		$boleto = Model::fetch("SELECT alunos.boleto FROM alunos WHERE alunos.matricula = $matricula");

		header("Content-type: application/pdf");
		echo $boleto[0]["boleto"];
	}	
	/*----------------------------------------------------*/
	
}
