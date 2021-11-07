<?php

$pdo = require_once '../connect.php';
$con = new connection();
    $pdo = $con->make();


$artsnaam = $_POST['Naam-arts'];
$adress = $_POST['Adress'];
$Telefoonnummer = $_POST['Telefoonnummer'];
$Email = $_POST['Email'];

$idar = $_GET['id'];



$sql = 'UPDATE gebruikers SET Naam_Gebruiker = :Naamarts ,Address = :Adress, Email = :Email, Telefoonnummer = :Telefoonnummer WHERE idGebruiker = :idar';

$statement = $pdo->prepare($sql);

$statement->execute([
	':Naamarts' => $artsnaam,
    ':Adress' => $adress,
    ':Email' => $Email,
    ':Telefoonnummer' => $Telefoonnummer,
    ':idar' => $idar,
]);

header('Location: ../../artsen.php');
// echo $name.' '.'was inserted';
?>