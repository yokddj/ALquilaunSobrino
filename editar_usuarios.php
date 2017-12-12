<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<!--    AGREGAMOS HEAD CON PHP	-->
<head>
	<?php 

	include 'contenido_head.html';
	?>
	<META NAME="title" CONTENT="Alquila un Sobrino: Editar Usuarios"> 
		<title>Editar Usuarios:Alquila un Sobrino</title>
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
		<div id="div_Title"><h1 id="sobrinos_Title">Editar Usuarios</h1></div>
		<div id="contenedor_login">
			
			<section>
				<center>
				
				</center>

			</section>




		</div>


		


		<?php 

		include 'footer.html';
		?>
		

	</body>

	</html>