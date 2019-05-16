<?php
//session_start();
require_once "connectfilmy.php";
$host = "192.168.122.203";
$dbusername = "root";
$dbpassw0rd = "";
$dbname = "filmy";
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
#$dbpassw0rd = "";
#$dbname = "filmy";
$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
if(mysqli_connect_error())
{
die('Connect Error ('.mysqli_connect_errno() .')'
. mysqli_connect_error());
}
else
{
$sql="INSERT INTO film (id_filmu,tytul,rok_produkcji,gatunek,opis)
values ('$idfilmu','$tytul','$rokprodukcji','$gatunek','$opis')";
if ($conn->query($sql)){
echo "Nowy rekord dodany";
}
else{
echo "Error:". $sql . "
". $conn->error;
}
$conn->close();
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
else{
echo "That should not be empty";
die();
}
}
$con = mysql_connect($host,$dbusername,$dbpassword);
$result = mysql_query("SELECT * FROM film");

mysql_select_db("filmy", $con);
echo '<table><tr><th>id_filmu</th><th>tytul</th><th>rok_produkcji</th><th>gatunek</th><th>opis</th></tr>';
	while($row = mysql_fetch_array($result)) {
		echo "<tr><td>{$row['id']}</td><td>{$row['tytul']}</td><td>{$row['rok']}</td><td>{$row['gatunek']}</td><td>{$row['opis']}</td></tr>";
	}
	echo '</table>';
