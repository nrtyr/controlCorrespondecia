<?php 

header("Content-Type: text/html; Charset=UTF-8");
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();

if (isset($_SESSION['username'])) {

// 	echo "

// <script>setTimeout(window.location='destruir.php', 50000);</script>


// 	";

}else{
	echo "<script> alert('No Puedes ver esta Pagina'); </script>";
	echo "<script> window.location='login.php'; </script>";
}

 ?>