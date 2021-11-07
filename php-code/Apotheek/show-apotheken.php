<?php

function apotheekLatenZien(){

    require_once 'php-code/connect.php';
    $con = new connection();
    $pdo = $con->make();

    $sql = 'SELECT * 
		FROM gebruikers where role = 2';

    $statement = $pdo->query($sql);

    // get all publishers
    $apotheken = $statement->fetchAll(PDO::FETCH_ASSOC);
    if ($apotheken) {
        // show the publishers
        echo "<table>
            <tr>
              <th>Naam</th>
              <th>Address</th>
              <th>Stad</th>
              <th>Email</th>
              <th>Telefoonnummer</th>
              <th>Acties</th>
              <th>  </th>
            </tr>";
            
        foreach ($apotheken as $apotheek) {
            // echo "Patient"."<br>";
            // echo $patienten['Zilverenkruisnummer'] . "\n" . $patienten['Voornaam']. "\n" .$patienten['Tussenvoegsel']. "\n" .$patienten['Achternaam']. "\n" .$patienten['Geboortedatum'].'<br>';
            echo "<tr>
            <td>".$apotheek['Naam_Gebruiker']."</td>
            <td>". $apotheek['Address']."</td>
            <td>". $apotheek['Stad']."</td>
            <td>".$apotheek['Email']."</td>
            <td>".$apotheek['Telefoonnummer']."</td>";
              // echo "<td> <a href='/dropdown-patient.php?verwijder_patient&id=".$patient['idPatient']."'>Delete</a>";
              echo "<td> <a href='php-code/Apotheek/edit-apotheek.php?id=".$apotheek['idGebruiker']."'>Edit</a>";
            //   echo "<td> <a href='patient-edit.php?id=".$apotheek['idApotheek']."'>Edit</a>";
              echo "<td> <a href='php-code/Apotheek/delete-apotheek.php?id=".$apotheek['idGebruiker']."'>Delete</a>";
            //   echo "<td> <a href='php-code/delete_patient.php?id=".$apotheek['idApotheek']."'>Delete</a>";
            "
          </tr>";
            
        }
        echo "</table>";
    }

}




?>