<?php
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
$host = "192.168.122.203";
$dbusername = "root";
$dbpassword = "";
$dbname = "filmy";
$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
if(mysqli_connect_error())
{
die('Connect Error ('.mysqli_connect_errno() .')'
. mysqli_connect_error());
}
else
{
$sql="DELETE FROM film WHERE id_filmu='$idfilmu'";
if ($conn->query($sql)){
#echo "Nowy rekord dodany";
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
header('location:infofilmy.php');
?>
