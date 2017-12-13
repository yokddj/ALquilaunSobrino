<?php  
include 'conexionBD.php';

@ $id = $_POST['id'];
@ $nombre=$_POST['nombre'];				
@ $precio=$_POST['precio'];
@ $foto=$_POST['foto'];				
@ $descripcion=$_POST['descripcion'];
@ $disponibilidad=$_POST['disponibilidad'];				


$nombre = trim($nombre);
$precio = trim($precio);
$foto = trim($foto);
$descripcion = trim($descripcion);
$disponibilidad = trim($disponibilidad);
$query = "update ingenieros set nombre='".$nombre."', precio='".$precio."',foto='".$foto."',descripcion='".$descripcion."',disponibilidad='".$disponibilidad."' where id_ingeniero=".$id;
mysqli_query($bd,$query);
header("Location: editar_sobrinos.php");		
	
?>