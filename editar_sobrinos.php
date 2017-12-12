<?php
session_start();
include 'conexionBD.php';
?>
<!DOCTYPE html>
<html lang="es">
<!--    AGREGAMOS HEAD CON PHP	-->
<head>
	<?php 

	include 'contenido_head.html';
	?>
	<META NAME="title" CONTENT="Alquila un Sobrino: Editar Ingenieros"> 
		<title>Editar Sobrinos:Alquila un Sobrino</title>
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
		<div id="div_Title"><h1 id="sobrinos_Title">Editar Sobrinos</h1></div>
		<div id="contenedor_login">
			
			<section>
				<center>
					<h1>MODIFICAR Y/O ELIMINAR</h1>
					<table>
						<tr>
							<td>Id</td>
							<td>Nombre</td>
							<td>Descripcion</td>
							<td>Precio</td>
							<td>Disponibilidad</td>
							<td>Eliminar</td>
							<td>Modificar</td>
						</tr>
						<?php 
						
								$query="select * from ingenieros";	
						$resultado=mysqli_query($bd,$query);
						while($fila=mysqli_fetch_array($resultado)){
							echo '
							<tr>
							<td><input type="hidden" value="'.$fila['id_ingeniero'].'">'.$fila['id_ingeniero'].'</td>
							<td><input type="text" class="nombre" value="'.$fila['nombre'].'"></td>
							<td><input type="text" class="foto" value="'.$fila['foto'].'"></td>
							<td><input type="text" class="descripcion" value="'.$fila['descripcion'].'"></td>
							<td><input type="text" class="precio" value="'.$fila['precio'].'"></td>
							<td><input type="text" class="disponibilidad" value="'.$fila['disponibilidad'].'"></td>
							<td><button class="eliminar" data-id="'.$fila['id_ingeniero'].'">Eliminar</button></td>
							<td><button class="modificar" data-id="'.$fila['id_ingeniero'].'">Modificar</button></td>
							</tr>
							';
						}
						?>
					</table>
				</center>

			</section>




		</div>


		


		<?php 

		include 'footer.html';
		?>
		

	</body>

	</html>