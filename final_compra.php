<?php  
session_start();
include 'conexionBD.php';
$dia=$_GET['dia'];
$mes=$_GET['mes'];
$ano=$_GET['ano'];
//$hora=date('h:i:s');
//$fecha_hora=$ano."-".$mes."-".$dia . " " . $hora;
$array_usuario=$_SESSION['Usuario'];
$usuario=$array_usuario[0]['Login'];
$coste=$_SESSION['precio_total'];
$array_carrito=$_SESSION['carrito'];


//Insertamos la compra en pedidos
$query="insert into pedidos values (NULL,'".$usuario."',".$coste.",'".$ano."-".$mes."-".$dia."')";	
$resultado=mysqli_query($bd,$query);

//echo $query;

//Aqui debemos saber el id_pedido guardado anteriormente

$query="select * from pedidos where login='".$usuario."' AND coste_total=".$coste." AND fecha='".$ano."-".$mes."-".$dia."'";	
//echo $query;
$resultado=mysqli_query($bd,$query);


while ($fila=mysqli_fetch_array($resultado)) {

	$id_pedido=$fila['id_pedido'];
}

//Insertamos la compra en pedido_ingeniero

for($i=0;$i<count($array_carrito);$i++){

	$query="insert into pedido_ingenieros values (".$id_pedido.",'".$array_carrito[$i]['Id']."')";
	$resultado=mysqli_query($bd,$query);

		//Ahora hacemos que el ingeniero pase a estado no disponible

	$query = "update ingenieros set disponibilidad='2' where id_ingeniero='".$array_carrito[$i]['Id']."'";
	mysqli_query($bd,$query);
}




unset($_SESSION['carrito']);




?>


<!DOCTYPE html>
<html lang="es">
<!--    AGREGAMOS HEAD CON PHP	-->
<!-- me mola hacer versiones -->
<head>
	<?php 

	include 'contenido_head.html';
	?>
	<META NAME="title" CONTENT="Alquila un Sobrino: Comprado"> 
		<title>Comprado:Alquila un Sobrino</title>
	</head>

	<body>
		
		<!--    AGREGAMOS LA CABECERA CON PHP	-->


		<?php 

		if(isset($_SESSION['Usuario'])){
			$array_usuario=$_SESSION['Usuario'];
			if($array_usuario[0]['Privilegio']=="A"){
				include 'cabecera_admin.html';
			}else if($array_usuario[0]['Privilegio']=="C"){
				include 'cabecera_logeado.html';
			}else{
				include 'cabecera.html';
			}
		}else{
			include 'cabecera.html';
		}
		?>
		<div id="div_Title"><h1 id="sobrinos_Title">COMPRADO</h1></div>
		<div id="contenedor_comprado">
			<?php 
			echo "<center>";
			echo "La compra se ha realizado satisfactoriamente";
			echo "<a href='index.php'>Volver a home. </a>";
			echo "</center>";
			?>
			
			

		</div>


		


		<?php 

		include 'footer.html';
		?>
		

	</body>

	</html>