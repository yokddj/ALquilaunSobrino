	<?php
	session_start();
	include 'conexionBD.php';


	$query="select * from usuarios where login='".$_POST['Usuario_login']."' AND 
	 					password='".$_POST['Password_login']."'";
	$resultado=mysqli_query($bd,$query);


		while ($fila=mysqli_fetch_array($resultado)) {
			$array[]=array('Login'=>$fila['login'],'Nombre'=>$fila['nombre'],
				'Apellido'=>$fila['apellido'],'Privilegio'=>$fila['privilegio']);
		}
		if(isset($array)){			
			//Aqui comprobaremos si es un usuario normal o el admin
			$_SESSION['Usuario']=$array;
			header("Location: index.php");	
		}else{
			header("Location: login.php?error=datos no validos");
		}
	?>