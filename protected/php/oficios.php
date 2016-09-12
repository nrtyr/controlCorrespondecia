
<?php 

include("seguridad.php");

$con = new SQLite3("../data/usuarios.db");
$cs = $con -> query("SELECT nombre||' '||aPaterno||' '||aMaterno AS NombreC, noEmpleado FROM datos WHERE usuario = '$_SESSION[username]'");
while ($nomUsuario = $cs -> fetchArray()) {
	$nombreUsuario = $nomUsuario['NombreC'];
	$nEmpleado = $nomUsuario['noEmpleado'];
}

$archivoFoto = "../../img/0".$nEmpleado.".png";
$archivoFault = "../../img/usuario.png";

if (file_exists($archivoFoto)) {
	$fotoUsuario =  '<img class="fotito" src="'.$archivoFoto.'" alt="">';
}else{
	$fotoUsuario =   '<img class="fotito" src="'.$archivoFault.'" alt="">';
}
 ?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Control de Oficios</title>
	<link rel="stylesheet" href="../../css/login.css">
	<link rel="stylesheet" href="../../css/normalizer.css">
</head>
<body>
<div class="wrapper">
<div class="login">
	<h3>Bienvenido: <?php  echo $nombreUsuario; ?></h3>
	<br>
	<br>
	<?php  echo $fotoUsuario; ?>
	<br>
	<br>
	<a href="destruir.php">Cerrar....</a>
</div>
</div>
</body>
</html>