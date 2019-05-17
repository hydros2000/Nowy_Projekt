<?php
session_start();
function connect()
{
	$host = "192.168.122.203";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "filmy";

	$conn2 = new mysqli($host, $dbusername, $dbpassword, $dbname);
	// Check connection
	if ($conn2->connect_error) {
        die("Connection failed: " . $conn2->connect_error);
	}
	return $conn2;
}
function debug($var)
{
	echo '<pre>';
	var_dump($var);
	echo '</pre>';
	exit;
}
?>
