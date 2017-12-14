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

//Comprbamos caacteres especiales
$patron1= "/^[a-zA-ZñÑ\s\W]/";
$nombre = addslashes($nombre);
$descripcion = addslashes($descripcion);

$patron2 = "/^[0-9]+[.]{0,1}[0-9]{0,2}$/";
$precio = addslashes($precio);

$patron3 = "/.jpg$/";
$foto = addslashes($foto);

$patron4= "/^[1,2]{1}/";
$disponibilidad = trim($disponibilidad);

  if (!$nombre || !$descripcion || !$foto || !$precio || !$disponibilidad )
  {
     echo '<script language="javascript">alert("Ha dejado algún campo sin completar, intentelo de nuevo");</script>'; 
	echo '<script language="javascript">location.href="editar_sobrinos.php"; </script>'; 
 	exit();	
  }



if (!preg_match($patron1, $nombre)){
	echo '<script language="javascript">alert("El nombre no tiene un formato adecuado vuelva a intentarlo por favor");</script>'; 
	echo '<script language="javascript">location.href="editar_sobrinos.php"; </script>'; 
	exit();	
}else if (!preg_match($patron1, $descripcion)){
	echo '<script language="javascript">alert("La descripcion no tiene un formato adecuado vuelva a intentarlo por favor");</script>'; 
	echo '<script language="javascript">location.href="editar_sobrinos.php"; </script>'; 
	exit();	
}else if (!preg_match($patron2, $precio)){
	echo '<script language="javascript">alert("El precio no tiene un formato adecuado vuelva a intentarlo por favor");</script>'; 
	echo '<script language="javascript">location.href="editar_sobrinos.php"; </script>'; 
	exit();
}else if (!preg_match($patron3, $foto)){
	echo '<script language="javascript">alert("El fichero foto no tiene un formato adecuado vuelva a intentarlo por favor");</script>'; 
	echo '<script language="javascript">location.href="editar_sobrinos.php"; </script>'; 
	exit();
}else if (!preg_match($patron4, $disponibilidad)){
	echo '<script language="javascript">alert("La disponibilidad foto no tiene un formato adecuado vuelva a intentarlo por favor");</script>'; 
	echo '<script language="javascript">location.href="editar_sobrinos.php"; </script>'; 
	exit();
}




$query = "update ingenieros set nombre='".$nombre."', precio='".$precio."',foto='".$foto."',descripcion='".$descripcion."',disponibilidad='".$disponibilidad."' where id_ingeniero=".$id;
mysqli_query($bd,$query);
header("Location: editar_sobrinos.php");		
	
?>