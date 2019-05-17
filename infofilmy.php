<?php
	session_start();	
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
label {
position:relative;

}
</style>
</head>

<body>
<?php
	echo "<p>Witaj ".$_SESSION['username']."!";
	
	
?>
	<form action="dodawaniefilmy.php" method="post">
	<br>
	<h1>Dodawanie rekordow</h1>
	<label>Id filmu:</label><input type="text" name="id"/><br>
	<label>Tytul filmu:</label><input type="text" name="tytul"/><br>
	<label>Rok produkcji filmu:</label><input type="text" name="rok"/><br>
	<label>Gatunek filmu:</label><input type="text" name="gatunek"/><br>
	<label>Opis do filmu:</label><input type="text" name="opis"/><br>
	<input type="submit" value="Dodaj rekord"/>
	</form>
<br>
<?php

$host = "192.168.122.203";
$dbusername = "root";
$dbpassword = "";
$dbname = "filmy";

$conn2 = new mysqli($host, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
}
$sql2 = "SELECT * FROM film";
$result = $conn2->query($sql2);

if ($result->num_rows > 0) {
    echo '<table><tr><th>id_filmu</th><th>tytul</th><th>rok_produkcji</th><th>gatunek</th><th>opis</th></tr>';
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

</body>
</html>
