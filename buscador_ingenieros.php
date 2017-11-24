

<?php

include('conexionBD.php');

//Consulta a la Base de Datos
$query="select * from ingenieros";
echo $query . "<br>";
$resultado=mysqli_query($bd,$query);
$num=mysqli_num_rows($resultado);
echo "El	numero	de	resultados encontrados es:	"	.	$num	. ".	<br>";
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