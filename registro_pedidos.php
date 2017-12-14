<?php

@ $login = $_POST['login'];


//Con trim  eliminanamos espacio en blanco (u otro tipo de caracteres) del inicio y el final de la cadena

$login = trim($login);


//Comprbamos caacteres especiales
$patron= "/^[a-zA-Z0-9_]+$/";
$login = addslashes($login);

//Comprobamos que esten todos los campos
if (!$login)
  {
 	echo '<script language="javascript">alert("Ha dejado algún campo sin completar, intentelo de nuevo");</script>'; 
	echo '<script language="javascript">location.href="formulario_usuarios.php"; </script>'; 
 	exit();	
  }

 if (!preg_match($patron, $login)){
	
	echo '<script language="javascript">alert("El login no tiene un formato adecuado vuelva a intentarlo por favor");</script>'; 
	echo '<script language="javascript">location.href="formulario_usuarios.php"; </script>'; 
	exit();
}else{}


include('conexionBD.php');

$query="insert into pedidos values (NULL,' ". $login ."', ' 52.36 ', ' 2011-12-04 ' )";
echo $query;
$resultado=mysqli_query($bd,$query);
$num=mysqli_affected_rows($bd);
echo	"El	número	de	pedidos registrados es:	"	.	$num	.		".	<br>";

include('buscador_pedidos.php');

?>