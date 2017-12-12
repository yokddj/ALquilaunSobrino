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
$password = addslashes($password);
$patron2= "/^[a-zA-ZñÑ\s\W]/";
$nombre = addslashes($nombre);
$apellido = addslashes($apellido);
$patron3 = "/^([0-9a-z]+)([0-9a-z\.-_]+)@([0-9a-z\.-_]+)\.([0-9a-z]+)$/";
$email = addslashes($email);
$patron4 = "/^[6-9]{1}[0-9]{8}/";
$telefono = addslashes($telefono);
$patron5= "/^[a-zA-ZñÑ\s\W]/";
$direccion = addslashes($direccion);
$ciudad = addslashes($ciudad);
$fecha_nacimiento = addslashes($fecha_nacimiento);



//Comprobamos que esten todos los campos
if (!$login || !$password || !$nombre || !$apellido || !$email || !$telefono || !$direccion || !$ciudad || !$fecha_nacimiento)
  {
 	echo '<script language="javascript">alert("Ha dejado algún campo sin completar, intentelo de nuevo");</script>'; 
	echo '<script language="javascript">location.href="formulario_usuarios.php"; </script>'; 
  }







if (!preg_match($patron, $login)){
	
	echo '<script language="javascript">alert("El login no tiene un formato adecuado vuelva a intentarlo por favor");</script>'; 
	echo '<script language="javascript">location.href="formulario_usuarios.php"; </script>'; 
	
}else if (!preg_match($patron, $password)){
	echo '<script language="javascript">alert("El password no tiene un formato adecuado vuelva a intentarlo por favor");</script>'; 
	echo '<script language="javascript">location.href="formulario_usuarios.php"; </script>'; 
	
}else if (!preg_match($patron2, $nombre)){
	echo '<script language="javascript">alert("El nombre no tiene un formato adecuado vuelva a intentarlo por favor");</script>'; 
	echo '<script language="javascript">location.href="formulario_usuarios.php"; </script>'; 
	
}else if (!preg_match($patron2, $apellido)){
	echo '<script language="javascript">alert("El apellido no tiene un formato adecuado vuelva a intentarlo por favor");</script>'; 
	echo '<script language="javascript">location.href="formulario_usuarios.php"; </script>'; 
	
}else if (!preg_match($patron3, $email)){
	echo '<script language="javascript">alert("El email no tiene un formato adecuado vuelva a intentarlo por favor");</script>'; 
	echo '<script language="javascript">location.href="formulario_usuarios.php"; </script>'; 
	
}else if (!preg_match($patron4, $telefono)){
	echo '<script language="javascript">alert("El telefono no tiene un formato adecuado vuelva a intentarlo por favor");</script>'; 
	echo '<script language="javascript">location.href="formulario_usuarios.php"; </script>'; 
	
}else if (!preg_match($patron5, $direccion)){
	echo '<script language="javascript">alert("La direccion no tiene un formato adecuado vuelva a intentarlo por favor");</script>'; 
	echo '<script language="javascript">location.href="formulario_usuarios.php"; </script>'; 
	
}else if (!preg_match($patron5, $ciudad)){
	echo '<script language="javascript">alert("La ciudad no tiene un formato adecuado vuelva a intentarlo por favor");</script>'; 
	echo '<script language="javascript">location.href="formulario_usuarios.php"; </script>'; 
	
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