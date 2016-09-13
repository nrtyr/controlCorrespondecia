<?php 
// include("seguridad.php");
include("date.php");
include("seguridad.php");
session_start();

$numOficio = $_POST['txtNumFolio'];
$areaEmisora  = $_POST['optAreaPertE'];
$deptoEmisora = $_POST['optDeptoPertE'];
$personaRecep = strtoupper($_POST['txtNombPersona']);
$personaRecep = strtr($personaRecep, "áéíóú", "ÁÉÍÓÚ");
$cargo = strtoupper($_POST['txtCargo']);
$cargo = strtr($cargo, "áéíóú", "ÁÉÍÓÚ");
$areaRecep    = $_POST['optAreaRece'];
$contOficio   = nl2br($_POST['txtContOficio']);
$archAdjunto  = $_POST['archAdjunto'];
$numEMpleado = $_POST['txtNumEmp'];
$nombreEnca  = $_POST['txtNomDir'];
$cargoEnca  = $_POST['txtCarDir'];

$_SESSION['numOficio'] = $numOficio;
$_SESSION['areaEmisora'] = $areaEmisora;
$_SESSION['deptoEmisora'] = $deptoEmisora;
$_SESSION['personaRecep'] = $personaRecep;
$_SESSION['cargo'] = $cargo;
$_SESSION['contOficio'] = $contOficio;
$_SESSION['archAdjunto'] = $archAdjunto;
$_SESSION['numEMpleado'] = $numEMpleado;
$_SESSION['nombreEnca'] = $nombreEnca;
$_SESSION['cargoEnca'] = $cargoEnca;


// Si esta vacío se regresa

if (isset($numEMpleado) && !empty($numEMpleado)) {
	# code...
}else{
	echo "<script> window.location='creaOficios.php'; </script>";
}
// Si esta vacío se regresa



 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=devicewidth, minimal-ui">
	<title><?php echo $numOficio; ?></title>
	<link rel="stylesheet" href="plantilla/css/plantilla.css">
	<link rel="stylesheet" href="plantilla/css/font-awesome.css">
	<link rel="stylesheet" href="../../css/normalize.css" />
	<link rel="stylesheet" href="../../css/controles.css">
	
</head>
<!-- <body onload="window.print();"> -->
<body>
	<div class="wrapper">
		<div class="cHojaMem">
			
<?php 
include("plantilla/escudo.php");
include("plantilla/logo.php");
include("plantilla/lineagris.php");
include("plantilla/icon.php")
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
		<img src="plantilla/firma.png" class="icon">
		<br>
		__________________________
		<br>
		<?php echo $nombreEnca; ?>
		<br>
		<?php echo $cargoEnca; ?>

	</div>
<img src="qr.php?idOficio=<?php echo 'http://nicolasromero.mx/oficios/buscador/oficios.php?numOficio='.$numOficio; ?>" class="cuadroQR">

<!-- 		################### Termina Aplicación ################### -->




<?php 

include("plantilla/linearoja.php");
include("plantilla/piedepagina.php");
include("plantilla/marcadeagua.php");

 ?>



<!-- 		################### Inicia Marca de Agua Solo Texto ################### -->


<div class="textoPie">
	Av. Benito Juárez S/N, Col. Centro, C.P. 54400, Municipio Nicolás Romero, Edo, Méx.
</div>
<!-- 		################### Termina Marca de Agua Solo Texto ################### -->

<div class="controles">
	<form action="guardarOficio.php" method="post">
		<br>
		<br>
		<h2>Para continuar ingresa Correo Electrónico</h2>
		<br>
		<div class="btImprimir">
		<a href="plantillaOficiosQrImp.php" class="impreLink" target="_blank"><i class="fa fa-print fa-3x" aria-hidden="true"><p>Imprimir</p></i></a>
		</div>
		<br>
		<br>
		<input type="text" name="txtNumOfi" value="<?php echo $numOficio; ?>" class="inputOculto"/>
		
		<input type="text" name="txtAreaEmi" value="<?php echo $areaEmisora; ?>" class="inputOculto"/>
		
		<input type="text" name="txtDeptoEmi" value="<?php echo $deptoEmisora; ?>" class="inputOculto"/>
		
		<input type="text" name="txtPerRecep" value="<?php echo $personaRecep; ?>" class="inputOculto"/>
		
		<input type="text" name="txtCargo" value="<?php echo $cargo; ?>" class="inputOculto"/>
		
		<input type="text" name="txtAreaRecep" value="<?php echo $areaRecep; ?>" class="inputOculto"/>
		
		<input type="text" name="txtContOfi" value="<?php echo $contOficio; ?>" class="inputOculto"/>
		
		<input type="text" name="txtArchAdj" value="<?php echo $archAdjunto; ?>" class="inputOculto"/>
		
		<input type="mail" name="txtCorreo" placeholder="Correo Institucional.." class="inputGrande" />
		
		<input type="text" name="txtNumEmp" value="<?php echo $numEMpleado; ?>" class="inputOculto"/>
		
		<input type="text" name="txtNomEnca" value="<?php echo $nombreEnca; ?>" class="inputOculto"/>
		
		<input type="text" name="txtCarEnca" value="<?php echo $cargoEnca; ?>" class="inputOculto"/>
		<br>
		<br>

		<input type="submit" value="Enviar" class="btGrande" />
		<br>
		<br>
		<br>
		<a href="creaOficios.php" class="linkBack">Regresar...</a>
		<br>
		<br>
	</form>
</div>
		</div>
	</div>

</body>
</html>