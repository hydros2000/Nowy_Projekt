<?php
	session_start();	
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome-1"/>
	<title>Strona logowania</title>
</head>

<body>

<?php
	echo "<p>Witaj ".$_SESSION['username']."!";
	
	
?>
	<form action="dodawaniefilmy.php" method="post">
	<br>
	<h1>Dodawanie rekordow</h1>
	Dodaj Id filmu:<input type="text" name="id"/><br>
	Dodaj tytul filmu:<input type="text" name="tytul"/><br>
	Dodaj rok produkcji filmu:<input type="text" name="rok"/><br>
	Dodaj gatunek filmu:<input type="text" name="gatunek"/><br>
	Dodaj opis do filmu:<input type="text" name="opis"/><br>
	<input type="submit" value="Dodaj rekord"/>
	</form>
</body>
</html>
