<?php 

if(!isset($_SESSION["tbl_animal"])){
session_start();
}

class animal
{

	public $nombre;
	public $raza;
	public $color;
	public $tipo;
	public $id;
	
	function __construct()
	{
		
	}

	public function __get($prop){
		return $this->$prop;
	}

	public function __set($prop,$valor){
		$this->$prop = $valor;
	}

	public function registro(){
		try {
			$_SESSION["tbl_animal"].=$this->id."|*|".$this->nombre."|*|".$this->raza."|*|".$this->color."|*|".$this->tipo."||";
			return true;
		}catch (Exception $e) {
			return false;
		}	
	}

	public function buscariD($id){
		$list = $this->listar();	
		foreach ($list as $value) {
			if($value[0] ==$id){
				return $value;
			}
		}
	}

	public function listar(){
		$lista = explode("||", $_SESSION["tbl_animal"]);

		$lista_final = array();
		foreach ($lista as $value) {
			if(!$value ==""){
				array_push($lista_final, explode("|*|", $value));
			}
		}
		return $lista_final;
	}

	public function editar(){
		$listaE = explode("||", $_SESSION["tbl_animal"]);

		$lista_finalE = array();
		foreach ($listaE as $valueE) {
			if(!$valueE ==""){
				array_push($lista_finalE, explode("|*|", $valueE));
			}
		}
		return $lista_finalE;
	}




}



?>