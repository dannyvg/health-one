<?php

$pdo = require_once '../connect.php';
$con = new connection();
    $pdo = $con->make();

$medinaam = $_POST['Naam-Medicijn'];


$sql = 'INSERT INTO medicijnen(Naam_Medicijn) 
VALUES(:NaamMedi)';

$statement = $pdo->prepare($sql);

$statement->execute([
	':NaamMedi' => $medinaam,
]);

header('Location: ../../medicijnen.php');
// echo $name.' '.'was inserted';
?>