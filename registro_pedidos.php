<?php

@ $login = $_POST['login'];


//Con trim  eliminanamos espacio en blanco (u otro tipo de caracteres) del inicio y el final de la cadena

$login = trim($login);


if (!$login)
{
   echo 'No ha introducido toda la información requerida para el cliente.<br />'
          .'Por favor, vuelva a la página anterior e inténtelo de nuevo.';
   exit;
}
include('conexionBD.php');

$query="insert into pedidos values (NULL,' ". $login ."', ' 52.36 ', ' 2011-12-04 ' )";
echo $query;
$resultado=mysqli_query($bd,$query);
$num=mysqli_affected_rows($bd);
echo	"El	número	de	pedidos registrados es:	"	.	$num	.		".	<br>";

include('buscador_pedidos.php');

?>