<?php
class CadeirasCursosController extends AppController {
	
    public $requiredLevel = 2;
	
	public function index () {
        $this->autoRender = false;
    }
    
    public function novo ()
    {
        if (!empty($this->data)) {
        	
            $retorno = $this->CadeirasCursos->save($this->data);

            if ($retorno) {
                $this->setFlash('Dados Salvos com Sucesso!');
            }
            else {
                $this->setFlash('Erro ao Salvar os Dados!\nVerifique todos os Campos do Formulário!');
            }
        }

        $this->set("cadeiras", Model::fetch('SELECT id, nome FROM cadeiras ORDER BY nome'));
        $this->set("cursos",   Model::fetch('SELECT id, nome FROM cursos   ORDER BY nome'));
    }

    public function editar ($id = null)
    {
        $options = array("conditions" => array("id" => $id));

        if (!empty($this->data)) {
        	
            /** Completa o Array com o ID do Registro a ser Alterado */
            $this->data['id'] = $id;

            $retorno = $this->CadeirasCursos->save($this->data);

            if($retorno) {
                $this->setFlash('Dados Alterados com Sucesso!');
            }
            else {
                $this->setFlash('Erro ao Salvar os Dados!\nVerifique todos os Campos do Formulário!');
            }
        }
        
        $this->set("relacao", $this->CadeirasCursos->first($options));

        $this->set("nomeCadeira", Model::fetch('SELECT id, nome FROM cadeiras WHERE (cadeiras.id = (SELECT cadeira_id FROM cadeiras_cursos WHERE cadeiras_cursos.id =' . $id . ')) ORDER BY nome'));
        $this->set("nomeCurso",   Model::fetch('SELECT id, nome FROM cursos   WHERE (cursos.id   = (SELECT curso_id   FROM cadeiras_cursos WHERE cadeiras_cursos.id =' . $id . ')) ORDER BY nome'));

        $this->set("cadeiras", Model::fetch('SELECT id, nome FROM cadeiras WHERE (cadeiras.id NOT IN (SELECT cadeira_id FROM cadeiras_cursos WHERE cadeiras_cursos.id =' . $id . ')) ORDER BY nome'));
        $this->set("cursos",   Model::fetch('SELECT id, nome FROM cursos   WHERE (cursos.id   NOT IN (SELECT curso_id   FROM cadeiras_cursos WHERE cadeiras_cursos.id =' . $id . ')) ORDER BY nome'));
    }

    public function deletar ($id = null)
    {
        $this->autoRender = false;

        $retorno = $this->CadeirasCursos->delete($id);

        if($retorno) {
            $this->setFlash('Dados Excluídos com Sucesso!');
        }
        else {
            $this->setFlash('Erro ao Excluir os Dados!');
        }
    }
}