<?php

	session_start(); 
		
	require_once "connect1.php";	

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name); //polaczenie z bazą, "@" wycisza informacje o bledzie php
	
	if($polaczenie->connect_errno!=0)
	{
	 echo "ERROR: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['login']; //pobierane z "name" w inpucie
	        $haslo = $_POST['haslo'];
		
		$sql = "SELECT * from PhpConnection WHERE username='$login' AND password='$haslo'";
		
		if ($rezultat = @$polaczenie->query($sql))
		{
		 $ilu_userow = $rezultat->num_rows;
		 if($ilu_userow>0)
		 {
			$wiersz = $rezultat->fetch_assoc();	
			$_SESSION['username'] = $wiersz['username'];
				
			$rezultat->free_result();
			header('Location: info.php');
		 }
		 else
		 {
			
		 }

		}		

		$polaczenie->close();
	}



?>
