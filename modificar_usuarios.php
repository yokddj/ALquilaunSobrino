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




$query = "update usuarios set password='".$password."',nombre='".$nombre."',apellido='".$apellido."',email='".$email."',telefono='".$telefono."', 
direccion='".$direccion."',ciudad='".$ciudad."',fecha_nacimiento='".$fecha_nacimiento."',privilegio='".$privilegio."'
 where login='".$login."'";
mysqli_query($bd,$query);
header("Location: editar_usuarios.php");		
	
?>