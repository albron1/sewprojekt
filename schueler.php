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
          <h1> Die Liste unsere Schueler </h1>

          <?php
     
      $pdo = new PDO('mysql:host=localhost;dbname=schulverwaltung', 'root', '');
     
      $select = "SELECT idP, vname, fname, gebtag FROM person ORDER BY idP";

      $sth = $pdo->prepare($select);

      $sth->execute();
   
      $result = $sth->fetchAll(PDO::FETCH_ASSOC);
      
      echo "<table>";
      foreach($result as $row) {
      
        echo "<tr>";
        echo "<td>" . $row["idP"] . "</td>";
        echo "<td>" . $row["vname"] . "</td>";
        echo "<td>" . $row["fname"] . "</td>";
        echo "<td>" . $row["gebtag"] . "</td>";
		
		//echo "<td>" . $row["email"] . "</td>";
		echo "<td><a href=editSchueler.php?id=" . $row["idP"] . ">Edit</a></td>";
		echo "<td><a href=deleteSchueler.php?id=" . $row["idP"] .">Delete</a></td>";
        
      

        echo "</tr>";
      
      }
      echo "</table>";
     
    ?>
          
		</body>
</head>
