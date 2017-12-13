<?php  
include 'conexionBD.php';
if(isset($_GET['id'])){
		
			//Buscamos el ingeniero que acabamos de añadir al carro
		$query="delete from ingenieros where id_ingeniero=".$_GET['id'];	
		$resultado=mysqli_query($bd,$query);
		header("Location: editar_sobrinos.php");	
		
	}
	?>