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
	<META NAME="title" CONTENT="Alquila un Sobrino: Introducir Ingenieros"> 
		<title>Introducir Ingenieros:Alquila un Sobrino</title>
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
		<div id="div_Title"><h1 id="sobrinos_Title">Introducir Sobrinos</h1></div>
		<div id="contenedor_login">
			
			<section>
				<center>
					
					<div id="formulario_productos">
						<form id="contact_form" action="registro_ingenieros.php" method="POST">

							<div class="row">
								<label>Nombre:</label><br />
								<input id="text" class="input" name="nombre" type="text" maxlength="20"/><br />
							</div>
							<div class="row">
								<label>Descripcion:</label><br />
								<input id="text" class="input" name="descripcion" type="text" maxlength="254"/><br />
							</div>
							<div class="row">
								<label>Foto:</label><br />
								<input id="text" class="input" name="foto" type="text" maxlength="20"/><br />
							</div>
							<div class="row">
								<label>Precio:</label><br />
								<input id="text" class="input" name="precio" type="number" maxlength="20"/><br />
							</div>
							<div class="row">
								<label>Disponible</label>
								<input TYPE="radio" NAME="disponibilidad" VALUE="1" CHECKED>  <br />
								<label>No disponible</label>
								<input TYPE="radio" NAME="disponibilidad" VALUE="2" >  
							</div>


							<input id="submit_button"  style="background-color: #1F96FA" type="submit" value="Send email" onClick="window.document.formulario.submit();"/>
							<input id="reset_button" style="background-color: #FF2A00" type="submit" value="Reset" onClick="window.document.formulario.reset();"/>
						</form>		

					</div>
				</center>

			</section>




		</div>


		


		<?php 

		include 'footer.html';
		?>
		

	</body>

	</html>