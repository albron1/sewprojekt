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
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
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
  <li><a href="schueler.php">Schueler</a></li>
</ul>

          <h1> Klassen registrieren: </h1>
								<form action="klasse.php" method="post">
			<table>
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" maxlength="50" /></td>
				</tr>
				<tr>
					<td>Raum</td>
					<td><input type="text" name="raum" maxlength="50" /></td>
				</tr>
				<tr>
					
					<td><button name="Reset" type="reset">Reset</button></td>
					
					<td><button name="Send" type="submit">Anlegen</button></td>
				</tr>
			</table>
			<?php 
			
			if(isset($_POST["Send"])){
				
				$pdo = new PDO('mysql:host=localhost;port=3306;dbname=schulverwaltung', 'root', '');
				
				$name = $_POST["name"];
				$raum = $_POST["raum"];
				
				
				$insert = "INSERT INTO klasse (name, raum)
							VALUES('".$name."','".$raum."')";
				
				$result = $pdo->query($insert);
				
				if($result)
					echo "<br />Die Klasse wurde erfolgreich angelegt!";
			
				else
					echo "Die Klasse wurde nicht angelegt!<br />";
										}
			?>
			<h1> Die Klassen sind: </h1>

          <?php
     
      $pdo = new PDO('mysql:host=localhost;dbname=schulverwaltung', 'root', '');
     
      $select = "SELECT idK, name, raum FROM klasse ORDER BY idK";

      $sth = $pdo->prepare($select);

      $sth->execute();
   
      $result = $sth->fetchAll(PDO::FETCH_ASSOC);
      
      echo "<table>";
      foreach($result as $row) {
      
		echo "<tr>";
		echo "<td>ID</td>";
		echo "<td>--Name</td>";
		echo "<td>--Raum</td>";
		echo "</tr>";
        echo "<tr>";
        echo "<td>" . $row["idK"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["raum"] . "</td>";
        
      

        echo "</tr>";
      
      }
      echo "</table>";
     
    ?>
		</form>
          
		</body>
</head>
