<?php

function ShowMedicijnen(){

    require_once 'php-code/connect.php';
    $con = new connection();
    $pdo = $con->make();

    $sql = 'SELECT * 
		FROM medicijnen';

    $statement = $pdo->query($sql);

    // get all publishers
    $medicijnen = $statement->fetchAll(PDO::FETCH_ASSOC);
    if ($medicijnen) {
        // show the publishers
        echo "<table>
            <tr>
              <th>Naam</th>";

              if($_SESSION['role'] == 1){
                echo "<th>Acties</th>
                <th>  </th>
              </tr>";

              };
            
        foreach ($medicijnen as $medicijn) {
            // echo "Patient"."<br>";
            // echo $patienten['Zilverenkruisnummer'] . "\n" . $patienten['Voornaam']. "\n" .$patienten['Tussenvoegsel']. "\n" .$patienten['Achternaam']. "\n" .$patienten['Geboortedatum'].'<br>';
            echo "<tr>
            <td>".$medicijn['Naam_Medicijn']."</td>";

            if($_SESSION['role'] == 1){
              // echo "<td> <a href='/dropdown-patient.php?verwijder_patient&id=".$patient['idPatient']."'>Delete</a>";
              echo "<td> <a href='php-code/Medicijnen/edit-medicijnen.php?id=".$medicijn['idMedicijnen']."'>Edit</a>";
            //   echo "<td> <a href='patient-edit.php?id=".$apotheek['idApotheek']."'>Edit</a>";
              echo "<td> <a href='php-code/Medicijnen/delete-medicijnen.php?id=".$medicijn['idMedicijnen']."'>Delete</a>";
            //   echo "<td> <a href='php-code/delete_patient.php?id=".$apotheek['idApotheek']."'>Delete</a>";
            "
          </tr>";
            }
        }
        echo "</table>";
    }

}




?>