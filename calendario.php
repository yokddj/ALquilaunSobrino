<?php
session_start();



	//VALORES INIVIALES
	//funcion date devuelve año actual, meses de ese año, y dias del mes que estemos
	$mesActual=date('m');//
	$anoActual=date('Y');
	$diaActual=date('j');

	$diaSemana=date("w",mktime(0,0,0,$mesActual,1,$anoActual));
	

	if ($diaSemana==0) {
		$diaSemana=7;
	}
	

	//$ultimoDiaMes=date('d',(mktime(0,0,0,$mesActual+1,1,$anoActual)-1));
	$ultimoDiaMes=date('t');

	
	//Fromamos el array de los meses
	$meses=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
	"Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"); //+1 para que Enero sea el primero
	?>

	<html lang="es">
	<head>
		<?php
			include 'contenido_head.html';
		?>
		<META NAME="title" CONTENT="Alquila un Sobrino: Calendario Compra"> 
		<title>Calendario:Alquila un Sobrino</title>
		<meta charset="utf-8">

		<style type="text/css">
		a{
			text-decoration: none;
		}
		#table {
			font-family:Arial; 
			font-size:12px;
			color: black; 
		}
		#titulo{
			text-align:center;
			padding:5px 10px;
			background-color:#58C3FA;
			color:#fff;
			font-weight:bold;
		}
		#cabecera {
			background-color:#F743EC;
			color:#fff;
			width:40px;
			font-weight:bold;
		}
		#cuerpo {
			padding:3px;
			background-color:silver;
		}
		#diaActual{
			background-color:#FA3F3F;
		}
		</style>
	</head>

<body>
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
	<div id="div_Title"><h1 id="sobrinos_Title">CALENDARIO</h1></div>
	<div id="contenedor_admin">
		<center>
		<table id="table">
			<content id="titulo"><?php echo "Hoy es: " .$diaActual. " de " .$meses[$mesActual]. " de " .$anoActual. " "?></content>
			<br>
			<br>
			<tr id="cabecera"> <!--Contenedor de filas de celdas FILA DIAS-->
				<th>L</th><th>M</th><th>X</th><th>J</th><th>V</th><th>S</th><th>D</th> <!--Celda que actua de cabecera de columna-->
			</tr>
			<tr id="cuerpo">
				<?php 
				$celda=1;


				for($j=1; $j<$diaSemana; $j++)
				{
					echo "<td>&nbsp;</td>";
				}
				for($j=$diaSemana; $j<=7; $j++)
				{
				//ponemos que dia es
					if ($celda==$diaActual) {
						echo '<td id= "diaActual"><a href="final_compra.php?dia='.$diaActual.'&mes='.$mesActual.'&ano='.$anoActual.'">'. $celda .'</a></td>';
					}
					else{
						echo '<td><a href="final_compra.php?dia='.$diaActual.'&mes='.$mesActual.'&ano='.$anoActual.'"> '. $celda .'</a></td>';
					}
					$celda++;
				}

				echo "</tr>";
				$num_semanas=ceil(($ultimoDiaMes-($celda-1))/7);

					//Bucle para las celdas
					for ($i=0; $i<$num_semanas; $i++) //De la 1 a El dia en que estamos + dias que tiene el mes
					{

						echo "<tr id='cuerpo'>";
						for($j=1; $j<=7; $j++)
						{

							if($celda>$ultimoDiaMes) {
								echo "<td>&nbsp;</td>";
							}
							else
							{
								//ponemos que dia es
								if ($celda==$diaActual) {
									echo '<td id= "diaActual"><a href="final_compra.php?dia='.$diaActual.'&mes='.$mesActual.'&ano='.$anoActual.'">'. $celda .'</a></td>';
								}
								else{
									echo '<td><a href="final_compra.php?dia='.$diaActual.'&mes='.$mesActual.'&ano='.$anoActual.'">'. $celda .'</a></td>';
								}
							}
							$celda++;
						}
						echo "</tr>";
					}

					?>
				</table></center>
			</div>

			<?php 

			include 'footer.html';
			?>
		</body>
		</html>


