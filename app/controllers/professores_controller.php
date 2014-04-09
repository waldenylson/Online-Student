<?php 
class ProfessoresController extends AppController {
	
	public $requiredLevel = 2;
	
	public function index(){
		$this->autoRender = false;
	}
	
	public function novo()
	{
		Config::write("jsURL", "professor.js");
		
		if (!empty($this->data)) {

			/* Converte a Data para Formato Unix */
			$unixArrayDate = explode('/', $this->data['data_nascimento']);
			$unixArrayTime = explode(':', date('H:i:s', time("00:00:00")));
			
			$unixDate = mktime($unixArrayTime[0], $unixArrayTime[1], $unixArrayTime[2],
			                   $unixArrayDate[1], $unixArrayDate[0], $unixArrayDate[2]);
			                   
			$this->data['data_nascimento'] = $unixDate;
			
			if($this->checaCPF($this->data['cpf'], $this->data['id'])) {
				$this->setFlash('CPF já Cadastrado!');
			} else {
				$retorno = $this->Professores->save($this->data);
			}
			
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
					
		Config::write("jsURL", "professor.js");
		
		if (!empty($this->data)) {
			
			/** Completa o Array com o ID do Registro a ser Alterado */
            $this->data['id'] = $id;

			/* Converte a Data para Formato Unix */
			$unixArrayDate = explode('/', $this->data['data_nascimento']);
			$unixArrayTime = explode(':', date('H:i:s', time("00:00:00")));
			
			$unixDate = mktime($unixArrayTime[0], $unixArrayTime[1], $unixArrayTime[2],
			                   $unixArrayDate[1], $unixArrayDate[0], $unixArrayDate[2]);
			                   
			$this->data['data_nascimento'] = $unixDate;
			
			if($this->checaCPF($this->data['cpf'], $this->data['id'])) {
				$this->setFlash('CPF já Cadastrado!');
			} else {
				$retorno = $this->Professores->save($this->data);
			}
			
			if ($retorno) {
				$this->setFlash('Dados Salvos com Sucesso!');
			}
			else{
				$this->setFlash('Erro ao Salvar os Dados,\nVerifique os Campos do Formulário!');
			}
		}
		
		$this->set("professor", $this->Professores->first($options));
		$this->set("estados", Model::fetch("SELECT uf FROM estados WHERE estados.uf NOT IN (SELECT uf FROM professores WHERE professores.id = '$id')"));
	}
	
	public function deletar($id = null)
	{
		$this->autoRender = false;		
		
		$retorno = $this->Professores->delete($id);
		
		if ($retorno) {
			$this->setFlash('Registro Excluído com Sucesso!');
		}else{
			$this->setFlash('Erro ao Excluir os Dados!');
		}		
	}
	
	private function checaCPF($value = null, $id = null) {
		$valida = Model::fetch("SELECT COUNT(*) AS 'existe', professores.id FROM professores WHERE(professores.cpf = '$value')");
		
		foreach($valida as $row) {
			if($row['existe'] > 0 && ($value <> '' && $value <> null) && ($row['id'] <> $id) ) {
				return true;
			} else {
				return false;
			}
		}	
	}
	
}