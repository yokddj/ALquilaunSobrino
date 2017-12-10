<!DOCTYPE html>
<html lang="en">
<head>
	<?php 

		include 'contenido_head.html';
 	?>
 	<META NAME="title" CONTENT="Alquila un Sobrino: Carrito"> 
	<title>CARRITO</title>
</head>
<body>

	<!--    AGREGAMOS LA CABECERA CON PHP	-->

	<?php 

		include 'cabecera.html';
 	?>
	<div id="contenedor_carrito">
		<div class="div_prod_carrito">
			<div class="div_prod_carrito_img"><img class="img_prod_carrito"  src="img/sobrinos.JPG" alt=""></div>
			<p>Ingeniero 1</p>
			<h3>P.V.P. 35,00€</h3>
		</div>

		
		<?php 


			include('conexionBD.php');

			//Consulta a la Base de Datos
			$query="select * from ingenieros";
			$resultado=mysqli_query($bd,$query);
			$num=mysqli_num_rows($resultado);
			echo "<table border='1'>"; 

			echo "<tr><td>id_ingeniero</td><td>nombre</td><td>descripcion</td><td>foto</td><td>precio</td><td>disponibilidad</td></tr>"; 

			for($i=0;$i<$num;$i++){

				$fila=mysqli_fetch_array($resultado);
				echo "<tr>";
				echo "<td>".$fila['id_ingeniero']."</td>";
				echo "<td>".$fila['nombre']."</td>";
				echo "<td>".$fila['foto']."</td>";
				echo "<td>".$fila['descripcion']."</td>";
				echo "<td>".$fila['precio']."</td>";
				echo "<td>".$fila['disponibilidad']."</td>";
				echo "<tr>";
			}
			echo "</table>";

		 ?>
		


	</div>

	<?php 

		include 'footer.html';
 	?>
</body>
</html>







