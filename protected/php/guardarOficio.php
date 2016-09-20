<?php 

include("date.php");
include("seguridad.php");

// Inician Todas las variables

if (isset($_POST['txtCorreo']) && !empty($_POST['txtCorreo'])) {

$NumOfi = $_POST['txtNumOfi'];
$AreaEmi = $_POST['txtAreaEmi'];
$DeptoEmi = $_POST['txtDeptoEmi'];
$PerRecep = $_POST['txtPerRecep'];
$Cargo = $_POST['txtCargo'];
$AreaRecep = $_POST['txtAreaRecep'];
$ContOfi = $_POST['txtContOfi'];
$ArchAdj = $_POST['txtArchAdj'];
$Correo = $_POST['txtCorreo'];
$NumEmp = $_POST['txtNumEmp'];
$NomEnca = $_POST['txtNomEnca'];
$CarEnca = $_POST['txtCarEnca'];
$fecha = date("Y-m-d" . " " . "g:i:s a");

$numSerie = $_SESSION['serie'];
$numEMpleado = $_SESSION['numEmpleado'];
$iconoF =$_SESSION['iconoF'];

// Terminan Todas las variables

// Inicia contFolio (Logs) oficios.db

$con = new SQLite3("../data/oficios.db");
$cs = $con -> query("INSERT INTO contFolio (contF_numFolio, contF_pendiente, contF_entregado, contF_cancelado, contF_serie, contF_numEmp, contF_fechaPen, contF_fechaEnt, contF_fechaCan) VALUES('$NumOfi', '1', '0', '0', '$numSerie', '$numEMpleado', '$fecha','','')");

// Temina contFolio (Logs) oficios.db

// Inicia infoOficios (Toda la Info de los Oficios) oficios.db

$cs2 = $con -> query("INSERT INTO infoOficios (infoOfi_NumOfi, infoOfi_AreaEmi, infoOfi_DeptoEmi, infoOfi_PerRecep, infoOfi_Cargo, infoOfi_AreaRecep, infoOfi_ContOfi, infoOfi_ArchAdj, infoOfi_Correo, infoOfi_NumEmp, infoOfi_DirIcon, infoOfi_NomEnca, infoOfi_CarEnca, infoOfi_Fecha) VALUES('$NumOfi', '$AreaEmi', '$DeptoEmi', '$PerRecep', '$Cargo', '$AreaRecep', '$ContOfi', '$ArchAdj', '$Correo', '$NumEmp', '$iconoF','$NomEnca', '$CarEnca', '$fecha')");

// Inicia infoOficios (Toda la Info de los Oficios) oficios.db

$con -> close();

$dirOficio = "http://nicolasromero.mx/oficios/buscador/oficios.php?numOficio=".$NumOfi;
$dirOficio2 = '

 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">
 	<title>'.$NumOfi.'</title>
 </head>
 <body>
 	<p>Puedes ver tu oficio en la siguiente dirección: <a href="'.$dirOficio.'">'.$dirOficio.'</a></p>
 </body>
 </html>

';

$email_to = $Correo;
$email_subject = "Tienes un Oficio de: ".$AreaEmi." pendiente!";
$email_message = $dirOficio2."\n\n";
 
 
// Ahora se envía el e-mail usando la función mail() de PHP

// $headers = 'From: '.$email_from."\r\n".
// 'Reply-To: '.$email_from."\r\n" .
// 'X-Mailer: PHP/' . phpversion();
$headers  = "From: $from\r\n"; 
$headers .= "Content-type: text/html; Charset=UTF-8\r\n";
@mail($email_to, $email_subject, $email_message, $headers);


echo "<script> alert('Oficio Enviado!'); </script>";
echo "<script> window.location='creaOficios.php'; </script>";


}else{
	echo "<script> alert('Falta Correo!'); </script>";
	echo "<script> window.location='creaOficios.php'; </script>";
}





// Inicia contFolio

 ?>