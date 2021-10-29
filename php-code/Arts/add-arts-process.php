<?php

$pdo = require_once '../connect.php';
$con = new connection();
    $pdo = $con->make();


$naamarts = $_POST['Naam-arts'];
$adress = $_POST['Adress'];
$telefoon = $_POST['Telefoonnummer'];
$email = $_POST['Email'];



$sql = 'INSERT INTO arts(Naam_Arts, Address, Email, Telefoonnummer) 
VALUES(:NaamArts, :Adress, :Email, :Telefoonnummer)';

$statement = $pdo->prepare($sql);

$statement->execute([
	':NaamArts' => $naamarts,
	':Adress' => $adress,
	':Email' => $email,
	':Telefoonnummer' => $telefoon
]);

header('Location: ../../artsen.php');
// echo $name.' '.'was inserted';
?>