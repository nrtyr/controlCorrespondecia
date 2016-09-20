<?php

include("../protected/php/fecha.php");

echo'

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=devicewidth, minimal-ui">
	<title>'.$numOficio.'</title>
	<link rel="stylesheet" href="../protected/php/plantilla/css/plantilla.css ">
	<link rel="stylesheet" href="plantilla/css/font-awesome.css">
	<link rel="stylesheet" href="../css/normalize.css" />
	<link rel="stylesheet" href="../css/controles.css">
	
</head>
<!-- <body onload="window.print();"> -->
<body>
	<div class="wrapper">
		<div class="cHojaMem">
			
';
include("../protected/php/plantilla/escudo.php");
include("../protected/php/plantilla/logo.php");
include("../protected/php/plantilla/lineagris.php");
include("../protected/php/plantilla/icon2.php");
echo'


<!-- 		################### Inicia Titulo ################### -->
<div class="encaHoja">
	<h3>"2016, Año del Centenario de la Instalación del Congreso Constituyente"</h3>
</div>
<!-- 		################### Termina Titulo ################### -->








<!-- 		################### Inicia Aplicación ################### -->



<div class="datosDireccion">
	<!-- Numero de Oficio -->
	'.  $numOficio .'
	<br>
	<!-- Area Emisora -->
	'.  $areaEmisora .'
	<br>
	<!-- Depto Emisor -->
	'. $deptoEmisora .'
	<br>
	Ciudad Nicolás Romero, Edo. Méx.: a 
	<!-- Fecha -->
	'. $dia." de ".$mes." del ".$ano .'

</div>

<div class="datosDestino">
	<!-- Persona Receptora -->
	'. $personaRecep .'
	<br>
	<!-- Cargo -->
	'. $cargo .'
	<!-- Area Receptora -->
	<br>
	'. $areaRecep .'
	<br>
	P R E S E N T E

</div>

<div class="controlOficios">
	<div class="textoOficio">
	<br>
	<!-- Contenido del Oficio -->
	'. $contOficio .'
	</div>
</div>
	<div class="cuadroFirma">
	<br>
		A T E N T A M E N T E:
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<img src="../protected/php/plantilla/firma.png" class="icon">
		<br>
		__________________________
		<br>
		'. $nombreEnca .'
		<br>
		'. $cargoEnca .'

	</div>
<img src="../protected/php/qr.php?idOficio='. 'http://nicolasromero.mx/oficios/buscador/oficios.php?numOficio='.$numOficio .'" class="cuadroQR">

<!-- 		################### Termina Aplicación ################### -->




';

include("../protected/php/plantilla/linearoja.php");
include("../protected/php/plantilla/piedepagina.php");
include("../protected/php/plantilla/marcadeagua.php");

echo'



<!-- 		################### Inicia Marca de Agua Solo Texto ################### -->


<div class="textoPie">
	Av. Benito Juárez S/N, Col. Centro, C.P. 54400, Municipio Nicolás Romero, Edo, Méx.
</div>
<!-- 		################### Termina Marca de Agua Solo Texto ################### -->


		</div>
	</div>

</body>
</html>
';
?>