<?php session_start(); ?>
<html>
<head>
	<title>Pagina principal</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		BIENVENIDO A MI NEGOCIO MADEDERIA ORTEGA<br>
		Miguel Angel Ortega Martinez
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		Bienvenido <?php echo $_SESSION['name'] ?> ! <a href='logout.php'>cerrar sesion</a><br/>
		<br/>
		<a href='view.php'>Ver y editar productos</a>
		<br/><br/>
	<?php	
	} else {
		echo "Usted debe estar dado de alta para acceder a la pagina.<br/><br/>";
		echo "<a href='login.php'>Iniciar secion</a> | <a href='register.php'>Registrar</a>";
	}
	?>
	<div id="footer">
		Creado por <a href="https://maomortega15.github.io/MADERASORTEGA/" title="Mukesh Chapagain">Miguel Angel</a>
	</div>
</body>
</html>
