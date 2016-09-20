<?php 

header("Content-Type: text/html; Charset=UTF-8");
error_reporting(E_ALL ^ E_DEPRECATED);




// ?numOficio=SIS/0001/2016/V

if (isset($_GET['numOficio']) && !empty($_GET['numOficio'])) {

	$codigoQR = $_GET['numOficio'];

	$numOficio = "";


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

if ($codigoQR == $numOficio) {

include("plantilla.php");

}else{
	echo "No Tengo Resultados";
	echo "<script> alert('No tengo resultados!');</script>";
	echo "<script> window.location='../index.php';</script>";
}


}else{
	
	echo '

	 <html>
		<meta http-equiv="REFRESH" content="0; url=../index.php">
	 </html>

		';
}




// Si esta vacío se regresa

// Si esta vacío se regresa

 ?>

 <html></html>