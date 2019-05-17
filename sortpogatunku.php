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
$sql2 = "SELECT * FROM film ORDER BY gatunek DESC";
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
header('Location:infofilmy.php');
?>
