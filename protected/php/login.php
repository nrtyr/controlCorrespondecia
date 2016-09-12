 
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Inicio</title>
	<link rel="stylesheet" href="../../css/login.css" />
	<link rel="stylesheet" href="../../css/normalize.css" />
</head>
<body>
<div class="wrapper">
	<div class="login">
		<div class="cLogin"></div>
		<br>
		<br>
		<h3>Iniciar sesión</h3>
		<br>
		<br>
		<form action="verificar.php" method="post" name="login">

			<input type="text" name="txtNombre" placeholder="Usuario" class="uLogin" />
			<br>
			<input type="password" name="txtPassword" placeholder="Password"  class="pLogin" />
			<br>
			<br>
			
			<input type="submit" value="Entrar" class="btLogin" />
		</form>
		<br>
		<br>
		<a href="registrar.php">Crear Cuenta....</a>
	</div>
</div>
</body>
</html>

