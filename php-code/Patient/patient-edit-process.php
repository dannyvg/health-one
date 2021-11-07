<?php


require_once '../connect.php';
$con = new connection();
$pdo = $con->make();

$id = $_GET['id'];

$zkn = $_POST['Zilverenkruisnummer'];
$Voornaam = $_POST['Voornaam'];
$Tussenvoegsel = $_POST['Tussenvoegsel'];
$Achternaam = $_POST['Achternaam'];
$Geboortedatum = $_POST['Geboortedatum'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$Bijzonderheden = $_POST['Bijzonderheden'];
$idArts = $_POST['idArts'];
$idApotheek = $_POST['idApotheek'];



$sql = 'UPDATE patient
            SET Zilverenkruisnummer = :zkn, Voornaam = :Voornaam, Tussenvoegsel = :Tussenvoegsel, 
            Achternaam = :Achternaam, Geboortedatum = :Geboortedatum, Email_Patient = :Email, Telefoonnummer = :tel,
            Bezonderheden = :Bijzonderheden, Arts_idArts = :idArts, 
            Apotheek_idApotheek = :idApotheek
            WHERE idPatient = :id';

// $sql = 'UPDATE patient
//             -- SET Zilverenkruisnummer = :zkn,
//             SET Voornaam = :Voornaam, 
//             Tussenvoegsel = :Tussenvoegsel,
//             Achternaam = :Achternaam
//             WHERE idPatient = :id';






$statement = $pdo->prepare($sql);

$statement->execute([
    ':id' => $id,
	':zkn' => $zkn,
    ':Voornaam' => $Voornaam,
    ':Tussenvoegsel' => $Tussenvoegsel,
    ':Achternaam' => $Achternaam,
    ':Geboortedatum' => $Geboortedatum,
    ':Email' => $email,
    ':tel' => $tel,
    ':Bijzonderheden' => $Bijzonderheden,
    ':idArts' => $idArts,
    ':idApotheek' => $idApotheek,
]);

header('Location: ../../patienten.php');

  
?>