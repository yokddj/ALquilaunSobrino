<?php 
	session_start();
	include 'conexionBD.php';
	if(isset($_SESSION['carrito'])){
		if(isset($_GET['id'])){
					$array_sesion=$_SESSION['carrito'];
					$encontro=false;
					$numero=0;
					for($i=0;$i<count($array_sesion);$i++){
						if($array_sesion[$i]['Id']==$_GET['id']){
							$encontro=true;
							$numero=$i;
						}
					}
					if($encontro==true){
						$_SESSION['carrito']=$array_sesion;
					}else{
						$nombre="";
						$precio=0;
						$imagen="";
						$re=mysql_query("select * from ingenieros where id_ingeniero=".$_GET['id']);
						while ($f=mysql_fetch_array($re)) {
							$nombre=$f['nombre'];
							$precio=$f['precio'];
							$imagen=$f['foto'];
						}
						$datosNuevos=array('Id'=>$_GET['id'],
										'Nombre'=>$nombre,
										'Precio'=>$precio,
										'Imagen'=>$imagen);

						array_push($array_sesion, $datosNuevos);
						$_SESSION['carrito']=$array_sesion;

					}
		}




	}else{
		if(isset($_GET['id'])){
			$nombre="";
			$precio=0;
			$imagen="";
			$re=mysql_query("select * from ingenieros where id_ingeniero=".$_GET['id']);
			while ($f=mysql_fetch_array($re)) {
				$nombre=$f['nombre'];
				$precio=$f['precio'];
				$imagen=$f['foto'];
			}
			$array_sesion[]=array('Id'=>$_GET['id'],
							'Nombre'=>$nombre,
							'Precio'=>$precio,
							'Imagen'=>$imagen);
			$_SESSION['carrito']=$array_sesion;
		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php 

		include 'contenido_head.html';
 	?>
 	<META NAME="title" CONTENT="Alquila un Sobrino: Carrito"> 
	<title>CARRITO</title>
</head>
<body>

	<!--    AGREGAMOS LA CABECERA CON PHP	-->

	<?php 

		include 'cabecera.html';
 	?>
	<div id="contenedor_carrito">
		
		
		<?php 
		$total=0;
		//Comprobamos que exista la variable de sesion
		if(isset($_SESSION['carrito'])){
			$datos=$_SESSION['carrito']; //Guardamos lo que trae la variable de sesion
			
			$total=0;
			for($i=0;$i<count($datos);$i++){
				
		?>
				<div class="producto_carrito">
					<center>
						<img src="img/<?php echo $datos[$i]['Imagen'];?>"><br>
						<span><?php echo $datos[$i]['Nombre'];?></span><br>
						<span>Precio: <?php echo $datos[$i]['Precio'];?></span><br>
												
					</center>
				</div>
			<?php
				$total=($datos[$i]['Precio'])+$total;
			}
				
			}else{
				echo '<center><h2>No has añadido ningun producto</h2></center>';
			}
			echo '<center><h2>Total: '.$total.'</h2></center>';

		 ?>
		<center><a href="sobrinos.php">Volver al catalogo</a></center>


	</div>

	<?php 

		include 'footer.html';
 	?>
</body>
</html>







