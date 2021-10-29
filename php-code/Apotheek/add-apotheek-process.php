<?php

$pdo = require_once '../connect.php';
$con = new connection();
    $pdo = $con->make();


$aponaam = $_POST['Naam-apotheek'];
$adress = $_POST['Adress'];
$stad = $_POST['Stad'];
$email = $_POST['Email'];
$telefoon = $_POST['Telefoonnummer'];


$sql = 'INSERT INTO apotheek(Naam_Apotheek, Address, Stad, Email, Telefoonnummer) 
VALUES(:Naamapotheek, :Adress, :Stad, :Email, :Telefoonnummer)';

$statement = $pdo->prepare($sql);

$statement->execute([
	':Naamapotheek' => $aponaam,
	':Adress' => $adress,
	':Stad' => $stad,
	':Email' => $email,
	':Telefoonnummer' => $telefoon
]);

header('Location: ../../apotheken.php');
// echo $name.' '.'was inserted';
?>