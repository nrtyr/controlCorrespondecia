<?php 

header("Content-Type: text/html; Charset=UTF-8");
error_reporting(E_ALL ^ E_DEPRECATED);


$codigoQR = $_GET['numOficio'];

// ?numOficio=SIS/0001/2016/V


$con = new SQLite3("../protected/data/oficios.db");
$cs = $con -> query("SELECT * FROM infoOficios WHERE infoOfi_NumOfi = '$codigoQR'");
while ($res = $cs -> fetchArray()) {
	$numOficio = $res['infoOfi_NumOfi'];
	$areaEmisora = $res['infoOfi_AreaEmi'];
	$deptoEmisora = $res['infoOfi_DeptoEmi'];
	$personaRecep = $res['infoOfi_PerRecep'];
	$cargo = $res['infoOfi_Cargo'];
	$areaRecep = $res['infoOfi_AreaRecep'];
	$contOficio = $res['infoOfi_ContOfi'];
	$archAdjunto = $res['infoOfi_ArchAdj'];
	$numEMpleado = $res['infoOfi_NumEmp'];
	$nombreEnca = $res['infoOfi_NomEnca'];
	$cargoEnca = $res['infoOfi_CarEnca'];
	$fecha = $res['infoOfi_Fecha'];
}

$con -> close();

include("../protected/php/fecha.php");

if ($codigoQR == $numOficio) {
	# code...
}else{
	$numOficio = "";
	$areaEmisora = "";
	$deptoEmisora = "";
	$personaRecep = "";
	$cargo = "";
	$areaRecep = "";
	$contOficio = "";
	$archAdjunto = "";
	$numEMpleado = "";
	$nombreEnca = "";
	$cargoEnca = "";
	$fecha = 0;
	echo "<script> alert('No tengo resultados!');</script>";
	echo "<script> window.location='../index.php';</script>";
}


// Si esta vacío se regresa

// Si esta vacío se regresa

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=devicewidth, minimal-ui">
	<title><?php echo $numOficio; ?></title>
	<link rel="stylesheet" href="../protected/php/plantilla/css/plantilla.css ">
	<link rel="stylesheet" href="plantilla/css/font-awesome.css">
	<link rel="stylesheet" href="../css/normalize.css" />
	<link rel="stylesheet" href="../css/controles.css">
	
</head>
<!-- <body onload="window.print();"> -->
<body>
	<div class="wrapper">
		<div class="cHojaMem">
			
<?php 
include("../protected/php/plantilla/escudo.php");
include("../protected/php/plantilla/logo.php");
include("../protected/php/plantilla/lineagris.php");
include("../protected/php/plantilla/icon2.php")
 ?>


<!-- 		################### Inicia Titulo ################### -->
<div class="encaHoja">
	<h3>"2016, Año del Centenario de la Instalación del Congreso Constituyente"</h3>
</div>
<!-- 		################### Termina Titulo ################### -->








<!-- 		################### Inicia Aplicación ################### -->



<div class="datosDireccion">
	<!-- Numero de Oficio -->
	<?php echo  $numOficio; ?>
	<br>
	<!-- Area Emisora -->
	<?php echo  $areaEmisora; ?>
	<br>
	<!-- Depto Emisor -->
	<?php echo $deptoEmisora; ?>
	<br>
	Ciudad Nicolás Romero, Edo. Méx.: a 
	<!-- Fecha -->
	<?php echo $dia." de ".$mes." del ".$ano; ?>

</div>

<div class="datosDestino">
	<!-- Persona Receptora -->
	<?php echo $personaRecep; ?>
	<br>
	<!-- Cargo -->
	<?php echo $cargo; ?>
	<!-- Area Receptora -->
	<br>
	<?php echo $areaRecep; ?>
	<br>
	P R E S E N T E

</div>

<div class="controlOficios">
	<div class="textoOficio">
	<br>
	<!-- Contenido del Oficio -->
	<?php echo $contOficio; ?>
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
		<?php echo $nombreEnca; ?>
		<br>
		<?php echo $cargoEnca; ?>

	</div>
<img src="../protected/php/qr.php?idOficio=<?php echo 'http://nicolasromero.mx/oficios/buscador/oficios.php?numOficio='.$numOficio; ?>" class="cuadroQR">

<!-- 		################### Termina Aplicación ################### -->




<?php 

include("../protected/php/plantilla/linearoja.php");
include("../protected/php/plantilla/piedepagina.php");
include("../protected/php/plantilla/marcadeagua.php");

 ?>



<!-- 		################### Inicia Marca de Agua Solo Texto ################### -->


<div class="textoPie">
	Av. Benito Juárez S/N, Col. Centro, C.P. 54400, Municipio Nicolás Romero, Edo, Méx.
</div>
<!-- 		################### Termina Marca de Agua Solo Texto ################### -->


		</div>
	</div>

</body>
</html>