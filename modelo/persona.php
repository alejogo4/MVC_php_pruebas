<?php

session_start();


class persona{

	public $nom;
	private $fecha;
	private $direccion;
	private $id;
	private $mascota;

	public function __construct(){
		if(!isset($_SESSION["tbl_personas"])){
			$_SESSION["tbl_personas"]="";
		}
	}

	public function __get($prop){
		return $this->$prop;
	}

	public function __set($prop,$valor){
		$this->$prop=$valor;
	}

	public function registro(){
		try {

			$_SESSION["tbl_personas"].=$this->id."|*|".$this->nom."|*|".$this->fecha."|*|".$this->direccion."|*|".$this->mascota."||";
			return true;
		} catch (Exception $e) {
			return false;
		}		 
	}
	public function buscariD($id){
		var_dump($id);
		$listado = $this->listar();
		foreach ($listado as $value) {
			if($value[4] ==$id){
				return $value;
			}
		}
	}

	public function listar(){
		$lista = explode("||", $_SESSION["tbl_personas"]);

		$lista_final = array();
		foreach ($lista as $value) {
			if(!$value ==""){
				array_push($lista_final, explode("|*|", $value));
			}
		}
		return $lista_final;
	}
}

//matriz-array bidimensional(arrays dentron de arrays)
 ?>