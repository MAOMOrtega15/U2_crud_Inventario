<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM inventario WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>Homepage</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="add.html">Agregar nuevo dato</a> | <a href="logout.php">cerrar sesion</a>
	<br/><br/>
	<h1>Tabla Inventario</h1>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>NombreMadera</td>
			<td>Tipo de madera</td>
			<td>acabado</td>
			<td>Distribuidor</td>
			<td>Precio</td>
			<td>Medidas</td>
			<td>Ancho</td>
			<td>Actualizar</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['nombre']."</td>";
			echo "<td>".$res['tipo']."</td>";
			echo "<td>".$res['acabado']."</td>";	
			echo "<td>".$res['distribuidor']."</td>";
			echo "<td>".$res['precio']."</td>";
			echo "<td>".$res['medidas']."</td>";
			echo "<td>".$res['ancho']."</td>";
			echo "<td><a href=\"edit.php?id=$res[id]\">Editar</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Seguro que quiere borrar el registro?')\">Borrar</a></td>";		
		}
		?>
	</table>	
</body>
</html>
