		<?php 
		session_start();
		include 'conexionBD.php';


		if(isset($_SESSION['carrito'])){//Aqui entrara si ya hay alguien en el carro
				if(isset($_GET['id'])){
							$array_sesion=$_SESSION['carrito'];
							$encontro=false;
							for($i=0;$i<count($array_sesion);$i++){
								if($array_sesion[$i]['Id']==$_GET['id']){
									$encontro=true;
								}
							}
							if($encontro==true){
								//En este caso no hacemos nada porque el ingeniero ya estaba en el carrito
								echo '<script language="javascript">alert("El ingeniero ya estaba en el carrito");</script>'; 
							}else{
								$nombre="";
								$precio=0;
								$imagen="";
								//Buscamos el ingeniero que acabamos de añadir al carro
								$query="select * from ingenieros where id_ingeniero=".$_GET['id'];	
								$resultado=mysqli_query($bd,$query);
								
								//Lo guardamos en la variable de sesion
								while ($fila=mysqli_fetch_array($resultado)) {
									
									$nombre=$fila['nombre'];
									$precio=$fila['precio'];
									$imagen = trim($fila['foto']);
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
				//Aqui entrara la primera vez que añadamos alguien al carro
				if(isset($_GET['id'])){
					$nombre="";
					$precio=0;
					$imagen="";
					//Buscamos el ingeniero que acabamos de añadir al carro
					$query="select * from ingenieros where id_ingeniero=".$_GET['id'];	
					$resultado=mysqli_query($bd,$query);
					
					//Lo guardamos en la variable de sesion
					while ($fila=mysqli_fetch_array($resultado)) {
						
						$nombre=$fila['nombre'];
						$precio=$fila['precio'];
						$imagen = trim($fila['foto']);
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
		 	<div id="div_Title"><h1 id="carrito_Title">CARRITO</h1></div>
		
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
								<div class="div_imagen_carrito"><img src="img/<?php echo $datos[$i]['Imagen'];?>"></div>
								<h2><?php echo $datos[$i]['Nombre'];?></h2>
								<p>Precio: <?php echo $datos[$i]['Precio'];?> €</p>
								<?php echo '<div id="boton_Eliminar" ><a href=#>ELIMINAR</a></div>';	 ?>			
							</center>
						</div>

						
		
			

					<?php
						$total=($datos[$i]['Precio'])+$total;
					}
						
					}else{
						echo '<center><h2>No has añadido ningun producto</h2></center>';
					}
					echo '<center><h2>Total: '.$total.' €</h2></center>';
					if($total!=0){
						echo '<center><div id="boton_Compra" ><a href="#">COMPRAR</a></div></center>';
					}

				 ?>
				<center><a href="sobrinos.php">Volver al catalogo</a></center>


			</div>

			<?php 

				include 'footer.html';
		 	?>
		</body>
		</html>







