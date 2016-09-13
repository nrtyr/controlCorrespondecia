<?php 

include("seguridad.php");

// ###### Inicia Consulta de Info Usuario ######

$numEMpleado = $_SESSION['numEmpleado'];

$con = new SQLite3("../data/usuarios.db");
$infoUser = $con -> query("SELECT areaPert,deptoPert,nombreDir,cargoDir,fileFirma,numSerie FROM datos WHERE noEmpleado = '$numEMpleado'");
while ($optArea = $infoUser -> fetchArray()){
						$resOptArea = $optArea[0];
						$resOptDirec = $optArea[1];
						$resNomDir = $optArea[2];
						$resCarDir = $optArea[3];
						$resFileFirma = $optArea[4];
						$resNumSerie = $optArea[5];

					};
$con -> close();

// ###### Termina Consulta de Info Usuario ######


// ###### Inicia Consulta para Areas ######

$con2 = new SQLite3("../data/trabajadores.db");
$csdepto = $con2 -> query("SELECT DEPARTAMENTO FROM mayo_1ra_2016 WHERE DEPARTAMENTO NOT LIKE 'NULL' GROUP BY DEPARTAMENTO ORDER BY DEPARTAMENTO");



// ###### Termina Consulta para Areas ######

// ###### Inicia Generador de Folio ######

$con3 = new SQLite3("../data/oficios.db");
$csSerie = $con3 -> query("SELECT COUNT(contF_serie), MAX(contF_serie) FROM contFolio WHERE contF_serie = '$resNumSerie'");
while ( $resS = $csSerie -> fetchArray()) {
	$cont = $resS[0];
	$max = $resS[1];
}
if ($cont == 0) {
	$numFOficio = $resNumSerie."/0001/".date('Y')."/V";
}else{
	$numFOficio= $resNumSerie."/".substr((substr($max, 1)+ 10001), 1)."/".date('Y')."/V";
}

$con3 -> close();

// ###### Termina Generador de Folio ######
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Gestor de Oficios</title>
	<link rel="stylesheet" href="../../css/login.css">
	<link rel="stylesheet" href="../../css/normalize.css" />
</head>
<body>
	<div class="cReg">
		<h3>Generador de Oficios</h3>
		<br>
		<form action="plantillaOficiosQr.php" method="post">
		<br>
			<p>Número de Oficio</p>
			<p class="numOficio"><?php echo $numFOficio; ?></p>
			<input type="text" name="txtNumFolio" value="<?php echo $numFOficio; ?>" class="inputOculto">
			<p>Área a la que pertenece</p>
			<select name="optAreaPertE" class="nOptLogin">
				<option value="<?php  echo $resOptArea; ?>"><?php  echo $resOptArea; ?></option>
			</select>
			<br>
			<br>
			<p>Departamento o Dirección Emisora</p>
			<select name="optDeptoPertE" class="nOptLogin">
				<option value="<?php  echo $resOptDirec; ?>"><?php  echo $resOptDirec; ?></option>
			</select>
			<br>
			<br>
			<p>¿A quién va dirigido?</p>
			<input type="text" name="txtNombPersona" placeholder="Nombre de la Persona" class="nLogin"/>
			<br>
			<br>
			<p>¿Cargo?</p>
			<input type="text" name="txtCargo" placeholder="Cargo de la Persona" class="nLogin"/>
			<br>
			<br>
			<p>Área o Dirección Receptora</p>
			<select name="optAreaRece" class="nOptLogin">
				<?php  
					while ($optArea = $csdepto -> fetchArray()){
						$resOptArea = $optArea['DEPARTAMENTO'];

						echo '
							<option value="'.$resOptArea .'">'.$resOptArea .'</option>
						';
					}
					
					$con2 -> close();
				?>
			</select>
			<br>
			<br>
			<textarea name="txtContOficio" id="" cols="30" rows="10" class="txtAreaOficio" maxlength="1024">Por medio de la presente me dirijo a usted para....</textarea>
			<br>
			<br>
			<input type="file" class="" name="archAdjunto">
			<br>
			<input type="text" name="txtNumEmp" value="<?php echo $numEMpleado; ?>" class="inputOculto"/>
			<input type="text" name="txtNomDir" value="<?php echo $resNomDir; ?>" class="inputOculto"/>
			<input type="text" name="txtCarDir" value="<?php echo $resCarDir; ?>" class="inputOculto"/>
			<br>
			<br>
			<input type="submit" value="Guardar" class="btLogin" />
		</form>
		<br>
		<a href="login.php">Regresar...</a>
		<br>
		<br>
	</div>
</body>
</html>