<?php 

$conF = new SQLite3("../data/usuarios.db");
$infoUserF = $conF -> query("SELECT fileFirma FROM datos WHERE noEmpleado = '$numEMpleado'");
while ($optAreaF = $infoUserF -> fetchArray()){
						$iconoF = $optAreaF[0];

					};

$_SESSION['iconoF'] = $iconoF;


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