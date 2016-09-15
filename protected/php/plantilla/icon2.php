<?php 

$conF = new SQLite3("../protected/data/usuarios.db");
$infoUserF = $conF -> query("SELECT fileFirma FROM datos WHERE noEmpleado = '$numEMpleado'");
while ($optAreaF = $infoUserF -> fetchArray()){
						$iconoF = $optAreaF[0];

					};

					$iconoF = "../protected".substr($iconoF, 2);


$conF -> close();

 ?>


<style>
		.icon{
			background-image: url("<?php echo $iconoF;?>");
			background-position: center center;
			background-repeat:  no-repeat;
			background-size: cover;
		}
</style>