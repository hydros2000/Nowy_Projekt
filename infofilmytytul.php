<?php
	session_start();	
	include('bootstrap.php');
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome-1"/>
	<title>Strona logowania</title>
<style>
table, th, td {
    border: 1px solid black;
}
#I1{
	position:relative;
         left:65px;
         top:0.1%;
         margin:1px;
         //padding:5px;
}
#I2{
	position:relative; 
         left:40px;
         top:0.1%;
         margin:1px;
}
#I3{
	position:relative; 
         left:13px;
         top:0.1%;
         margin:1px;
}
#I4{
	position:relative; 
         left:13px;
         top:0.1%;
         margin:1px;
}
#I5{
	position:relative; 
         left:20px;
         top:0.1%;
         margin:1px;
}
#tabelka
{
position:relative;
top:-250px;
}
#tabelka2
{
position:relative;
top:-450px;
left:700px;
}
#form2{
position:relative;
left:700px;
top:-294px;
}
/*#I1{
right:20px;
}
#I2{
position:relative;
left:5px;
}
#I3{
position:relative;
left:15px;
}
#I4{
position:relative;
left:12px;
}
#I5{
position:relative;
left:10px;
}*/
</style>
</head>

<body>
<?php
	echo "<h3>Witaj ".$_SESSION['username']."!</h3>";
	
	
?>
	<form id="form" action="dodawaniefilmy.php" method="post">
	<h1>Dodawanie rekordow</h1>
	<label>Id filmu:</label><input id="I1" type="text" name="id"/><br>
	<label>Tytul filmu:</label><input id="I2" type="text" name="tytul"/><br>
	<label>Rok produkcji:</label><input id="I3" type="text" name="rok"/><br>
	<label>Gatunek filmu:</label><input id="I4" type="text" name="gatunek"/><br>
	<label>Opis do filmu:</label><input id="I5" type="text" name="opis"/><br>
	<input type="submit" value="Dodaj rekord"></input>
	<input type="submit" value="Usuń rekord" onclick="document.getElementById('form').action='usuwaniefilmy.php';"/>
	<input type="submit" value="Edytuj rekord" onclick="document.getElementById('form').action='edycjafilmy.php';"/>
	<br>
	<input type="submit" value="Sortuj po tytule" onclick="document.getElementById('form').action='sortpotytule.php';"/>
	<input type="submit" value="Sortuj po roku" onclick="document.getElementById('form').action='sortporoku.php';"/>
	<input type="submit" value="Sortuj po gatunku" onclick="document.getElementById('form').action='sortpogatunku.php';"/>
	</form>
	<form id="form2" method="post">
	<h1>Wyszukiwanie</h1>
	<h3>Wyszukuj wpisujac dane tylko w jedno wybrane pole</h3>
        <label>Tytul filmu:</label><input id="I2" type="text" name="tytul"/><br>
        <label>Rok produkcji:</label><input id="I3" type="text" name="rok"/><br>
        <label>Gatunek filmu:</label><input id="I4" type="text" name="gatunek"/><br>
	<label>Opis do filmu:</label><input id="I5" type="text" name="opis"/><br>
	<input type="submit" value="Wyszukaj"/>
	</form>
<br>
<?php
#$host = "192.168.122.203";
#$dbusername = "root";
#$dbpassword = "";
#$dbname = "filmy";
	$conn2 = connect(); //new mysqli($host, $dbusername, $dbpassword, $dbname);
	// Check connection
	$sql2 = "SELECT * FROM film ORDER BY tytul";
	$result = $conn2->query($sql2);
	if ($result->num_rows > 0) {
	    echo '<table id="tabelka"><tr><th>id_filmu</th><th>tytul</th><th>rok_produkcji</th><th>gatunek</th><th>opis</th></tr>';
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo "<tr><td>{$row['id_filmu']}</td><td>{$row['tytul']}</td><td>{$row['rok_produkcji']}</td><td>{$row['gatunek']}</td><td>{$row['opis']}</td></tr>";
	    }
	    echo "</table>";
	} else {
	    echo "0 results";
	}
	$conn2->close();
?>
<?php
	$tytul = filter_input(INPUT_POST,'tytul');
	$rokprodukcji = filter_input(INPUT_POST,'rok');
	$gatunek = filter_input(INPUT_POST,'gatunek');
	$opis = filter_input(INPUT_POST,'opis');
	//include('funkcjefilmy.php');
	$conn2 = connect();
	// Check connection
	$sql2 = "SELECT distinct * FROM film WHERE gatunek LIKE '$gatunek' OR rok_produkcji LIKE '$rokprodukcji' OR opis LIKE '$opis' OR tytul LIKE '$tytul'";
	$result = $conn2->query($sql2);
	if ($result->num_rows > 0) {
	    echo '<table id="tabelka2"><tr><th>id_filmu</th><th>tytul</th><th>rok_produkcji</th><th>gatunek</th><th>opis</th></tr>';
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo "<tr><td>{$row['id_filmu']}</td><td>{$row['tytul']}</td><td>{$row['rok_produkcji']}</td><td>{$row['gatunek']}</td><td>{$row['opis']}</td></tr>";
	    }
	    echo "</table>";
	} else {
	 /* $sql2 = "SELECT distinct * FROM film WHERE tytul LIKE '$tytul' OR opis LIKE '$opis'";
	  $result = $conn2->query($sql2);
	  if ($result->num_rows >0)
	  {
		echo '<table><tr><th>id_filmu</th><th>tytul</th><th>rok_produkcji</th><th>gatunek</th><th>opis</th></tr>';
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo "<tr><td>{$row['id_filmu']}</td><td>{$row['tytul']}</td><td>{$row['rok_produkcji']}</td><td>{$row['gatunek']}</td><td>{$row['opis']}</td></tr>";
	    }
	    echo "</table>";
	  }*/
		echo "result 0";
	}
	$conn2->close();
?>
</body>
</html>
