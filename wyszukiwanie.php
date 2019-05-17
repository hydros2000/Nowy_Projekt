<?php
$tytul = filter_input(INPUT_POST,'tytul');
$rokprodukcji = filter_input(INPUT_POST,'rok');
$gatunek = filter_input(INPUT_POST,'gatunek');
$opis = filter_input(INPUT_POST,'opis');
include('funkcjefilmy.php');
$conn2 = connect();
// Check connection
$sql2 = "SELECT distinct * FROM film WHERE gatunek LIKE '$gatunek' OR rok_produkcji LIKE '$rokprodukcji' OR opis LIKE '$opis' OR tytul LIKE '$tytul'";
$result = $conn2->query($sql2);

if ($result->num_rows > 0) {
    echo '<table><tr><th>id_filmu</th><th>tytul</th><th>rok_produkcji</th><th>gatunek</th><th>opis</th></tr>';
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
