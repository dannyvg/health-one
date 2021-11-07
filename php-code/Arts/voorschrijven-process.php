<?php

$pdo = require_once '../connect.php';
$con = new connection();
    $pdo = $con->make();

$id = $_GET['id'];
$idMed = $_POST['idMed'];
$dosis = $_POST['dosis'];
// $begindatum = $_POST['begindatum'];

$timebeg = strtotime($_POST['begindatum']);
$timebegin = date('Y-m-d',$timebeg);

$time = strtotime($_POST['eindatum']);
$timeend = date('Y-m-d',$time);
// $eindatum = $_POST['eindatum'];


$sql = 'INSERT INTO patient_has_medicijnen(Patient_idPatient, Medicijnen_idMedicijnen, Dosis, Duur, Duur_tot) 
VALUES(:pat, :med, :dosis, :Duur, :Duurtot)';

$statement = $pdo->prepare($sql);

$statement->execute([
	':pat' => $id,
	':med' => $idMed,
	':dosis' => $dosis,
	':Duur' => $timebegin,
	':Duurtot' => $timeend
]);

header('Location: patienten.php');
// echo $name.' '.'was inserted';
?>