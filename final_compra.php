<?php  
session_start();
include 'conexionBD.php';
$dia=$_GET['dia'];
$mes=$_GET['mes'];
$ano=$_GET['ano'];
$array_usuario=$_SESSION['Usuario'];

$usuario=$array_usuario[0]['Login'];
$coste=$_SESSION['precio_total'];
$array_carrito=$_SESSION['carrito'];


//Insertamos la compra en pedidos
$query="instert into pedidos (NULL,'".$usuario."',".$coste.",'".$ano."-".$mes."-".$dia."')";	
$resultado=mysqli_query($bd,$query);




//Aqui debemos saber el id_pedido guardado anteriormente

$query="select * from pedidos where login='".$usuario."' AND coste_total=".$coste." AND fecha='".$ano."-".$mes."-".$dia."'";	
$resultado=mysqli_query($bd,$query);


while ($fila=mysqli_fetch_array($resultado)) {

			$id_pedido=$fila['id_pedido'];
		}

//Insertamos la compra en pedido_ingeniero

for($i=0;$i<count($array_carrito);$i++){

		$query="insert into pedido_ingeniero ('".$id_pedido."','".$array_carrito[$i]['Id']."')";
		$resultado=mysqli_query($bd,$query);

		//Ahora hacemos que el ingeniero pase a estado no disponible

		$query = "update ingenieros set disponibilidad='2' where id_ingeniero='".$array_carrito[$i]['Id']."'";
		mysqli_query($bd,$query);
}
		



unset($_SESSION['carrito']);

echo "La compra se ha realizado satisfactoriamente"
	


?>