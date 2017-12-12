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
		echo 'El login no tiene un formato 	adecuado vuelva a intentarlo por favor.';
		exit();
		/*echo '<script language="javascript">alert("El password no tiene un formato 	adecuado vuelva a intentarlo por favor.");</script>';*/
	}else{}
$password = addslashes($password);
	if (!preg_match($patron, $password)){
		echo 'El password no tiene un formato 	adecuado vuelva a intentarlo por favor.';	
		exit();
	}else{}

$patron= "/^[a-zA-ZñÑ\s\W]/";
$nombre = addslashes($nombre);
	if (!preg_match($patron, $nombre)){
		echo 'El nombre no tiene un formato 	adecuado vuelva a intentarlo por favor.';	
		exit();
	}else{}
$apellido = addslashes($apellido);
	if (!preg_match($patron, $apellido)){
		echo 'El apellido no tiene un formato 	adecuado vuelva a intentarlo por favor.';
		exit();
	}else{}

$patron = "/^([0-9a-z]+)([0-9a-z\.-_]+)@([0-9a-z\.-_]+)\.([0-9a-z]+)$/";
$email = addslashes($email);
	if (!preg_match($patron, $email)){
		echo 'El email no tiene un formato 	adecuado vuelva a intentarlo por favor.';
		exit();
	}else{}

$patron = "/^[6-9]{1}[0-9]{8}/";
$telefono = addslashes($telefono);
	if (!preg_match($patron, $telefono)){
		echo 'El telefono no tiene un formato 	adecuado vuelva a intentarlo por favor.';
		exit();
	}else{}

$patron= "/^[a-zA-ZñÑ\s\W]/";
$direccion = addslashes($direccion);
	if (!preg_match($patron, $direccion)){
		echo 'El direccion no tiene un formato 	adecuado vuelva a intentarlo por favor.';
		exit();
	}else{}

$ciudad = addslashes($ciudad);
	if (!preg_match($patron, $ciudad)){
		echo 'El ciudad no tiene un formato 	adecuado vuelva a intentarlo por favor.';
		exit();
	}else{}

$fecha_nacimiento = addslashes($fecha_nacimiento);
	


//Comprobamos que esten todos los campos
if (!$login || !$password || !$nombre || !$apellido || !$email || !$telefono || !$direccion || !$ciudad || !$fecha_nacimiento)
  {
    echo 'No ha introducido toda la información requerida para el cliente.<br />'
          .'Por favor, vuelva a la página anterior e inténtelo de nuevo.';
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