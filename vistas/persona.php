<form action="../controladores/personaController.php" method="post">
	Nombre<input type="text" name="nombre" 
	<?php if(isset($_GET["edit"])) echo "value='".$listado[(int)$_GET["ind"]][1]."'"?>>
	Fecha<input type="date" name="fecha" <?php if(isset($_GET["edit"])) echo "value='".$listado[(int)$_GET["ind"]][2]."'"?>>
	Dirección<input type="text" name="direccion" <?php if(isset($_GET["edit"])) echo "value='".$listado[(int)$_GET["ind"]][3]."'"?>>
	Mascota <select name="mascota" <?php if(isset($_GET["edit"])) echo "value='".$listado[(int)$_GET["ind"]][4]."'"?>><?php echo $lf2; ?></select>
	<button name="registrar">Registrar</button>
	<button name="actualizar">Actualizar</button>
	<a href="?c=animal" name="animal">Animales</a>

</form>
<form method="post">
	<button name="btn_borrar">Borrar</button>
</form>
<?php
	if(isset($_POST["btn_borrar"])){
		$_SESSION["tbl_personas"]="";
	}

	if(isset($_GET["borrar"])){
		//session
	$hola = new persona();
	$listar = $hola->listar();
	unset($listar[$_GET["ind"]]);
	print_r($listar);
		
	}
?>
<table>
	<thead>
	<tr>
	<th>Id</th>
	<th>Nombre</th>
	<th>Fecha</th>
	<th>Dirección</th>
	<th>Mascota</th>
	</tr>
	</thead>
	<tbody><?php echo $lf ?></tbody>
</table>