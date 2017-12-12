<?php
	//VALORES INIVIALES
	//funcion date devuelve año actual, meses de ese año, y dias del mes que estemos
	$mes=date('m');//
	echo $mes;
	echo "-";
	$ano=date('Y');
	echo $ano;
	echo "-";
	$diaActual=date('j');
	echo $diaActual;
	echo "/";

	$diaSemana=date('w'); //ojo que el 0 es domingo
	echo $diaSemana;
	echo "/";

	$numeroDiasMes=date('t');
	echo $numeroDiasMes;
	echo "/";

	$ultimoDiaMes=date('d',(mktime(0,0,0,$mes+1,1,$ano)-1));
	echo $ultimoDiaMes; 

	//Fromamos el array de los meses
	$meses=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
	"Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"); //+1 para que Enero sea el primero

	
	