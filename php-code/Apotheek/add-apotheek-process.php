<?php

$pdo = require_once '../connect.php';
$con = new connection();
    $pdo = $con->make();


$aponaam = $_POST['Naam-apotheek'];
$adress = $_POST['Adress'];
$stad = $_POST['Stad'];
$email = $_POST['Email'];
$telefoon = $_POST['Telefoonnummer'];
$password = $_POST['Password'];
$hash = hash('sha256', $password);



$role = "2";


$sql = 'INSERT INTO gebruikers(Naam_Gebruiker, Address, Stad, Email,wachtwoord, Telefoonnummer, role) 
VALUES(:Naamapotheek, :Adress, :Stad, :Email, :wachtwoord, :Telefoonnummer, :role)';

$statement = $pdo->prepare($sql);

$statement->execute([
	':Naamapotheek' => $aponaam,
	':Adress' => $adress,
	':Stad' => $stad,
	':Email' => $email,
	':wachtwoord' => $hash,
	':Telefoonnummer' => $telefoon,
	':role' => $role,
]);

header('Location: ../../apotheken.php');
// echo $name.' '.'was inserted';
?>