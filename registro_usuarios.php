<?php
@ $login = $_POST['login'];
@ $password = $_POST['password'];
@ $nombre = $_POST['nombre'];
@ $apellido = $_POST['apellido'];
@ $email = $_POST['email'];
@ $telefono = $_POST['telefono'];
@ $direccion = $_POST['direccion'];
@ $ciudad = $_POST['ciudad'];
@ $fecha_nacimiento = $_POST['fecha_nacimiento'];
@ $privilegio = $_POST['privilegio'];


$login = trim($login);
$password = trim($password);
$nombre = trim($nombre);
$apellido = trim($apellido);
$email = trim($email);
$telefono = trim($telefono);
$direccion = trim($direccion);
$ciudad = trim($ciudad);
$fecha_nacimiento = trim($fecha_nacimiento);
$privilegio = trim($privilegio);


 if (!$login || !$password || !$nombre || !$apellido || !$email || !$telefono || !$direccion || !$ciudad || !$fecha_nacimiento || !$privilegio)
  {
     echo 'No ha introducido toda la información requerida para el cliente.<br />'
          .'Por favor, vuelva a la página anterior e inténtelo de nuevo.';
     exit;
  }

include('conexionBD.php');

$query="insert into usuarios values ('". $login . "', '".$password ."', '".$nombre ."', ' ". $apellido ."', ' ". $email ."', '". $telefono ."', ' ". $direccion ."', '" .$ciudad . "', '2011-12-04', 'C')";
echo $query;
$resultado=mysqli_query($bd,$query);
$num=mysqli_affected_rows($bd);
echo	"El	número	de	usuarios registrados es:	"	.	$num	.		".	<br>";

?>