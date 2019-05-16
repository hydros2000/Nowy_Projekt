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

	echo "<p>WITAJ".$_SESSION['username']."!";
	
	
?>

</body>
</html>
