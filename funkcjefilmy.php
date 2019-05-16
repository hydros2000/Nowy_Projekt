<?php
session_start();
function connect()
{
	$polaczenie = mysqli_connect('192.168.122.203','root','','filmy') or die('Cant connect to database');
	return $polaczenie;
}
function debug($var)
{
	echo '<pre>';
	var_dump($var);
	echo '</pre>';
	exit;
}
?>
