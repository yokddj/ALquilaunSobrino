<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<!--    AGREGAMOS HEAD CON PHP	-->
<!-- me mola hacer versiones -->
<head>
	<?php 

		include 'contenido_head.html';
 	?>
 	<META NAME="title" CONTENT="Alquila un Sobrino: Home"> 
 	<title>Alquila un Sobrino</title>
</head>

<body onLoad="setInterval('siguienteImagen()',5000);">
	
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




	<div id="slider">
		
		<div class="slides">
			<img id="imgSlider1"  src="img/slide1.JPG" alt="">
			<a href="clientes.php"><img id="imgSlider2"  src="img/slide2.JPG" alt="Esta es una imagen enlace a clientes"></a>
			<a href="formulario_usuarios.html"><img id="imgSlider3"  src="img/slide3.JPG" alt="Esta es una imagen enlace a Contacto"></a>
			<a href="sobrinos.php"><img id="imgSlider4"  src="img/slide4.JPG" alt="Esta es una imagen enlace a nuestros Sobrinos"></a>
			
		</div>
		<!--
		<figure id="slide_image"><img src="img/slide.jpg" alt="" ></figure>
		<h1>¿Tu ordenador ha dejado de responder <br> y no sabes porque?</h1>
		<h2>No lo dudes, llamanos!</h2>-->
	</div>
		
	<div id="enterprise">
		<h1>Sobre nosotros...</h1>
		<p> Alquila un sobrino, ¿Qué valorarías más para solucionar un problema que la confianza?, ¿En quién piensas primero a la hora de solicitar ayuda? Estas dos preguntas tienen una respuesta en común, la familia. Porque la familia nunca te falla, siempre están disponibles para ayudarte y aportan esa tranquilidad y confianza que todo el mundo desea en sus vidas.Esta filosofía es la que rige nuestra empresa, basada en confianza, seguridad y resultados. Encontrarás múltiples soluciones a múltiples problemas, pero, sobre todo, encontrarás a tu sobrino ideal.<br><br>Estamos formados por un grupo cada día mayor de ingenieros y técnicos que buscan la excelencia y la efectividad por encima de todo, no buscamos barreras ni comodidad, sino hacer del mundo un sitio mejor, enseñando, solucionando y sobre todo animando a todo al mundo a formar parte de ésta inevitable, pero a nuestro punto de ver evolutiva, sociedad tecnológica en la que estamos inmersos. </p>

	</div>
	<div id="members">
		<h1>Los fundadores de Alquila un sobrino</h1>
		<p>Alejandro Gómez y Mario García, nacidos en el año 1994, terminamos nuestros estudios como ingenieros en tecnologías específicas de telecomunicación en la Universidad de Valladolid en el año 2017.
			Formamos esta empresa con el fin de que nadie de nuestro entorno tuviera nunca problemas con sus equipos informáticos, y en caso de tenerlos, que tuviera una solución al alcance de la mano, sin levantarse de su sofá, y con toda la fiabilidad y confianza que alguien de su propia familia puede aportarle.
		</p>
		<div id="fundadores"><img id="imgfundadores"  src="img/fundadores.JPG" alt="Estos somos los fundadores"></div>
		
	</div>


	<?php 

		include 'footer.html';
 	?>
	
	<script>
	function displayMenu(){
			var display;
			var divMenu = document.getElementById("divMenu");
			display = divMenu.style.display;

			if(display=="none"){
				divMenu.style.display="block";
			}else{
				divMenu.style.display="none";
			}

		}

	function siguienteImagen(){
			var display;
			var imgSlider1 = document.getElementById("imgSlider1");
			var imgSlider2 = document.getElementById("imgSlider2");
			var imgSlider3 = document.getElementById("imgSlider3");
			var imgSlider4 = document.getElementById("imgSlider4");
			display1 = imgSlider1.style.display;
			display2 = imgSlider2.style.display;
			display3 = imgSlider3.style.display;
			display4 = imgSlider4.style.display;

			if(display1=="inline"){
				imgSlider1.style.display="none";
				imgSlider2.style.display="inline";
			}else if(display2=="inline"){
				imgSlider2.style.display="none";
				imgSlider3.style.display="inline";
			}
			else if(display3=="inline"){
				imgSlider3.style.display="none";
				imgSlider4.style.display="inline";
			}else{
				imgSlider4.style.display="none";
				imgSlider1.style.display="inline";
			}

		}
	</script>	
</body>

</html>