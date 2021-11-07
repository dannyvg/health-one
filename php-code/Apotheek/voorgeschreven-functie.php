<?php
function voorgeschrevenLatenZien(){

    require_once '../connect.php';
    $con = new connection();
    $pdo = $con->make();

    $sql = 'SELECT p.Voornaam, p.Tussenvoegsel, p.Achternaam, pm.id, G1.Naam_Gebruiker AS Appotheker, G2.Naam_Gebruiker AS Naam_arts,G2.Telefoonnummer, Dosis AS D, Duur, Duur_tot, afgeleverd, Naam_Medicijn FROM patient_has_medicijnen pm
    INNER JOIN patient p ON p.idPatient = pm.Patient_idPatient
    INNER JOIN gebruikers G1 ON G1.idGebruiker = p.Apotheek_idApotheek
    INNER JOIN gebruikers G2 ON G2.idGebruiker = p.Arts_idArts
    INNER JOIN medicijnen m ON m.idMedicijnen = pm.Medicijnen_idMedicijnen where afgeleverd = 0;';

    $statement = $pdo->query($sql);

    // get all publishers
    $patienten = $statement->fetchAll(PDO::FETCH_ASSOC);
    if ($patienten) {
        // show the publishers
        echo "<table>
            <tr>
              <th>Voornaam</th>
              <th>Tussenvoegsel</th>
              <th>Achternaam</th>
              <th>Dokter</th>
              <th>Medicijn</th>
              <th>Dosis</th>
              <th>Begin</th>
              <th>Tot</th>

              
              <th>Acties</th>
            </tr>";
            
        foreach ($patienten as $patient) {
            // echo "Patient"."<br>";
            // echo $patienten['Zilverenkruisnummer'] . "\n" . $patienten['Voornaam']. "\n" .$patienten['Tussenvoegsel']. "\n" .$patienten['Achternaam']. "\n" .$patienten['Geboortedatum'].'<br>';
            echo "<tr>
            <td>".$patient['Voornaam']."</td>
            <td>".$patient['Tussenvoegsel']."</td>
            <td>".$patient['Achternaam']."</td>
            <td>".$patient['Naam_arts']."</td>
            <td>".$patient['Naam_Medicijn']."</td>
            <td>".$patient['D']."</td>
            <td>".$patient['Duur']."</td>
            <td>".$patient['Duur_tot']."</td>";
            echo "<td> <a href='afgeleverd.php?id=".$patient['id']."'>Afgeleverd</a> </td>";
            // echo "<td><input type='checkbox'  name='vehicle3' value='Boat'> </td>";
            "
          </tr>";
            
        }
        echo "</table>";
    }

}


function Afgeleverd(){
  
  require_once '../connect.php';
  $con = new connection();
  $pdo = $con->make();

  $sql = 'SELECT p.Voornaam, p.Tussenvoegsel, p.Achternaam, pm.id, G1.Naam_Gebruiker AS Appotheker, G2.Naam_Gebruiker AS Naam_arts,G2.Telefoonnummer, Dosis AS D, Duur, Duur_tot, afgeleverd, Naam_Medicijn FROM patient_has_medicijnen pm
  INNER JOIN patient p ON p.idPatient = pm.Patient_idPatient
  INNER JOIN gebruikers G1 ON G1.idGebruiker = p.Apotheek_idApotheek
  INNER JOIN gebruikers G2 ON G2.idGebruiker = p.Arts_idArts
  INNER JOIN medicijnen m ON m.idMedicijnen = pm.Medicijnen_idMedicijnen where afgeleverd = 1;';

  $statement = $pdo->query($sql);

  // get all publishers
  $patienten = $statement->fetchAll(PDO::FETCH_ASSOC);
  if ($patienten) {
      // show the publishers
      echo "<table>
          <tr>
            <th>Voornaam</th>
            <th>Tussenvoegsel</th>
            <th>Achternaam</th>
            <th>Dokter</th>
            <th>Medicijn</th>
            <th>Dosis</th>
            <th>Begin</th>
            <th>Tot</th>
         </tr>";
          
      foreach ($patienten as $patient) {
          // echo "Patient"."<br>";
          // echo $patienten['Zilverenkruisnummer'] . "\n" . $patienten['Voornaam']. "\n" .$patienten['Tussenvoegsel']. "\n" .$patienten['Achternaam']. "\n" .$patienten['Geboortedatum'].'<br>';
          echo "<tr>
          <td>".$patient['Voornaam']."</td>
          <td>".$patient['Tussenvoegsel']."</td>
          <td>".$patient['Achternaam']."</td>
          <td>".$patient['Naam_arts']."</td>
          <td>".$patient['Naam_Medicijn']."</td>
          <td>".$patient['D']."</td>
          <td>".$patient['Duur']."</td>
          <td>".$patient['Duur_tot']."</td>";
          // echo "<td><input type='checkbox'  name='vehicle3' value='Boat'> </td>";
          "
        </tr>";
          
      }
      echo "</table>";
  }
};


?>