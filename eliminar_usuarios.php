<?php  
include 'conexionBD.php';
if(isset($_GET['login'])){
		
			//Buscamos el ingeniero que acabamos de añadir al carro
		$query="delete from usuarios where login=".$_GET['login'];	
		$resultado=mysqli_query($bd,$query);
		header("Location: editar_usuarios.php");	
		
	}
	?>