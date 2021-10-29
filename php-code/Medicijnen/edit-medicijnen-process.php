<?php

$pdo = require_once '../connect.php';
$con = new connection();
    $pdo = $con->make();

$medinaam = $_POST['Naam-Medicijn'];

$idm = $_GET['id'];

$sql = 'UPDATE medicijnen SET Naam_Medicijn = :NaamMedi WHERE idMedicijnen = :idm';

$statement = $pdo->prepare($sql);

$statement->execute([
	':NaamMedi' => $medinaam,
    ':idm' => $idm,
]);

header('Location: ../../medicijnen.php');
// echo $name.' '.'was inserted';
?>