  <?php
  session_start();
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
  	<?php 

      include 'contenido_head.html';
    ?>
  	<!--  -------------------META--------------- -->
    <META NAME="title" CONTENT="Alquila un Sobrino: Clientes"> 
    
  	<title>Clientes: Alquila un Sobrino</title>
  	
  </head>
  <body>
  	<!--    AGREGAMOS LA CABECERA CON PHP  -->

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
  <div id="div_Title"><h1 id="client_Title">CLIENTES</h1></div>
  	 <div class="contenedor-clientes">

      <!----------------------------ETSIT-------------------------------- -->
        <div class="div-img" >
          <img class="img-etsit" id="btn" src="img/logo/ETSIT_pq.jpg" title="Pulse para obtener más información" alt="etsit"/>
            <div class="text-etsit">
              Desde 2012 hemos mantenido una estrecha relacion con la Universidad de Valladolid, ya que se han dejado asesorar por nuestros sobrinos para la reparación y mantenimiento de sus equipos informáticos. 
          </div>
        </div>
    <!----------------------------PASCUAL-------------------------------- -->
        <div class="div-img" >
          <img class="img-pascual" src="img/logo/logoPascual.png" title="Pulse para obtener más información" alt="Pascual"/>
          <div class="text-pascual">
             Desde 2012 hemos mantenido una estrecha relacion con Pascual, ya que se han dejado asesorar por nuestros sobrinos para la reparación y mantenimiento de sus equipos informáticos. 
          </div>
        </div>
    
  <!----------------------------MICHELIN-------------------------------- -->
        <div class="div-img" >
          <img class="img-michelin" src="img/logo/logoMichelin.png" title="Pulse para obtener más información" alt="Michelin"/>
          <div class="text-michelin">
            Desde 2012 hemos mantenido una estrecha relacion con Michelin, ya que se han dejado asesorar por nuestros sobrinos para la reparación y mantenimiento de sus equipos informáticos.
          </div>
        </div>

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

  	function desplegarInformación(){
  			

  		}
  	</script>
  	<script type="text/javascript"> 
          jQuery(document).ready(function() {
            var estado_etsit = 0;
            var estado_pascual = 0;
            var estado_michelin = 0;
            
            
           

               jQuery(".img-etsit").click(function(){
                if(estado_etsit==0){
                    jQuery(this).animate({left: '-200px' },2000);
                    jQuery(".text-etsit").animate({left: '200px' },2000);
                    estado_etsit=1;
                }else{
                    jQuery(this).animate({left: '0px' },2000);
                    jQuery(".text-etsit").animate({left: '0px' },2000);
                    estado_etsit=0;
                }
                 
               });

                jQuery(".img-pascual").click(function(){
                 if(estado_pascual==0){
                    jQuery(this).animate({left: '200px' },2000);
                    jQuery(".text-pascual").animate({left: '-200px' },2000);
                  estado_pascual=1;
                }else{
                    jQuery(this).animate({left: '0px' },2000);
                    jQuery(".text-pascual").animate({left: '0px' },2000);
                    estado_pascual=0;
                }
               });
                
                jQuery(".img-michelin").click(function(){
                 if(estado_michelin==0){
                    jQuery(this).animate({left: '-200px' },2000);
                    jQuery(".text-michelin").animate({left: '200px' },2000);
                    estado_michelin=1;
                }else{
                    jQuery(this).animate({left: '0px' },2000);
                    jQuery(".text-michelin").animate({left: '0px' },2000);
                    estado_michelin=0;
                }
               });
                
           });
            
  </script>  	
  </body>

  </html>