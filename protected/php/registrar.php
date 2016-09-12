<?php 

$con = new SQLite3("../data/trabajadores.db");
$csdepto = $con -> query("SELECT DEPARTAMENTO FROM mayo_1ra_2016 WHERE DEPARTAMENTO NOT LIKE 'NULL' GROUP BY DEPARTAMENTO ORDER BY DEPARTAMENTO");

 ?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Registrar Usuario</title>
	<link rel="stylesheet" href="../../css/login.css">
	<link rel="stylesheet" href="../../css/normalize.css" />
</head>
<body>
	<div class="cReg">
		<h3>Registro de Usuarios</h3>
		<br>
		<form action="crear.php" method="post" enctype="multipart/form-data">
			<p>Datos personales</p>
			<input type="text" name="txtUsuario" placeholder="Nombre de Usuario *" class="uLogin" required/>
			<br>
			<input type="password" name="txtPassword" placeholder="Password de Usuario *" class="nLogin" required/>
			<br>
			<input type="text" name="txtNombreU" placeholder="Nombre" class="nLogin" />
			<br>
			<input type="text" name="txtAPaterno" placeholder="Apellido Paterno" class="nLogin" />
			<br>
			<input type="text" name="txtAMaterno" placeholder="Apellido Materno" class="nLogin" />
			<br>
			<p>Sexo</p>
			<select name="optSexo" class="nOptLogin">
				<option value="M">MUJER</option>
				<option value="H">HOMBRE</option>
			</select>
			<input type="text" name="txtTelCel" placeholder="Teléfono de Celular" class="nLogin" />
			<br>
			<input type="text" name="txtTelCas" placeholder="Teléfono de Casa" class="nLogin" />
			<br>
			<input type="text" name="txtNumEmple" placeholder="Núm de Empleado" class="pLogin" required/>
			<br>
			<br>
			<p>Cargo</p>
			<select name="optCargo" class="nOptLogin">
				<option value="ASISTENTE">ASISTENTE</option>
				<option value="AUXILIAR ADMIN.">AUXILIAR ADMIN.</option>
				<option value="DIRECTOR(A)">DIRECTOR(A)</option>
				<option value="ENLACE ADMIN.">ENLACE ADMIN.</option>
				<option value="SECRETARIA">SECRETARIA</option>
			</select>
			<br>
			<p>Área a la que pertenece</p>
			<select name="optAreaPert" class="nOptLogin">
				<?php  
					while ($optArea = $csdepto -> fetchArray()){
						$resOptArea = $optArea['DEPARTAMENTO'];

						echo '
							<option value="'.$resOptArea .'">'.$resOptArea .'</option>
						';
					}

				?>
				
			</select>
			<br>
			<p>Departamento o Dirección</p>
			<select name="optDeptoPert" class="nOptLogin">
				<option value="">--------</option>
				<?php  
					while ($optArea = $csdepto -> fetchArray()){
						$resOptArea = $optArea['DEPARTAMENTO'];

						echo '
							<option value="'.$resOptArea .'">'.$resOptArea .'</option>
						';
					}

				?>
				
			</select>
			<br>
			<br>
			<p>Más información</p>
			<input type="text" name="txtMailAlterno" placeholder="Correo Alterno" class="uLogin" />
			<br>
			<input type="text" name="txtMailInst" placeholder="Correo Institucional" class="pLogin" />
			<br>
			<br>
			<p>Responsable del Área</p>
			<input type="text" name="txtNomDir" placeholder="Nombre del Director o Jefe..." class="uLogin" required/>
			<br>
			<input type="text" name="txtCarDir" placeholder="Cargo ejemplo: 'Director'" class="pLogin" required/>
			<br>
			<br>
			<p>Responsable del Área</p>
			<input type="file" name="fileFirma" />
			<br>
			<br>
			<p>Serie de Oficios</p>
			<input type="text" name="txtSerie" placeholder="Ejemplo: 'SA'" class="ninLogin" required/>
			<br>
			<br>
			<input type="submit" value="Guardar" class="btLogin" />
		</form>
		<br>
		<a href="login.php">Regresar...</a>
	</div>
</body>
</html>