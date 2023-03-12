<?php
session_start();
//require_once('Log.php');
require_once('Security.php');

?>
<html>
<body>
<head>
<style type="text/css">
p {margin-left:20px; }
br {padding-top:20px;}
h2 { margin-bottom: 0px; }
h1 { color:#000000; text-decoration: blink; }
h3 { color:#990000; text-decoration: blink; }
table.sample {
	border-width: medium;
	border-spacing: 4px;
	border-style: ridge;
	border-color: #808080;
	border-collapse: separate;
	background-color: #F3AAF3;
	margin-top: 50px;
	margin-bottom: 50px;

}
table.sample th {
	border-width: medium;
	padding: 5px;
	border-style: outset;
	border-color: #000000;
	background-color: #ffffff;
	-moz-border-radius: ;
}
table.sample td {
	border-width: medium;
	padding: 30px;
	border-style: outset;
	border-color: #000000;
	background-color: #ffffff;
	-moz-border-radius: ;
}
</style>

</head>

<?php

//$log = new Log();

function clearEmpties($arr) {
	$arrClean = array();
	foreach ($arr as $item) {
		if (!empty($item))
			array_push($arrClean, $item);
	}
	
	return $arrClean;
}

function findRandomPersonAmong($names) {
	$personCount = sizeof($names);

	$nameIndex = rand(1, $personCount) - 1;
	return $names[$nameIndex];
}

if (empty($_POST))
{
	echo "<script type='text/javascript'>window.location='index.php'</script>";
} 

if (!empty($_POST) && !empty($_POST['name']) && is_array($_POST['name'])) {
	$names = $_POST['name'];
	
	// Are names entered?
	$names = clearEmpties($names);
	if (sizeof($names) == 0) {
		echo "<p>Du må skrive inn minst ett navn! <a href='index.php'>Tilbake</a>.";
		die();
	}
	
	// Hack protection
	if ($_SESSION['newChoiceStarted'] === false) {
		?>
		<h3>HACK-PROTECTION</h3>
		Ikke noe kjapp-refreshing-for-å-viske-ut-navnet-ditt, takk! Gå tilbake til <a href="index.php">startsiden</a> (straff: alle navn er visket ut).
		<?php
		die();
	} else {
		$_SESSION['newChoiceStarted'] = false;
	}

	// Output
	echo "<img src='KaffeLogo.png' /><br/>";

	echo "<p>Sannsynlighet for å bli valgt: " . (100 / sizeof($names)) . "%</p>";
	echo "<p>Randomiserer...</p>";

?>

<table width="700" border="2" class="sample">

<tr><td style="background:#FFCC33" align="center">
<?php
	$chosenPerson = makeSafe(findRandomPersonAmong($names));
//	$log->add($chosenPerson, $names);
	echo "<h1>$chosenPerson SKAL LAGE KAFFE</h1>";
	echo "Saken er avgjort, da er det bare å sette igang trakteren!";

?>
</td></tr>
</table>

<p>
	Og ja, valget er _endelig_, ikke noe unnasluntring!
</p>
<p>
	<b>NB!</b> Laging av kaffe inkluderer også <b>henting</b> av kaffe.
</p>

<?php
if (sizeof($names) > 0) {
	echo "<br/><br/><br/><br/><br/><br/><br/>";
	echo "<form action='index.php' method='post'>";
	foreach($names as $name) {
		echo "<input type='hidden' name='name[]' value='$name' />";
	}
	echo "<input type='submit' value='Tilbake'>";
	echo "</form>";
}
?>

<?php include('footer.php'); ?>

</table>

<?php } ?>
</body>
</html>
