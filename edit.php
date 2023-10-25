<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$nombre = $_POST['nombre'];
	$tipo = $_POST['tipo'];
	$acabado = $_POST['acabado'];	
	$distribuidor = $_POST['distribuidor'];
	$precio = $_POST['precio'];
	$medidas = $_POST['medidas'];
	$ancho = $_POST['ancho'];
	
	// checking empty fields
	if(empty($nombre) || empty($tipo) || empty($acabado) || empty($distribuidor) || empty($precio) || empty($medidas) || empty($ancho)) {
				
		if(empty($nombre)) {
			echo "<font color='red'>llena el campo nombre.</font><br/>";
		}
		
		if(empty($tipo)) {
			echo "<font color='red'>llena el campo tipo.</font><br/>";
		}
		
		if(empty($acabado)) {
			echo "<font color='red'>llena el campo acabado.</font><br/>";
		}	

		if(empty($distribuidor)) {
			echo "<font color='red'>llena el campo distribuidor.</font><br/>";
		}	

		if(empty($precio)) {
			echo "<font color='red'>llena el campo precio.</font><br/>";
		}	

		if(empty($medidas)) {
			echo "<font color='red'>llena el campo medidas.</font><br/>";
		}	

		if(empty($ancho)) {
			echo "<font color='red'>llena el campo ancho.</font><br/>";
		}	
	} else {	
		//updating the table
	    $result = mysqli_query($mysqli, "UPDATE inventario SET nombre='$nombre', tipo='$tipo', acabado='$acabado', distribuidor='$distribuidor', precio='$precio', medidas='$medidas', ancho='$ancho' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: view.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM inventario WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$nombre = $res['nombre'];
	$tipo = $res['tipo'];
	$acabado = $res['acabado'];
	$distribuidor = $res['distribuidor'];
	$precio = $res['precio'];
	$medidas = $res['medidas'];
	$ancho = $res['ancho'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="view.php">Ver productos</a> | <a href="logout.php">cerrar sesion</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>nombre</td>
				<td><input type="text" name="nombre" value="<?php echo $nombre;?>"></td>
			</tr>
			<tr> 
				<td>tipo</td>
				<td><input type="text" name="tipo" value="<?php echo $tipo;?>"></td>
			</tr>
			<tr> 
				<td>acabado</td>
				<td><input type="text" name="acabado" value="<?php echo $acabado;?>"></td>
			</tr>
			<tr> 
				<td>distribuidor</td>
				<td><input type="text" name="distribuidor" value="<?php echo $distribuidor;?>"></td>
			</tr>
			<tr> 
				<td>precio</td>
				<td><input type="text" name="precio" value="<?php echo $precio;?>"></td>
			</tr>
			<tr> 
				<td>medidas</td>
				<td><input type="text" name="medidas" value="<?php echo $medidas;?>"></td>
			</tr>
			<tr> 
				<td>ancho</td>
				<td><input type="text" name="ancho" value="<?php echo $ancho;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Enviar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
