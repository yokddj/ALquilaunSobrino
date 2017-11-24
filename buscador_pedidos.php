

<?php

include('conexionBD.php');

//Consulta a la Base de Datos
$query="select * from pedidos";
echo $query . "<br>";
$resultado=mysqli_query($bd,$query);
$num=mysqli_num_rows($resultado);
echo "El	numero	de	pedidos encontrados es:	"	.	$num	. ".	<br>";
echo "<table border='1'>"; 

echo "<tr><td>id_pedido</td><td>login</td><td>coste_total</td><td>fecha</td>"; 

for($i=0;$i<$num;$i++){

	$fila=mysqli_fetch_array($resultado);
	echo "<tr>";
	echo "<td>".$fila['id_pedido']."</td>";
	echo "<td>".$fila['login']."</td>";
	echo "<td>".$fila['coste_total']."</td>";
	echo "<td>".$fila['fecha']."</td>";
	echo "<tr>";
}
echo "</table>";
?>