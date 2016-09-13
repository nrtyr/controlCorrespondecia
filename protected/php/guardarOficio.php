<?php 

include("date.php");
include("seguridad.php");

// Inician Todas las variables

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

echo "<script> alert('Datos Insertados!'); </script>";
echo "<script> window.location='creaOficios.php'; </script>";



// Inicia contFolio

 ?>