<?php

function dropdownarts(){
    require_once '../connect.php';
    $con = new connection();
    $pdo = $con->make();  
    $smt = $pdo->prepare("SELECT idMedicijnen, Naam_Medicijn FROM medicijnen");
    $smt->execute();
    $data = $smt->fetchAll();
    $pdo = null;
    return $data;
}

function dropdownartspat(){
    require_once '../connect.php';
    $con = new connection();
    $pdo = $con->make();  
    $smt = $pdo->prepare("SELECT idPatient, Voornaam, Tussenvoegsel, Achternaam FROM patient where Arts_idArts = :id");
    $smt->execute([
        ':id' => $_SESSION['id']
    ]);
    $data = $smt->fetchAll();
    $pdo = null;
    return $data;
}
?>