<?php 
class viewController{

	public function __construct(){
		
	}

	public function index(){
		if(isset($_GET["c"])){
			if(file_exists("../controladores/".$_GET['c']."Controller.php"))
				require_once "../controladores/".$_GET['c']."Controller.php";
				$controller=$_GET["c"]."Controller";
				$con=new $controller();
				$con->{"index"}();
			}else{
				echo "No existe archivo";
			}
		}

	}



?>