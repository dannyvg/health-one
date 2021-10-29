<?php

$pdo = require_once '../connect.php';
$con = new connection();
    $pdo = $con->make();

$aponaam = $_POST['Naam-apotheek'];
$adress = $_POST['Adress'];
$Stad = $_POST['Stad'];
$Email = $_POST['Email'];
$Telefoonnummer = $_POST['Telefoonnummer'];

$ida = $_GET['id'];

$sql = 'UPDATE apotheek SET Naam_Apotheek = :NaamApo ,Address = :Adress, Stad = :Stad, Email = :Email, Telefoonnummer = :Telefoonnummer WHERE idApotheek = :ida';

$statement = $pdo->prepare($sql);

$statement->execute([
	':NaamApo' => $aponaam,
    ':ida' => $ida,
    ':Adress' => $adress,
    ':Stad' => $Stad,
    ':Email' => $Email,
    ':Telefoonnummer' => $Telefoonnummer,
]);

header('Location: ../../apotheken.php');
// echo $name.' '.'was inserted';
?>