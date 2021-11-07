<?php
function patientenLatenZienPerArts(){
    require_once '../connect.php';
    $con = new connection();
    $pdo = $con->make();
  
    $sql = 'SELECT * 
    FROM patient where Arts_idArts = :arts';

  
    $statement = $pdo->prepare($sql); 
    $statement->execute([
        ':arts' => $_SESSION['id']
    ]);
  
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
       
            echo "<td> <a href='../Patient/patient-view.php?id=".$patient['idPatient']."'>View</a>";
            if($_SESSION['role'] == 1){
              // echo "<td> <a href='/dropdown-patient.php?verwijder_patient&id=".$patient['idPatient']."'>Delete</a>";
              
              echo "<td> <a href='php-code/Patient/patient-edit.php?id=".$patient['idPatient']."'>Edit</a>";
              echo "<td> <a href='php-code/Patient/delete_patient.php?id=".$patient['idPatient']."'>Delete</a>";
            }

            if($_SESSION['role'] == 3){
              echo "<td> <a href='voorschrijven.php?id=".$patient['idPatient']."'>Medicijnen voorschrijven</a>";
            }
            
  
            
            "
          </tr>";
            
        }
        echo "</table>";
    }
  }

?>