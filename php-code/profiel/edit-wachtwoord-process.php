<?php

$pdo = require_once '../connect.php';
$con = new connection();
    $pdo = $con->make();

$wachtwoord = $_POST['wachtwoord'];
$hashedpass = hash('sha256',$wachtwoord);


$id = $_GET['id'];

$sql = 'UPDATE gebruikers SET wachtwoord = :wacht WHERE idGebruiker = :id';

$statement = $pdo->prepare($sql);

$statement->execute([
	':wacht' => $hashedpass,
    ':id' => $id,
]);

header('Location: ../logout.php');
// echo $name.' '.'was inserted';
?>