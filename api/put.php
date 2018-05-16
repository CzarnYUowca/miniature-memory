<?php

session_start();

try {
	$conn = require_once 'connect.php';
	$db = new PDO("mysql:host={$conn['host']};dbname={$conn['database']};charset=utf8", $conn['user'], $conn['password'], [PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
	$query = $db->prepare("INSERT INTO wszystkie VALUES (NULL, :typ, :nastawienie, :przedmiot, :data, :lekcja)");
	$query->bindvalue(':typ', $_POST['typ'], PDO::PARAM_STR);
	$query->bindvalue(':nastawienie', $_POST['nastawienie'], PDO::PARAM_STR);
	$query->bindvalue(':przedmiot', $_POST['przedmiot'], PDO::PARAM_STR);
	$query->bindvalue(':data', $_POST['data'], PDO::PARAM_STR);
	$query->bindvalue(':lekcja', $_POST['lekcja'], PDO::PARAM_INT);
	$query->execute();

    echo 'lolco';
}
	catch(PDOException $e){
		echo $e;
		exit();
	};

$_SESSION['wstawiono'] = true;
header('Location: ../tegonie.php');

?>