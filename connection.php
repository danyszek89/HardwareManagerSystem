<?php
$dbLocation = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'hardwaremanagersystemdb';

    $link = new mysqli($dbLocation, $dbUsername, $dbPassword, $dbName);

		if (mysqli_connect_errno()) 
		{
			echo "Błąd połączenia nr: " . $link->connect_errno;
			echo "Opis błędu: " . $link->connect_error;
			exit();
		}
		$link->set_charset("utf8");
?>