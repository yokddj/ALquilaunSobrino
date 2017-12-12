<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php 

		include 'contenido_head.html';
 	?>
 	<META NAME="title" CONTENT="Alquila un Sobrino: Usuarios"> 
	<title>USUARIOS</title>
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


 	<div id="formulario_usuarios">
		<h1 id="contact_Title">USUARIOS</h1>
		<form id="contact_form" action="registro_usuarios.php" method="POST">
			
			<div class="row">
				<label>Login:</label><br />
				<input id="text" class="input" name="login" type="text" maxlength="20"/><br />
			</div>
			<div class="row">
				<label>Password:</label><br />
				<input id="text" class="input" name="password" type="password" maxlength="50"/><br />
			</div>
			<div class="row">
				<label>Nombre:</label><br />
				<input id="text" class="input" name="nombre" type="text" maxlength="20"/><br />
			</div>
			<div class="row">
				<label>Apellido:</label><br />
				<input id="text" class="input" name="apellido" type="text" maxlength="20"/><br />
			</div>
			<div class="row">
				<label>E-mail:</label><br />
				<input id="text" class="input" name="email" type="text" maxlength="20"/><br />
			</div>
			<div class="row">
				<label>Telefono:</label><br />
				<input id="text" class="input" name="telefono" type="text" maxlength="20"/><br />
			</div>
			<div class="row">
				<label>Direccion:</label><br />
				<input id="text" class="input" name="direccion" type="text" maxlength="30"/><br />
			</div>
			<div class="row">
				<label>Ciudad:</label><br />
				<input id="text" class="input" name="ciudad" type="text" maxlength="30"/><br />
			</div>
			<div class="row">
				<label>Fecha de Nacimiento:</label><br />
				<input id="text" class="input" name="fecha_nacimiento" type="date" maxlength="20"/><br />
			</div>
			<div class="row">
				<label>Privilegio:</label><br />
				<input id="text" class="input" name="privilegio" type="text" maxlength="1"/><br />
			</div>
			
			<input id="submit_button"  style="background-color: #1F96FA" type="submit" value="Send email" onClick="window.document.formulario.submit();"/>
			<input id="reset_button" style="background-color: #FF2A00" type="submit" value="Reset" onClick="window.document.formulario.reset();"/>
		</form>		
		
	</div>
	<?php 

		include 'footer.html';
 	?>
</body>
</html>







