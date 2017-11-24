<?php

@ $nombre = $_POST['nombre'];
@ $descripcion = $_POST['descripcion'];
@ $foto = $_POST['foto'];
@ $precio = $_POST['precio'];
@ $disponibilidad = $_POST['disponibilidad'];


//Con trim  eliminanamos espacio en blanco (u otro tipo de caracteres) del inicio y el final de la cadena

$nombre = trim($nombre);
$descripcion = trim($descripcion);
$foto = trim($foto);
$precio = trim($precio);
$disponibilidad = trim($disponibilidad);

  if (!$nombre || !$descripcion || !$foto || !$precio || !$disponibilidad )
  {
     echo 'No ha introducido toda la información requerida para el cliente.<br />'
          .'Por favor, vuelva a la página anterior e inténtelo de nuevo.';
     exit;
  }

include('conexionBD.php');

$query="insert into ingenieros values (NULL,'".$nombre ."', '".$descripcion ."', ' ". $foto ."', ' ". $precio ."', ' ". $disponibilidad ."' )";
echo $query;
$resultado=mysqli_query($bd,$query);
$num=mysqli_affected_rows($bd);
echo	"El	número	de	ingenieros registrados es:	"	.	$num	.		".	<br>";

include('buscador_ingenieros.php');

?>