<?php
require_once('Security.php');

class Log {

	function add($chosenPerson, $names) {
		$chosenPerson = makeSafe($chosenPerson);
		$names = makeSafe(implode(",", $names));
		
		$numericalDate = date('d.m.Y, H:i:s');
		$textualDate = date('D d. M Y');
		$logData = $textualDate . ", " . $numericalDate . ",\t" . $chosenPerson . ",\t\t" . $names . "\n";
		
		file_put_contents("Log.log", $logData, FILE_APPEND);
	}

}