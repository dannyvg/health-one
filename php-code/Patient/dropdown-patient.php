<?php

function dropdownarts(){
    require_once '../connect.php';
    $con = new connection();
    $pdo = $con->make();  
    $smt = $pdo->prepare("SELECT idGebruiker, Naam_Gebruiker FROM gebruikers where role = 3");
    $smt->execute();
    $data = $smt->fetchAll();
    $pdo = null;
    return $data;
}



function dropdownapotheek(){
    require_once '../connect.php';  
    $con = new connection();
    $pdo = $con->make();
   
    
    $smt = $pdo->prepare("SELECT idGebruiker, Naam_Gebruiker FROM gebruikers where role = 2");
    $smt->execute();
    $data2 = $smt->fetchAll(PDO::FETCH_ASSOC);
    $pdo = null;
    return $data2;
}



function patientenLatenZien(){

    require_once 'php-code/connect.php';
    $con = new connection();
    $pdo = $con->make();

    $sql = 'SELECT * 
		FROM patient';

    $statement = $pdo->query($sql);

    // get all publishers
    $patienten = $statement->fetchAll(PDO::FETCH_ASSOC);
    if ($patienten) {
        // show the publishers
        echo "<table>
            <tr>
              <th>Zilverenkruisnummer</th>
              <th>Voornaam</th>
              <th>Tussenvoegsel</th>
              <th>Achternaam</th>
              <th>Geboortedatum</th>

              
              <th>Acties</th>
              <th>  </th>
              <th>  </th>
            </tr>";
            
        foreach ($patienten as $patient) {
            // echo "Patient"."<br>";
            // echo $patienten['Zilverenkruisnummer'] . "\n" . $patienten['Voornaam']. "\n" .$patienten['Tussenvoegsel']. "\n" .$patienten['Achternaam']. "\n" .$patienten['Geboortedatum'].'<br>';
            echo "<tr>
            <td>".$patient['Zilverenkruisnummer']."</td>
            <td>". $patient['Voornaam']."</td>
            <td>".$patient['Tussenvoegsel']."</td>
            <td>".$patient['Achternaam']."</td>
            <td>".$patient['Geboortedatum']."</td>";
       
            echo "<td> <a href='php-code/Patient/patient-view.php?id=".$patient['idPatient']."'>View</a>";
            if($_SESSION['role'] == 1){
              // echo "<td> <a href='/dropdown-patient.php?verwijder_patient&id=".$patient['idPatient']."'>Delete</a>";
              
              echo "<td> <a href='php-code/Patient/patient-edit.php?id=".$patient['idPatient']."'>Edit</a>";
              echo "<td> <a href='php-code/Patient/delete_patient.php?id=".$patient['idPatient']."'>Delete</a>";
            }
            

            
            "
          </tr>";
            
        }
        echo "</table>";
    }

}



function patientview(){

  $id = $_GET['id'];

  require_once '../connect.php';
  $con = new connection();
      $pdo = $con->make();

  $sql = 'SELECT * FROM patient inner join gebruikers on gebruikers.idGebruiker = patient.Arts_idArts WHERE idPatient = :idp';
          
  $statement = $pdo->prepare($sql);
  $statement->execute([
    ':idp' => $id
    
  ]);

  $pat = $statement->fetch(PDO::FETCH_ASSOC);
  $pdo=null;
  return $pat;


// if ($pat) {
// 	echo $pat['idPatient'] . '.' . $pat['Voornaam'];
// }
}

function patientviewMedi(){

  $id = $_GET['id'];

  require_once '../connect.php';
  $con = new connection();
      $pdo = $con->make();

  $sql = 'SELECT * FROM patient_has_medicijnen inner join medicijnen on patient_has_medicijnen.Medicijnen_idMedicijnen = medicijnen.idMedicijnen WHERE Patient_idPatient = :idp;';
          
  $statement = $pdo->prepare($sql);
  $statement->execute([
    ':idp' => $id
    
  ]);

  $patmed = $statement->fetch(PDO::FETCH_ASSOC);
  $pdo=null;
  return $patmed;


// if ($pat) {
// 	echo $pat['idPatient'] . '.' . $pat['Voornaam'];
// }
}








?>

