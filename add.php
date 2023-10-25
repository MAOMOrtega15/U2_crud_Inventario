<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>Agregar datos</title>
</head>

<body>
<?php
//including the database connection file
include_once("connection.php");

if(isset($_POST['Submit'])) {	
	$nombre = $_POST['nombre'];
	$tipo = $_POST['tipo'];
	$acabado = $_POST['acabado'];
	$distribuidor = $_POST['distribuidor'];
	$precio = $_POST['precio'];
	$medidas = $_POST['medidas'];
	$ancho = $_POST['ancho'];
	$loginId = $_SESSION['id'];
		
	// checking empty fields
	if(empty($nombre) || empty($tipo) || empty($acabado) || empty($distribuidor) || empty($precio) || empty($medidas) || empty($ancho)) {
				
		if(empty($nombre)) {
			echo "<font color='red'>completa el campo nombre.</font><br/>";
		}
		
		if(empty($tipo)) {
			echo "<font color='red'>completa el campo tipo.</font><br/>";
		}
		
		if(empty($acabado)) {
			echo "<font color='red'>completa el campo acabado.</font><br/>";
		}

		if(empty($distribuidor)) {
			echo "<font color='red'>completa el campo distribuidor.</font><br/>";
		}
		if(empty($precio)) {
			echo "<font color='red'>completa el campo precio.</font><br/>";
		}
		if(empty($medidas)) {
			echo "<font color='red'>completa el campo medidas.</font><br/>";
		}
		if(empty($ancho)) {
			echo "<font color='red'>completa el campo ancho.</font><br/>";
		}
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO inventario(nombre, tipo, acabado, distribuidor, precio, medidas, ancho, login_id) VALUES('$nombre','$tipo','$acabado','$distribuidor','$precio','$medidas','$ancho','$loginId')");
		
		//display success message
		echo "<font color='green'>Datos agregados correctamente.";
		echo "<br/><a href='view.php'>Ver resultados</a>";
	}
}
?>
</body>
</html>
