<?php

$pdo = require_once '../connect.php';
$con = new connection();
    $pdo = $con->make();


$naamarts = $_POST['Naam-arts'];
$adress = $_POST['Adress'];
$telefoon = $_POST['Telefoonnummer'];
$email = $_POST['Email'];
$wachtwoord = $_POST['Password'];
$hash = hash('sha256', $password);
$role = "3";


$sql = 'INSERT INTO gebruikers(Naam_Gebruiker, Address, Email, wachtwoord, Telefoonnummer, role) 
VALUES(:NaamArts, :Adress, :Email, :wachtwoord, :Telefoonnummer, :role)';

$statement = $pdo->prepare($sql);

$statement->execute([
	':NaamArts' => $naamarts,
	':Adress' => $adress,
	':Email' => $email,
	':wachtwoord' => $hash,
	':Telefoonnummer' => $telefoon, 
	':role' => $role,
]);

header('Location: ../../artsen.php');
// echo $name.' '.'was inserted';
?>