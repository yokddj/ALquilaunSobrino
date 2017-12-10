<!DOCTYPE html>
<html lang="en">
<head>
	
	<!--  -------------------META--------------- -->
	<META NAME="title" CONTENT="Alquila un Sobrino: Sobrinos"> 
	<title>Sobrinos: Alquila un Sobrino</title>
	<?php 

    include 'contenido_head.html';
    include 'conexionBD.php';
  ?>
	
</head>
<body>
	<!--    AGREGAMOS LA CABECERA CON PHP	-->

	<?php 

		include 'cabecera.html';
 	?>
	<div id="div_Title"><h1 id="sobrinos_Title">NUESTROS SOBRINOS</h1></div>
		

	<div class="contenedorsobrinos">
	
	<div id="formulario_busqueda_avanzada">
		<form id="busqueda_avanzada_form" action="busqueda_avanzada_resultado.php" method="POST">		
			<div class="row">
				<label>Nombre:</label><br />
				<input id="text" class="input" name="busqueda_nombre" type="text" maxlength="20"/><br />
			</div>
			<div class="row">
				<label>Descripcion:</label><br />
				<input id="text" class="input" name="busqueda_descripcion" type="text" maxlength="254"/><br />
			</div>
			<div class="row">
				<label>Precio:</label><br />
				<input id="text" class="input" name="busqueda_precio" type="number" maxlength="20"/><br />
			</div>
			<div class="row">
				<label>Disponible</label>
				<input TYPE="radio" NAME="busqueda_disponibilidad" VALUE="1" CHECKED>  <br />
				<label>No disponible</label>
				<input TYPE="radio" NAME="busqueda_disponibilidad" VALUE="2" >  
			</div>
			<input id="submit_button"  style="background-color: #1F96FA" type="submit" value="Buscar" onClick="window.document.formulario.submit();"/>
			<input id="reset_button" style="background-color: #FF2A00" type="submit" value="Reset" onClick="window.document.formulario.reset();"/>
			</form>		
		
	</div>


	<?php
	//Consulta a la Base de Datos
	$query="select * from ingenieros";
	$resultado=mysqli_query($bd,$query);
	$num=mysqli_num_rows($resultado);
		
	for($i=0;$i<$num;$i++){

		$fila=mysqli_fetch_array($resultado);
			echo '<div class="divsobrino">';
			echo '<div class="divimgsobrino">';
			$foto = trim($fila['foto']); //Esto va aqui porque incluia un espacio antesd el nombre de la foto
			echo '<img class="imgsobrino"  src="img/'. $foto . '" alt=""></div>';
			echo '<h2>' . $fila['nombre'] . ' </h2>';
			echo '<p>' . $fila['descripcion'] . '</p>';
			echo '<h3>P.V.P. ' . $fila['precio'] . '</h3>';

			//Convertimos la disponibilidad en una cadena
			if ($fila['disponibilidad']==1) {
				$disponibilidad="Disponible";	
			}else if($fila['disponibilidad']==2){
				$disponibilidad="No Disponible";	
			}else{
				$disponibilidad="HA OCURRIDO UN ERROR";	
			}
			echo '<h3>' . $disponibilidad . '</h3>';
			echo '<div id="boton_Compra" ><a href="./carrito.php?id='.$fila['id_ingeniero'].'">COMPRAR</a></div>';
			echo '</div>';
	}
	
	?>

		


	</div>
		
 <?php 

		include 'footer.html';
 	?>
	

	<script>
	function displayMenu(){
			var display;
			var divMenu = document.getElementById("divMenu");
			display = divMenu.style.display;

			if(display=="none"){
				divMenu.style.display="block";
			}else{
				divMenu.style.display="none";
			}

		}


		
	</script>	
</body>

</html>