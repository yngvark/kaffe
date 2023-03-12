<?php
function rndQuote() { 
	$lines = file("kaffesitater_49g9834.txt") ; 
	return $lines[array_rand($lines)] ; 
}
?>
