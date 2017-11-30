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
	
	<div id="formulario_busqueda_simple">
		<form id="busqueda_simple_form" action="busqueda_simple.php" method="POST">
						
			<div class="row">
				<label>Busque el nombre del ingeniero que desea:</label>
				<input id="text" class="input" name="busqueda_nombre" type="text" maxlength="20"/>
				<input id="submit_button"  style="background-color: #1F96FA" type="submit" value="Buscar" onClick="window.document.formulario.submit();"/>
		
			</div>
			</form>		
		
	</div>


	<?php
	//Consulta a la Base de Datos
	@ $busqueda_nombre = $_POST['busqueda_nombre'];
	$busqueda_nombre = trim($busqueda_nombre);
	$query="select * from ingenieros WHERE nombre LIKE '".$busqueda_nombre ."%'";
	$resultado=mysqli_query($bd,$query);
	$num=mysqli_num_rows($resultado);
	echo "En estos momentos tenemos:	"	.	$num	. " ingenieros en nuestro sistema.	<br>";
	
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