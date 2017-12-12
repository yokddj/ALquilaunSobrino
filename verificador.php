	<?php
	session_start();
	include 'conexionBD.php';


	$query="select * from usuarios where login='".$_POST['Usuario_login']."' AND 
	 					password='".$_POST['Password_login']."'";
	$resultado=mysqli_query($bd,$query);


		while ($fila=mysqli_fetch_array($resultado)) {
			$array[]=array('Nombre'=>$fila['nombre'],
				'Apellido'=>$fila['apellido'],'Privilegio'=>$fila['privilegio']);
		}
		if(isset($array)){
			//Aqui comprobaremos si es un usuario normal o el admin
				if($array[0]['Privilegio']=="A"){
					$_SESSION['Usuario']=$array;
					header("Location: index.php");
				}else{
					$_SESSION['Usuario']=$array;
					header("Location: index.php");

				}
				//$_SESSION['Usuario']=$array;
				//echo "Hola ".$array[0]['Nombre']." con apellido ".$array[0]['Apellido']." Te has registrado como: ".$array[0]['Privilegio']."";
				
				//header("Location: admin.php");
			

		}else{
			header("Location: login.php?error=datos no validos");
		}
	?>