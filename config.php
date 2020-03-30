<?php
    $host = 'localhost';
    $database = 'template';
    $username = 'user';
    $password = '97lEVgX1KUlx';

    try{
		$pdo = new PDO("mysql:host=$host;dbname=$database",$username,$password);
	} catch(PDOException $ex){
		echo "Verbinding mislukt: $ex";
}
?>