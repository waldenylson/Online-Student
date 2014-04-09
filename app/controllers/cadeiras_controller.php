<?php ob_start();
class CadeirasController extends AppController {
	
	public $requiredLevel = 2;
	
	public function index() {
        $this->autoRender = false;
    }
	
	public function novo()
    {
        Config::write("jsURL", "cadeiras.js");
    	
    	if(!empty($this->data)) {
    		
            $retorno = $this->Cadeiras->save($this->data);

            if($retorno) {
            	$this->setFlash('Dados Salvos com Sucesso!');
            }
            else {
            	$this->setFlash('Erro ao Salvar os Dados!\nVerifique todos os Campos do Formulário!');
            }            
        }
    }
     
    public function editar($id = null)
    {
        $options = array("conditions" => array("id" => $id));

        Config::write("jsURL", "cadeiras.js");
        
        if(!empty($this->data))
        {
        	/** Completa o Array com o ID do Registro a ser Alterado */
            $this->data['id'] = $id;
            
        	/** Persiste o Array no Banco de Dados e retorna o Resultado da Operação */
            $retorno = $this->Cadeiras->save($this->data);

            if($retorno) {
                $this->setFlash('Dados Alterados com Sucesso!');
            }
            else {
            	$this->setFlash('Erro ao Salvar os Dados!\nVerifique todos os Campos do Formulário!');
            }         
        }
        
        $this->set("cadeira", $this->Cadeiras->first($options));
    }
     
    public function deletar($id = null)
    {
        $this->autoRender = false;
        
        $retorno = $this->Cadeiras->delete($id);
         
        if($retorno) {
        	$this->setFlash('Dados Excluídos com Sucesso!');
        }
        else {
            $this->setFlash('Erro ao Excluir os Dados!');
        }
    }
}
?>