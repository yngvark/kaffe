<?php
session_start();
$_SESSION['newChoiceStarted'] = true;
include_once('rndQoute.php');
require_once('controller.php');
$ctrl = new Controller();
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
<body>

<p>
	<img src="KaffeLogo.png" />
</p>
Hvem skal få æren av å lage kaffe denne gangen?

<h2>Velg inkluderte personer*</h2>
(* kan også være folk som ikke drikker kaffe)

<br/>
<br/>

<form method="post" action="kaffevelg.php">

<?php
$maxFields = 10;
$enteredFields = 0;

if ($ctrl->nameIsInPost()) {
	$names = $_POST['name'];	
	foreach ($names as $name) {
		echo "Navn: <input type='text' name='name[]' value='$name'><br /><br />";
		$enteredFields++;
	}
}
?>

<?php

for ($i = $enteredFields; $i < $maxFields; $i++) {
	echo "Navn: <input type='text' name='name[]'><br /><br />";
}
?>

<p>
	<input type="submit" value="Velg helt tilfeldig person" />
</p>
</form>

<br/><br/><br/><br/><br/><br/><br/>

<?php // RANDOM COFFE QOUTE ?> 
<div style="color: #858585; font-family: Verdana; font-size: 12px">
	<?php echo rndQuote(); ?>
</div>




</body>
</html>
