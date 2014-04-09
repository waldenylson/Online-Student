<?php
class CrachaController extends AppController {

	public $requiredLevel = 2;
	public $layout = "";
	public $uses   = array();	
	
	public function index() {
		$this->autoRender = false;
	}
	
	public function geraCodigoBarra($codigo = null) {
		$this->autoRender = false;				
	}
	
	public function gerarCracha($matricula = null) {		
		$this->set("matricula", $matricula);
		$this->set("nome", Model::fetch("SELECT nome FROM alunos WHERE(alunos.matricula = '$matricula')"));
		$this->set("curso", Model::fetch("SELECT cursos.nome FROM cursos, alunos WHERE(cursos.id = alunos.curso_id) AND (alunos.matricula = '$matricula')"));		
	
		Session::write("codigoBarra", $matricula);		
	}
	
	public static function barras($codigo = null, $altura = "80") {
		// verifica se o comprimento é par, caso contrário, adiciona um zero no início
		if ((strlen($codigo)/2)!=intval(strlen($codigo)/2)) {
			$codigo = "0".$codigo;
		}
		
		// cada número do código é representado por cinco barras. o valor '2' representa uma barra fina. o valor '4' representa uma barra grossa
		$barra = array("22442","42224","24224","44222","22424","42422","24422","22244","42242","24242");
		
		// lê cada dígito do código a ser gerado, e monta o código a partir da array $barra
		$comprimento = strlen($codigo);
		$aux = 0;
		
		while($aux<$comprimento) {
			$indice = $codigo{$aux};
			$codigo2 = $codigo2.$barra[$indice];
			$aux = $aux + 1;
		}
		
		// entrelaça o código
		$aux = 0;
		
		while($aux<($comprimento*5)) {
			$codigo3 = $codigo3.$codigo2{$aux}.$codigo2{$aux+5}.$codigo2{$aux+1}.$codigo2{$aux+6}.$codigo2{$aux+2}.$codigo2{$aux+7}.$codigo2{$aux+3}.$codigo2{$aux+8}.$codigo2{$aux+4}.$codigo2{$aux+9};
			$aux = $aux + 10;
		}
		
		// adiciona os códigos de início e final
		$codigofinal = "2222".$codigo3."422";

		// monta o código de barras, usando divs como barras
		$comprimento = strlen($codigofinal);
		
		$aux = 0;
		
		while($aux<$comprimento) {
			echo '<div style="position: relative; float: left; width:'.$codigofinal{$aux}.'px; height: '.$altura.'px; background-color: #000000;"></div><div style="position: relative; float: left; width:'.$codigofinal{$aux+1}.'px; height: '.$altura.'px; background-color: #ffffff;"></div>';
			$aux = $aux + 2;
		}
	}
}