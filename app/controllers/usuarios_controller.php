<?php
class UsuariosController extends AppController {
	
	public $requiredLevel = 3;
	
	public function index(){
		$this->autoRender = false;
	}
	
	public function novo()
	{
		Config::write("jsURL", "usuario.js");
		
		if (!empty($this->data)) {

			/* Converte a Data para Formato Unix */
			$unixArrayDate = explode('/', $this->data['data_nascimento']);
			$unixArrayTime = explode(':', date('H:i:s', time("00:00:00")));
			
			$unixDate = mktime($unixArrayTime[0], $unixArrayTime[1], $unixArrayTime[2],
			                   $unixArrayDate[1], $unixArrayDate[0], $unixArrayDate[2]);
			                   
			$this->data['data_nascimento'] = $unixDate;
			
			$retorno = $this->Usuarios->save($this->data);
			
			if ($retorno) {
				$this->setFlash('Dados Salvos com Sucesso!');
			}
			else{
				$this->setFlash('Erro ao Salvar os Dados,\nVerifique os Campos do Formulário!');
			}
		}	
	}
	
	public function editar($id = null)
	{
		$options = array("conditions" => array("id" => $id));		
					
		Config::write("jsURL", "usuario.js");
		
		if (!empty($this->data)) {
			
			/** Completa o Array com o ID do Registro a ser Alterado */
            $this->data['id'] = $id; 
			
			/* Converte a Data para Formato Unix */
			$unixArrayDate = explode('/', $this->data['data_nascimento']);
			$unixArrayTime = explode(':', date('H:i:s', time("00:00:00")));
			
			$unixDate = mktime($unixArrayTime[0], $unixArrayTime[1], $unixArrayTime[2],
			                   $unixArrayDate[1], $unixArrayDate[0], $unixArrayDate[2]);
			                   
			$this->data['data_nascimento'] = $unixDate;
			
			$retorno = $this->Usuarios->save($this->data);
			
			if ($retorno) {
				$this->setFlash('Dados Salvos com Sucesso!');
			}
			else{
				$this->setFlash('Erro ao Salvar os Dados,\nVerifique os Campos do Formulário!');
			}
		}
		
		$this->set("usuario", $this->Usuarios->first($options));
		$this->set("estados", Model::fetch("SELECT uf FROM estados WHERE estados.uf NOT IN (SELECT uf FROM professores WHERE professores.id = '$id')"));
	}
	
	public function deletar($id = null)
	{
		$this->autoRender = false;		
		
		$retorno = $this->Usuarios->delete($id);
		
		if ($retorno) {
			$this->setFlash('Registro Excluído com Sucesso!');
		}else{
			$this->setFlash('Erro ao Excluir os Dados!');
		}		
	}
	
	public function novoLogin($usuarioID = null)
	{
		if(!empty($this->data)) {			
			$this->updateLogin($usuarioID);			
		}
		
		Config::write("jsURL", "createLoginUser.js");
		$this->set("usuarioID", $usuarioID);
	}
	
	private function createLogin($usuarioID = null)
	{		
		$retorno = Model::query("INSERT INTO login_usuario VALUES ('$usuarioID', '$this->data['login']', '$this->data['senha']', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");		
		
		if ($retorno) {
			$this->setFlash('Dados Salvos com Sucesso!');
		}
		else {
			$this->setFlash('Erro ao Salvar os Dados,\nVerifique os Campos do Formulário!');			
		}
	}
	
	private function updateLogin($usuarioID = null) 
	{		
		$retorno = Model::query("UPDATE login_usuario SET login='{$this->data['login']}', senha='{$this->data['senha']}', modified=CURRENT_TIMESTAMP WHERE (usuario_id = '$usuarioID')");
		
		if ($retorno) {
			$this->setFlash('Dados Salvos com Sucesso!');
		}
		else {
			$this->setFlash('Erro ao Salvar os Dados,\nVerifique os Campos do Formulário!');
		}		
	}	

	private function canFindUser($userID = null) {		
		$retorno = Model::fetch("SELECT COUNT(*) FROM login_usuario WHERE(login_usuario.usuario_id = '$userID')");		
		if(!empty($retorno['COUNT(*)'])) return true; else return false;
	}		
}