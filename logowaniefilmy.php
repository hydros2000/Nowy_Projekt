<?php
	session_start(); 
	require_once "connectfilmy.php";	
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name); //polaczenie z bazą, "@" wycisza informacje o bledzie php
	if($polaczenie->connect_errno!=0)
	{
	 echo "ERROR: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['login']; //pobierane z "name" w inpucie
	        $haslo = $_POST['haslo'];
		
		$sql = "SELECT * from uzytkownicy WHERE username='$login' AND password='$haslo'";
		
		if ($rezultat = @$polaczenie->query($sql))
		{
		 $ilu_userow = $rezultat->num_rows;
		 if($ilu_userow>0)
		 {
			$wiersz = $rezultat->fetch_assoc();	
			$_SESSION['username'] = $wiersz['username'];
				
			$rezultat->free_result();
			header('Location: infofilmy.php');
		 }
		 else
		 {
			
		 }
		}		
		$polaczenie->close();
	}
?>
