<?php
session_start();
include "conexion.php";
if(isset($_SESSION['Usuario'])){

}else{
	header("Location: index.php?Error=Acceso denegado");
}
?>
<!DOCTYPE html>
<html lang="es">
<!--    AGREGAMOS HEAD CON PHP	-->
<!-- me mola hacer versiones -->
<head>
	<?php 

	include 'contenido_head.html';
	?>
	<META NAME="title" CONTENT="Alquila un Sobrino: Admin"> 
		<title>Admin:Alquila un Sobrino</title>
	</head>

	<body>
		
		<!--    AGREGAMOS LA CABECERA CON PHP	-->


		<?php 

		if(isset($_SESSION['Usuario'])){
			$array_usuario=$_SESSION['Usuario'];
			if($array_usuario[0]['Privilegio']=="A"){
				include 'cabecera_admin.html';
			}else if($array_usuario[0]['Privilegio']=="C"){
				include 'cabecera_logeado.html';
			}else{
				include 'cabecera.html';
			}
		}else{
			include 'cabecera.html';
		}
		?>
		<div id="div_Title"><h1 id="sobrinos_Title">ADMIN</h1></div>
		<div id="contenedor_admin">


		</div>


		


		<?php 

		include 'footer.html';
		?>
		

	</body>

	</html>