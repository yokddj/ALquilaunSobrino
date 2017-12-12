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
					<h1>MODIFICAR Y/O ELIMINAR</h1>
					<table >
						<tr>
							<td>Login</td>
							<td>Password</td>
							<td>Nombre</td>
							<td>Apellido</td>
							<td>email</td>
							<td>Telefono</td>
							<td>Dirección</td>
							<td>Ciudad</td>
							<td>Fecha de nacimiento</td>
							<td>Privilegio</td>
							<td>Eliminar</td>
							<td>Modificar</td>
						</tr>
						<?php 
						
								$query="select * from usuarios";	
						$resultado=mysqli_query($bd,$query);
						while($fila=mysqli_fetch_array($resultado)){
							echo '
							<tr>
							<td><input type="text" class="login" value="'.$fila['login'].'"></td>
							<td><input type="text" class="password" value="'.$fila['password'].'"></td>
							<td><input type="text" class="nombre" value="'.$fila['nombre'].'"></td>
							<td><input type="text" class="apellido" value="'.$fila['apellido'].'"></td>
							<td><input type="text" class="email" value="'.$fila['email'].'"></td>
							<td><input type="text" class="telefono" value="'.$fila['telefono'].'"></td>
							<td><input type="text" class="direccion" value="'.$fila['direccion'].'"></td>
							<td><input type="text" class="ciudad" value="'.$fila['ciudad'].'"></td>
							<td><input type="text" class="fecha_nacimiento" value="'.$fila['fecha_nacimiento'].'"></td>
							<td><input type="text" class="privilegio" value="'.$fila['privilegio'].'"></td>
							<td><button class="eliminar" data-login="'.$fila['login'].'">Eliminar</button></td>
							<td><button class="modificar" data-login="'.$fila['login'].'">Modificar</button></td>
							</tr>
							';
						}
						?>
					</table>
				<p>Nota: El privilegio será C para un usuario normal y A para el administrador</p>
				</center>

			</section>




		</div>


		


		<?php 

		include 'footer.html';
		?>
		

	</body>

	</html>