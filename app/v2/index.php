<?php
session_start();
$_SESSION['newChoiceStarted'] = true;

?>

<html>
<head>

<style type="text/css">
p {margin-left:20px;}
br {padding-top:20px;}
h2 { margin-bottom: 0px }
</style>

</head>
<body>


<img src="KaffeLogo.png" /><br/>

Hvem skal få æren av å lage kaffe denne gangen?

<h2>Velg inkluderte personer*</h2>
(* kan også være folk som ikke drikker kaffe)

<br/>
<br/>

<form method="post" action="kaffevelg.php">

<?php
$maxFields = 10;
$enteredFields = 0;

if (!empty($_POST) && !empty($_POST['name']) && is_array($_POST['name'])) {
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

<?php include('footer.php'); ?>

</body>
</html>
