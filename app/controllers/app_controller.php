<?php
/**
 *  AppController é o controller usado como base para todos os outros controllers
 *  da aplicação. Estando na biblioteca, é utilizado somente quando não há outro
 *  AppController definido pelo usuário.
 *
 *  @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 *  @copyright Copyright 2008-2009, Spaghetti* Framework (http://spaghettiphp.org/)
 *
 */

class AppController extends Controller {
	/**
     *  Método utilizado para passar uma mensagem rápida ao usuário
     *  para o mesmo ter um feedback do processo que foi executado
     *  @param $string String com a mensagem a ser passada ao usuário
     */
    public static function setFlash($string = null) {
        echo("<script>");
        echo("alert('" . $string . "')" . ";");
        echo("</script>");
    }

    public static function redir($path = null) {
        $path = Mapper::url($path);
        echo("<script>");
        echo("document.location.href = '" . $path . "';");
        echo("</script>");
    }

	public static function closeWindow(){
		echo("<script>");
	    echo("window.close();");
	    echo("</script>");
	}

    protected function timeOut() {
        Session::start();
	$sessionID = "'" . session_id() . "'";	
        $unixtime_valido = time() - (10 * 60);
        $validaSessao    = Session::read("horaLogin");
	
	Model::query("UPDATE usuarios_logados SET usuarios_logados.created = CURRENT_TIMESTAMP WHERE usuarios_logados.session_id = $sessionID");
	
        if ($this->params['here'] != "/seguranca/login" && $this->params['here'] != "/seguranca/logout") {
	        if( $validaSessao < $unixtime_valido) {	            
	            $this->redirect("/seguranca/logout");
	        }
        }
    }
	
	protected function usersLoged() {		
		$usersLoged = Model::fetch("SELECT DISTINCT COUNT(session_id) as 'countUsers' FROM usuarios_logados");
		foreach($usersLoged as $row) {
			$connectedUsers = $row["countUsers"];
		}
		Session::write("logados", $connectedUsers);
	}
    
    /* @Override on core/Controller.php */
    public function beforeFilter() {    	
    	if($this->requiredLevel == 0) {    		
			return true;
    	}
    	else {
	    	if($this->params['here'] != "/seguranca/login" && $this->params['here'] != "/seguranca/logout") {
	    		$this->timeOut();
				$this->usersLoged();
				Session::write("horaLogin", strtotime('NOW'));
	    		if(Session::read('nivelUsuario') < $this->requiredLevel) {
	    			self::setFlash('Acesso Negado, sem Privilégios de Acesso!');
	    			self::redir('/seguranca/logout');
	    		}
	    	}
    	}   	
    }   

}
