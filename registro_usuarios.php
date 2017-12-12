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





//Recortamos espacios en blanco
$login = trim($login);
$password = trim($password);
$nombre = trim($nombre);
$apellido = trim($apellido);
$email = trim($email);
$telefono = trim($telefono);
$direccion = trim($direccion);
$ciudad = trim($ciudad);
$fecha_nacimiento = trim($fecha_nacimiento);

//Comprbamos caacteres especiales
$patron= "/^[a-zA-Z0-9_]+$/";
$login = addslashes($login);
	if (!preg_match($patron, $login)){
		echo 'El login no tiene un formato adecuado vuelva a intentarlo por favor.<br />';
		exit;
	}else
$password = addslashes($password);
	if (!preg_match($patron, $login)){
		echo 'El paswword no tiene un formato adecuado vuelva a intentarlo por favor.<br />';
		exit;
	}else

$patron= "/^[a-zA-ZñÑ\s\W]/";
$nombre = addslashes($nombre);
	if (!preg_match($patron, $login)){
		echo 'El nombre no tiene un formato adecuado vuelva a intentarlo por favor.<br />';
		exit;
	}else
$apellido = addslashes($apellido);
	if (!preg_match($patron, $login)){
		echo 'El apellido no tiene un formato adecuado vuelva a intentarlo por favor.<br />';
		exit;
	}else

$patron = "/^([0-9a-z]+)([0-9a-z\.-_]+)@([0-9a-z\.-_]+)\.([0-9a-z]+)$/";
$email = addslashes($email);
	if (!preg_match($patron, $email)){
		echo 'El correo electronico no tiene un formato adecuado vuelva a intentarlo por favor.<br />';
		exit;
	}else

$patron = "/^[6-9]{1}[0-9]{8}/";
$telefono = addslashes($telefono);
	if (!preg_match($patron, $telefono)){
		echo 'El telefono no tiene un formato adecuado vuelva a intentarlo por favor.<br />';
		exit;
	}else

$patron= "/^[a-zA-ZñÑ\s\W]/";
$direccion = addslashes($direccion);
	if (!preg_match($patron, $login)){
		echo 'La direccion no tiene un formato adecuado vuelva a intentarlo por favor.<br />';
		exit;
	}else
$ciudad = addslashes($ciudad);
	if (!preg_match($patron, $login)){
		echo 'La ciudad no tiene un formato adecuado vuelva a intentarlo por favor.<br />';
		exit;
	}else

$patron= "/([0-9]{2})([0-9]{2})([0-9]{4})/";
$fecha_nacimiento = addslashes($fecha_nacimiento);
	if (!preg_match($patron, $login)){
		echo 'La fecha de nacimiento no tiene un formato adecuado vuelva a intentarlo por favor.<br />';
		exit;
	}else


//Comprobamos que esten todos los campos
if (!$login || !$password || !$nombre || !$apellido || !$email || !$telefono || !$direccion || !$ciudad || !$fecha_nacimiento)
  {
     echo 'No ha introducido toda la información requerida para el cliente.<br />'
          .'Por favor, vuelva a la página anterior e inténtelo de nuevo.';
     exit;
  }


//Conexion a la base de datos
include('conexionBD.php');

//Introduccion de los datos
$query="insert into usuarios values ('". $login . "', '".$password ."', '".$nombre ."', ' ". $apellido ."', ' ". $email ."', '". $telefono ."', ' ". $direccion ."', '" .$ciudad . "', '". $fecha_nacimiento . "', 'C')";
echo $query;
$resultado=mysqli_query($bd,$query);
$num=mysqli_affected_rows($bd);
echo	"El	número	de	usuarios registrados es:	"	.	$num	.		".	<br>";

?>