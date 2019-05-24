<?php 

require "../modelo/animal.php";

class animalController{

	public function __construct(){

	}

	public function index(){
		$anim = new animal();
		$list = $anim->listar();
		$lf = '';
		foreach ($list as $datoA) {
			$lf .= "
			<tr>
				<td>".$datoA[0]."</td>
				<td>".$datoA[1]."</td>
				<td>".$datoA[2]."</td>
				<td>".$datoA[3]."</td>
				<td>".$datoA[4]."</td>

			</tr>";
		}
		require "../vistas/animal.php";
	}

	public function generarId($lenght){
		$id = substr(str_shuffle("0123456789"),0,$lenght);
		return $id;
	}

	public function registrar(){
		$anim = new animal();
		/*$list = $anim->listar();
		$id=count($list);*/
		$anim->__set("id",$this->generarId(1));
		$anim->__set("nombre",$_POST["nombre"]);
		$anim->__set("raza",$_POST["raza"]);
		$anim->__set("color",$_POST["color"]);
		$anim->__set("tipo",$_POST["tipo"]);
		if($anim->registro()){
			header("location:/1Php/MVC/public/?c=animal");
			echo "registró";
		}else{
			echo "<h1>No se registró</h1>";
		}
	}
}

$p_con = new animalController();
if(isset($_POST["registrar"])){
	$p_con->registrar();
}



?>