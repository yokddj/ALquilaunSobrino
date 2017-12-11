	<!DOCTYPE html>
	<html lang="es">
	<!--    AGREGAMOS HEAD CON PHP	-->
	<!-- me mola hacer versiones -->
	<head>
		<?php 

			include 'contenido_head.html';
	 	?>
	 	<META NAME="title" CONTENT="Alquila un Sobrino: Login"> 
	 	<title>Login:Alquila un Sobrino</title>
	</head>

	<body>
		
	<!--    AGREGAMOS LA CABECERA CON PHP	-->

		<?php 

			include 'cabecera.html';
	 	?>
			<div id="div_Title"><h1 id="sobrinos_Title">LOGIN</h1></div>
		<div id="contenedor_login">
			
				<section>
					<center><form id="formulario_login" method="post" action="verificador.php">
		
			<label for="usuario">Usuario</label><br>
			<input type="text" id="usuario_login" name="Usuario_login"  ><br>
			<label for="password">Password</label><br>
			<input type="password" id="password_login" name="Password_login" ><br>
			<input type="submit" name="aceptar" value="Aceptar" class="aceptar">
				<?php 
			if(isset($_GET['error'])){
				echo '<center>Datos No Validos</center>';
			}
			?>
		</form></center>
		
		</section>




		</div>


		


		<?php 

			include 'footer.html';
	 	?>
		

	</body>

	</html>