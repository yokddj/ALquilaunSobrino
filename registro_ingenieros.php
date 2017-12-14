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
	echo '<script language="javascript">location.href="formulario_ingenieros.php"; </script>'; 
 	exit();	
  }



if (!preg_match($patron1, $nombre)){
	echo '<script language="javascript">alert("El nombre no tiene un formato adecuado vuelva a intentarlo por favor");</script>'; 
	echo '<script language="javascript">location.href="formulario_ingenieros.php"; </script>'; 
	exit();	
}else if (!preg_match($patron1, $descripcion)){
	echo '<script language="javascript">alert("La descripcion no tiene un formato adecuado vuelva a intentarlo por favor");</script>'; 
	echo '<script language="javascript">location.href="formulario_ingenieros.php"; </script>'; 
	exit();	
}else if (!preg_match($patron2, $precio)){
	echo '<script language="javascript">alert("El precio no tiene un formato adecuado vuelva a intentarlo por favor");</script>'; 
	echo '<script language="javascript">location.href="formulario_ingenieros.php"; </script>'; 
	exit();
}else if (!preg_match($patron3, $foto)){
	echo '<script language="javascript">alert("El fichero foto no tiene un formato adecuado vuelva a intentarlo por favor");</script>'; 
	echo '<script language="javascript">location.href="formulario_ingenieros.php"; </script>'; 
	exit();
}else if (!preg_match($patron4, $disponibilidad)){
	echo '<script language="javascript">alert("La disponibilidad foto no tiene un formato adecuado vuelva a intentarlo por favor");</script>'; 
	echo '<script language="javascript">location.href="formulario_ingenieros.php"; </script>'; 
	exit();
}



include('conexionBD.php');

$query="insert into ingenieros values (NULL,'".$nombre ."', '".$descripcion ."', ' ". $foto ."', ' ". $precio ."',  ". $disponibilidad ." )";
echo $query;
$resultado=mysqli_query($bd,$query);
$num=mysqli_affected_rows($bd);
echo	"El	número	de	ingenieros registrados es:	"	.	$num	.		".	<br>";

include('buscador_ingenieros.php');

?>