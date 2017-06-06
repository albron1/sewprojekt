<html>
	<head>
		<title> Schulverwaltung </title>
        <style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    <!--display: block;-->
    color: white;
    text-align: center;
    padding: 10px 12px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}
.active {
    background-color: #4CAF50;
}
</style>
	</head>
	<link type="text/css" rel="stylesheet" href="design.css">
		<body>
            <ul>
  <li><a class="active" href="Schulverwaltung.php">Schulverwaltung</a></li>
  <li><a href="Schulverwaltung.php"></a></li>
  <li><a href="klasse.php">Klasse</a></li>
  <li><a href="lehrer.php">Lehrer</a></li>
  <li><a href="person.php">Person</a></li>
  <li><a href="schueler.php">Schueler</a></li>
</ul>

          <h1> Schueler Editieren </h1>
		<table class="alt">
											
												
		<?php
			
			if(isset($_GET["id"])) {
				$pdo = new PDO('mysql:host=localhost;dbname=schulverwaltung', 'root', '');
			
				$sql = "SELECT idP, vname, fname, gebtag FROM person WHERE idP = " . $_GET["id"];
				$result = $pdo->query($sql);
				$row = $result->fetch();
			}
			
		?>
		<form action="editSchueler.php" method="post">
			<table>
				<tr>
					<td>Vorname</td>
					<td><input type="text" name="vname" value="<?php echo $row["vname"]; ?>" maxlength="55" /></td>
				</tr>
				<tr>
					<td>Nachname</td>
					<td><input type="text" name="fname" value="<?php echo $row["fname"]; ?>" maxlength="55" /></td>
				</tr>
				<tr>
					<td>Geburtstag</td>
					<td><input type="text" name="gebtag" value="<?php echo $row["gebtag"]; ?>"  /></td>
				</tr>
				
			</table>
			
			<input type="hidden" name="idP" value="<?php echo $row["idP"]; ?>" />
			
			<button name="Send" type="submit">&Auml;ndern</button>
			

		</form>        
<?php
			
			if(isset($_POST["Send"])) {
				
				$pdo = new PDO('mysql:host=localhost;dbname=schulverwaltung', 'root', '');
				
				$sql = "UPDATE `person` SET `vname` = '" . $_POST["vname"]
					. "', `fname` = '" . $_POST["fname"]
					. "', `gebtag` = '" . $_POST["gebtag"]
					."' WHERE idP=" . $_POST["idP"] ;
				
				
				$result = $pdo->query($sql);

				
				if($result)
					header("location:schueler.php");
				
				else
					echo "Der Person wurde nicht ge&auml;ndert!<br />" . $sql;

			}

		?>
          
		</body>
</head>
