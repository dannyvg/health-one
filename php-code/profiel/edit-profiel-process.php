<?php

$pdo = require_once '../connect.php';
$con = new connection();
    $pdo = $con->make();

$naam = $_POST['Naam-Gebruiker'];
$adress = $_POST['Adress'];
$Email = $_POST['Email'];



$Telefoonnummer = $_POST['Telefoonnummer'];

$id = $_GET['id'];

$sql = 'UPDATE gebruikers SET Naam_Gebruiker = :Naam ,Address = :Adress, Email = :Email, Telefoonnummer = :Telefoonnummer WHERE idGebruiker = :id';

$statement = $pdo->prepare($sql);

$statement->execute([
	':Naam' => $naam,
    ':id' => $id,
    ':Adress' => $adress,
    ':Email' => $Email,
    ':Telefoonnummer' => $Telefoonnummer,
]);

header('Location: ../logout.php');
// echo $name.' '.'was inserted';
?>