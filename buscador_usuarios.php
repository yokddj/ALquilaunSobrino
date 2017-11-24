

<?php

include('conexionBD.php');

//Consulta a la Base de Datos
$query="select * from usuarios";
echo $query . "<br>";
$resultado=mysqli_query($bd,$query);
$num=mysqli_num_rows($resultado);
echo "El	numero	de	resultados encontrados es:	"	.	$num	. ".	<br>";
echo "<table border='1'>"; 

echo "<tr><td>login</td><td>password</td><td>nombre</td><td>apellido</td><td>email</td><td>telefono</td><td>direccion</td><td>ciudad</td><td>fecha nacimiento</td><td>privilegio</td></tr>"; 

for($i=0;$i<$num;$i++){

	$fila=mysqli_fetch_array($resultado);
	echo "<tr>";
	echo "<td>".$fila['login']."</td>";
	echo "<td>".$fila['password']."</td>";
	echo "<td>".$fila['nombre']."</td>";
	echo "<td>".$fila['apellido']."</td>";
	echo "<td>".$fila['email']."</td>";
	echo "<td>".$fila['telefono']."</td>";
	echo "<td>".$fila['direccion']."</td>";
	echo "<td>".$fila['ciudad']."</td>";
	echo "<td>".$fila['fecha_nacimiento']."</td>";
	echo "<td>".$fila['privilegio']."</td>";
	echo "<tr>";
}
echo "</table>";
?>