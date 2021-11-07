<?php

$pdo = require_once '../connect.php';
$con = new connection();
    $pdo = $con->make();

$Zilverenkruisnummer = $_POST['Zilverenkruisnummer'];
// $zknn = (int)$Zilverenkruisnummer;

$Voornaam = $_POST['Voornaam'];
$Tussenvoegsel = $_POST['Tussenvoegsel'];
$Achternaam = $_POST['Achternaam'];
// $Geboortedatum = $_POST['Geboortedatum'];

$email = $_POST['email'];
$tel = $_POST['tel'];
$Bijzonderheden = $_POST['Bijzonderheden'];

$idArts = $_POST['idArts'];
$idApotheek = $_POST['idApotheek'];

$time = strtotime($_POST['Geboortedatum']);

$Geboortedatum = date('Y-m-d',$time);




$sql = 'INSERT INTO patient(Zilverenkruisnummer,Voornaam,Tussenvoegsel, Achternaam, Geboortedatum, Email_Patient, Telefoonnummer, Bezonderheden, Arts_idArts, Apotheek_idApotheek) 
VALUES(:Zilverenkruisnummer,:Voornaam,:Tussenvoegsel,:Achternaam,:Geboortedatum,:email,:tel,:Bijzonderheden, :idArts, :idApotheek)';

$statement = $pdo->prepare($sql);

$statement->execute([
	':Zilverenkruisnummer' => $Zilverenkruisnummer,
    ':Voornaam' => $Voornaam,
    ':Tussenvoegsel' => $Tussenvoegsel,
    ':Achternaam' => $Achternaam,
    ':Geboortedatum' => $Geboortedatum,
    ':email' => $email,
    ':tel' => $tel,
    ':Bijzonderheden' => $Bijzonderheden,
    ':idArts' => $idArts,
    ':idApotheek' => $idApotheek,
]);

header('Location: ../../patienten.php');
// echo $name.' '.'was inserted';