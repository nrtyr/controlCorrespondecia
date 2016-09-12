<?php 

	include("phpqrcode/qrlib.php");

		// $name = $_POST["txtNombre"];
		$name = 'http://nicolasromero.mx/oficios';
		$outfile = false;
		$level = 'h';
		$size = 4;
		$margin = 1;
		$saveandprint = false;
	    $back_color = 0xFFFFFF;
		$fore_color = 0x000000;
		QRcode::png($name, $outfile, $level, $size, $margin, $saveandprint, $back_color, $fore_color);

?>