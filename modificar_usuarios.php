<?php  
include 'conexionBD.php';

@ $login = $_POST['login'];
@ $password=$_POST['password'];				
@ $nombre=$_POST['nombre'];
@ $apellido=$_POST['apellido'];				
@ $email=$_POST['email'];
@ $telefono=$_POST['telefono'];				
@ $direccion = $_POST['direccion'];
@ $ciudad=$_POST['ciudad'];				
@ $fecha_nacimiento=$_POST['fecha_nacimiento'];
@ $privilegio=$_POST['privilegio'];				


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





$query = "update usuarios set password='".$password."', nombre='".$nombre."', apellido='".$apellido."' where login=".$login;
//email='".$email."',telefono='".$telefono."', direccion='".$direccion."',ciudad='".$ciudad."',fecha_nacimiento='".$fecha_nacimiento."',privilegio='".$privilegio."'
mysqli_query($bd,$query);
//echo "Hola: ".$login." ".$password." ".$nombre." ".$apellido." ".$email." ".$telefono." ".$direccion." ".$ciudad." ".$fecha_nacimiento." ".$privilegio;

header("Location: editar_usuarios.php");		
	
?>