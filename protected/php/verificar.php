<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charsert=UTF-8");

session_start();

if (isset($_POST['txtNombre']) && !empty($_POST['txtNombre']) &&
	isset($_POST['txtPassword']) && !empty($_POST['txtPassword'])) {

	$pass = md5($_POST['txtPassword']); 

	$con = new SQLite3("../data/usuarios.db");
	$cs = $con -> query("SELECT * FROM datos WHERE usuario = '$_POST[txtNombre]'");
	while ($resultado = $cs -> fetchArray()) {
		$resContra = $resultado['password'];
		$noEmpleado = $resultado['noEmpleado'];
	}

	$con -> close();

	if ($pass == $resContra) {
		$_SESSION['username'] = $_POST['txtNombre'];
		$_SESSION['numEmpleado'] = $noEmpleado;
		echo "<script> window.location='creaOficios.php'; </script>";
	}else{
		echo "<script> alert('Usuario o Password Incorrectos!'); </script>";
	echo "<script> window.location='../../index.php'; </script>";
	}

	

}else{
	echo "<script> alert('Falta Usuario o Password'); </script>";
	echo "<script> window.location='../../index.php'; </script>";
}





 ?>