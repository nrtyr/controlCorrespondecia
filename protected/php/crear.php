<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charsert=UTF-8");


if (isset($_POST['txtUsuario']) && !empty($_POST['txtUsuario']) && isset($_POST['txtPassword']) && !empty($_POST['txtPassword'])) {
	
	$pw = md5($_POST['txtPassword']);
	$fecha = date("Y-m-d" . " " . "g:i:s a");
	$nomFirma = "../imgf/".$_FILES['fileFirma']['name'];

	$con = new SQLite3("../data/usuarios.db");
	$cs = $con -> query("INSERT INTO datos(usuario,password,nombre,aPaterno,aMaterno,sexo,telCasa,telCelular,noEmpleado,cargo,areaPert,deptoPert,correoAlterno,correoInstitucional,nombreDir,cargoDir,fileFirma,numSerie,fechaCrea) VALUES('$_POST[txtUsuario]','$pw','$_POST[txtNombreU]','$_POST[txtAPaterno]','$_POST[txtAMaterno]','$_POST[optSexo]','$_POST[txtTelCas]','$_POST[txtTelCel]','$_POST[txtNumEmple]','$_POST[optCargo]','$_POST[optAreaPert]','$_POST[optDeptoPert]','$_POST[txtMailAlterno]','$_POST[txtMailInst]','$_POST[txtNomDir]','$_POST[txtCarDir]','$nomFirma','$_POST[txtSerie]','$fecha')");
	$con -> close();

	$carpeta = "../imgf/";
 
	opendir($carpeta);
	$destino = $carpeta . $_FILES['fileFirma']['name'];
	copy($_FILES['fileFirma']['tmp_name'], $destino); 

	echo "<script> alert('Datos Insertados!'); </script>";
	echo "<script> window.location='login.php'; </script>";

}else{

	echo "<script> alert('Faltan Datos!'); </script>";
	echo "<script> window.location='login.php'; </script>";

}





 ?>
