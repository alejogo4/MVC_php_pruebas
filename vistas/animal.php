<form action="../controladores/animalController.php" method="post">
	Nombre<input type="text" name="nombre" id="">
	Raza<input type="text" name="raza" id="">
	Color<select name="color" id="">
		<option value="blanco">Blanco</option>
		<option value="negro">Negro</option>
		<option value="cafe">Café</option>
	</select>
	Tipo<select name="tipo" id="">
		<option value="loro">Loro</option>
		<option value="perro">Perro</option>
		<option value="gato">Gato</option>
	</select>
<button name="registrar">Registrar</button>
<a href="?c=persona" name="personas">Personas</a>
</form>
<form method="post">
	<button name="btn_borrar">Borrar</button>
</form>
<?php
	if(isset($_POST["btn_borrar"])){
		$_SESSION["tbl_animal"]="";
	}
?>
<table>
	<thead>
	<tr>
	<th>Id</th>
	<th>Nombre</th>
	<th>Raza</th>
	<th>Color</th>
	<th>Tipo</th>
	</tr>
	</thead>
	<tbody><?php echo $lf ?></tbody>
</table>