<?php 
class ProfessoresCadeirasController extends AppController {
	
	public $requiredLevel = 2;
	
	public function index(){
		$this->autoRender = false;
	}
	
	public function novo()
	{
		if (!empty($this->data)) {
			
			$retorno = $this->ProfessoresCadeiras->save($this->data);
			
			if ($retorno) {
				$this->setFlash('Dados Salvos com Sucesso!');
			}
			else {
				$this->setFlash('Erro ao Salvar os Dados!\nVerifique todos os Campos do Formulário!');
			}
		}
		
		$this->set("professores", Model::fetch("SELECT id, nome FROM professores ORDER BY nome"));
		$this->set("cadeiras",    Model::fetch("SELECT id, nome FROM cadeiras    ORDER BY nome"));
	}
	
	public function editar($id = null)
	{
		$options = array("conditions" => array("id" => $id));
		
		if (!empty($this->data)) {
			
			/** Completa o Array com o ID do Registro a ser Alterado */
            $this->data['id'] = $id;
			
			$retorno = $this->ProfessoresCadeiras->save($this->data);
			
			if ($retorno) {
				$this->setFlash('Dados Salvos com Sucesso!');
			}
			else {
				$this->setFlash('Erro ao Salvar os Dados!\nVerifique todos os Campos do Formulário!');
			}
		}
		
		$this->set("relacao", $this->ProfessoresCadeiras->first($options));
		
		$this->set("nomeCadeira",   Model::fetch('SELECT id, nome FROM cadeiras      WHERE (cadeiras.id    = (SELECT cadeira_id   FROM professores_cadeiras WHERE professores_cadeiras.id =' . $id . ')) ORDER BY nome'));
        $this->set("nomeProfessor", Model::fetch('SELECT id, nome FROM professores   WHERE (professores.id = (SELECT professor_id FROM professores_cadeiras WHERE professores_cadeiras.id =' . $id . ')) ORDER BY nome'));
		
		$this->set("cadeiras",    Model::fetch('SELECT id, nome FROM cadeiras    WHERE (cadeiras.id    NOT IN (SELECT cadeira_id   FROM professores_cadeiras WHERE professores_cadeiras.id =' . $id . ')) ORDER BY nome'));
        $this->set("professores", Model::fetch('SELECT id, nome FROM professores WHERE (professores.id NOT IN (SELECT professor_id FROM professores_cadeiras WHERE professores_cadeiras.id =' . $id . ')) ORDER BY nome'));
	}
	
	public function deletar($id = null)
	{
		$this->autoRender = false;

		$retorno = $this->ProfessoresCadeiras->delete($id);
		
		if ($retorno) {
			$this->setFlash('Dados Excluídos com Sucesso!');			
		}
		else {
			$this->setFlash('Erro ao Excluir os Dados!');
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
}