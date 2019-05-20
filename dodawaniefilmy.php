<?php
	include('bootstrap.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>
<?php
//session_start();
require_once "connectfilmy.php";
#$host = "192.168.122.203";
#$dbusername = "root";
#$dbpassword = "";
#$dbname = "filmy";
$idfilmu = filter_input(INPUT_POST,'id');
$tytul = filter_input(INPUT_POST,'tytul');
$rokprodukcji = filter_input(INPUT_POST,'rok');
$gatunek = filter_input(INPUT_POST,'gatunek');
$opis = filter_input(INPUT_POST,'opis');
if (!empty($idfilmu)){
if (!empty($tytul)){
if (!empty($rokprodukcji)){
if (!empty($gatunek)){
if (!empty($opis)){
#$host = "192.168.122.203";
#$dbusername = "root";
#$dbpassword = "";
#$dbname = "filmy";
$conn = connect();//new mysqli($host,$dbusername,$dbpassword,$dbname);
$sql="INSERT INTO film (id_filmu,tytul,rok_produkcji,gatunek,opis)
values ('$idfilmu','$tytul','$rokprodukcji','$gatunek','$opis')";
if ($conn->query($sql)){
#echo "Nowy rekord dodany";
}
else{
echo "Error:". $sql . "
". $conn->error;
}
$conn->close();

}
else{
echo "That should not be empty";
die();
}
}
else{
echo "That should not be empty";
die();
}
}
else{
echo "That should not be empty";
die();
}
}
else{
echo "That should not be empty";
die();
}
}
header('Location: infofilmy.php');
#connect();
#$con = mysql_connect($host,$dbusername,$dbpassword);

#mysql_select_db($dbname, $polaczenie);

#$result = mysql_query("SELECT * FROM film");


#echo '<table><tr><th>id_filmu</th><th>tytul</th><th>rok_produkcji</th><th>gatunek</th><th>opis</th></tr>';
#	while($row = mysql_fetch_array($result)) {
#		echo "<tr><td>{$row['id']}</td><td>{$row['tytul']}</td><td>{$row['rok']}</td><td>{$row['gatunek']}</td><td>{$row['opis']}</td></tr>";
#	}
#	echo '</table>';
/*$host = "192.168.122.203";
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
*/
#$conn2->close();
?>
</body>
</html>
