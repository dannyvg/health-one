<?php

require_once 'connect.php';
$con = new connection();
    $pdo = $con->make();

$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = $_POST['wachtwoord'];
$hash = hash('sha256', $password);
$tel = $_POST['tel'];
$rol = $_POST['roles'];



$sql = 'INSERT INTO gebruikers(Naam_Gebruiker,Address,Email, wachtwoord, Telefoonnummer, role) VALUES(:name,:address,:email,:password,:tel,:rol)';

$statement = $pdo->prepare($sql);

$statement->execute([
	':name' => $name,
    ':address' => $address,
    ':email' => $email,
    ':password' => $hash,
    ':tel' => $tel,
    ':rol' => $rol
]);

header('Location: ../home.php');
// echo $name.' '.'was inserted';