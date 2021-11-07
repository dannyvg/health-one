<?php

function ShowArtsen(){

    require_once 'php-code/connect.php';
    $con = new connection();
    $pdo = $con->make();

    $sql = 'SELECT * 
		FROM gebruikers where role = 3';

    $statement = $pdo->query($sql);

    // get all publishers
    $artsen = $statement->fetchAll(PDO::FETCH_ASSOC);
    if ($artsen) {
        // show the publishers
        echo "<table>
            <tr>
              <th>Naam</th>
              <th>Address</th>
              <th>Telefoonnummer</th>
              <th>Email</th>
              <th>Acties</th>
              <th>  </th>
            </tr>";
            
        foreach ($artsen as $arts) {
            // echo "Patient"."<br>";
            // echo $patienten['Zilverenkruisnummer'] . "\n" . $patienten['Voornaam']. "\n" .$patienten['Tussenvoegsel']. "\n" .$patienten['Achternaam']. "\n" .$patienten['Geboortedatum'].'<br>';
            echo "<tr>
            <td>".$arts['Naam_Gebruiker']."</td>
            <td>". $arts['Address']."</td>
            <td>". $arts['Telefoonnummer']."</td>
            <td>".$arts['Email']."</td>";
              // echo "<td> <a href='/dropdown-patient.php?verwijder_patient&id=".$patient['idPatient']."'>Delete</a>";
              echo "<td> <a href='php-code/Arts/edit-arts.php?id=".$arts['idGebruiker']."'>Edit</a>";
            //   echo "<td> <a href='patient-edit.php?id=".$apotheek['idApotheek']."'>Edit</a>";
              echo "<td> <a href='php-code/Arts/delete-arts.php?id=".$arts['idGebruiker']."'>Delete</a>";
            //   echo "<td> <a href='php-code/delete_patient.php?id=".$apotheek['idApotheek']."'>Delete</a>";
            "
          </tr>";
            
        }
        echo "</table>";
    }

}




?>