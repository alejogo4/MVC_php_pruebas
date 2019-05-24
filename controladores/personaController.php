<?php 

require "../modelo/persona.php";
require "../modelo/animal.php";

class personaController{

	public function __construct(){
	}
	public function index(){
		$per = new persona();
		$mas = new animal();
		$listado = $per->listar();
		$lf = '';
		foreach ($listado as $ind=>$dato) {
			$lf.= "
			<tr>
				<td>".$dato[0]."</td>
				<td>".$dato[1]."</td>
				<td>".$dato[2]."</td>
				<td>".$dato[3]."</td>
				<td>".$mas->buscariD($dato[4])[1]."</td>
				<td><a href ='?c=persona&edit&ind=".$ind."'>Editar</a></td>
				<td><a href ='?c=persona&borrar&ind=".$ind."'>Borrar</a></td>
			</tr>
			";
		}
		
		$listadomas = $mas->listar();
		$lf2 = '';
		foreach ($listadomas as $dato2) {
			$lf2.= "
				<option value ='".$dato2[0]."'>".$dato2[1]."</option>
			";
		}
		require "../vistas/persona.php";
	}

	public function registrar(){
		$per = new persona();
		$listado = $per->listar();
		$id=count($listado);
		$per->__set("id",$id+1);
		$per->__set("nom",$_POST["nombre"]);
		$per->__set("fecha",$_POST["fecha"]);
		$per->__set("direccion",$_POST["direccion"]);
		$per->__set("mascota",$_POST["mascota"]);
		if($per->registro()){
			header("location:/1Php/MVC/public/?c=persona");
			echo "registró";
		}else{
			echo "<h1>No se registró</h1>";
		}
	}
}

$p_con = new personaController();
if(isset($_POST["registrar"])){
	$p_con->registrar();
}

$act = new personaController();
if(isset($_POST["actualizar"])){
	$p_con->registrar();
}



?>