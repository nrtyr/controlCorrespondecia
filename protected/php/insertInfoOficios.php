<?php 
include("seguridad.php");

$areaEmisora  = $_POST['optAreaPertE'];
$deptoEmisora = $_POST['optDeptoPertE'];
$personaRecep = $_POST['txtNombPersona'];
$areaRecep    = $_POST['optAreaRece'];
$contOficio   = nl2br($_POST['txtContOficio']);
$archAdjunto  = $_POST['archAdjunto'];
$correoRecep  = $_POST['txtCorreoEnviar'];

echo $areaEmisora . "<br>";
echo $deptoEmisora . "<br>";
echo $personaRecep . "<br>";
echo $areaRecep . "<br>";
echo $contOficio . "<br>";
echo $archAdjunto . "<br>";
echo $correoRecep . "<br>";

 ?>