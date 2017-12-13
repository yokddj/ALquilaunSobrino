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
							<td>Imagen</td>
							<td>Descripcion</td>
							<td>Precio</td>
							<td>Disponibilidad</td>
							<td>Modificar</td>
							<td>Eliminar</td>
							
						</tr>
						<?php 
						
						$query="select * from ingenieros";	
						$resultado=mysqli_query($bd,$query);
						while($fila=mysqli_fetch_array($resultado)){
							$nombre=$fila['nombre'];				
							$precio=$fila['precio'];
							$foto=$fila['foto'];				
							$descripcion=$fila['descripcion'];
							$disponibilidad=$fila['disponibilidad'];				
							$id=$fila['id_ingeniero'];

							echo '
							<tr>
							<form action="modificar_ingenieros.php" method="POST">
							<td><input type="hidden" name="id" value="'.$id.'">'.$id.'</td>
							<td><input type="text" maxlength="20" name="nombre" value="'.$nombre.'"></td>
							<td><input type="text" maxlength="20" name="foto" value="'.$foto.'"></td>
							<td><input type="text" maxlength="254" name="descripcion" value="'.$descripcion.'"></td>
							<td><input type="number" name="precio" value="'.$precio.'"></td>
							<td><input type="text" name="disponibilidad" value="'.$disponibilidad.'"></td>
							<td><button type="submit"  class="modificar" onClick="window.document.formulario.submit();">Modificar</button></td>
							</form>
							<td><button class="eliminar" onClick="eliminar_sobrino('.$id.')">Eliminar</button></td>
							</tr>
							';
						}
						?>
					</table>
					<p>Nota: La disponibilidad será 1 disponible y 2 no disponible</p>
				</center>
				
			</section>




		</div>


		


		<?php 

		include 'footer.html';
		?>
		
		<script>
		function eliminar_sobrino(id){
			if(confirm("Se va a eliminar el ingeniero con id= "+id)){
				location.href="eliminar_ingenieros.php?id="+id;
			}
		}

		</script>
	</body>

	</html>