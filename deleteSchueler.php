<?php
	$pdo = new PDO('mysql:host=localhost;dbname=schulverwaltung', 'root', '');

	$sql = "DELETE FROM person WHERE idP = " . $_GET["id"];

	$sth = $pdo->prepare($sql);

	$sth->execute();

	header("location:schueler.php");
?>
