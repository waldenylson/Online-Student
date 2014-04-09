<?php
class CursosController extends AppController {

    public $requiredLevel = 2;
	
	public function index() {
        $this->autoRender = false;
    }

    public function novo()
    {
        Config::write("jsURL", "cursos.js");
    	
    	if(!empty($this->data)) {
            
        	$retorno = $this->Cursos->save($this->data);
        	
        	if($retorno) {
            	$this->setFlash('Dados Cadastrados com Sucesso!');
            }
            else {
            	$this->setFlash('Erro ao Salvar os Dados!\nVerifique todos os Campos do Formulário!');
            }            
        }
    }

    public function editar($id = null)
    {
        Config::write("jsURL", "cursos.js");
    	
    	$options = array("conditions" => array("id" => $id));

        if(!empty($this->data))
        {
            /** Completa o Array com o ID do Registro a ser Alterado */
            $this->data['id'] = $id;
            
        	$retorno = $this->Cursos->save($this->data);

            if($retorno) {
            	$this->setFlash('Dados Alterados com Sucesso!');
            }
            else {
            	$this->setFlash('Erro ao Salvar os Dados!\nVerifique todos os Campos do Formulário!');
            }            
        }
        
        $this->set("curso", $this->Cursos->first($options));
    }

    public function deletar($id = null)
    {
        $this->autoRender = false;
        
        $retorno = $this->Cursos->delete($id);

        if($retorno) {
            $this->setFlash('Dados Excluídos com Sucesso!');
        }
        else {
            $this->setFlash('Erro ao Excluir os Dados!');
        }
    }

}