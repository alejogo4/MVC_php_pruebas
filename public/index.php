<?php 
	require "../controladores/viewController.php";
?>
	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>hola</title>
</head>
<body>
	<?php
		$view = new viewController();
	 	$view->index();
	?>
</body>
</html>