<?php
// if not logged in
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../../assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="../../assets/css/Login-with-overlay-image.css">
    <link rel="stylesheet" href="../../assets/css/Ludens-Users---25-After-Register.css">
    <link rel="stylesheet" href="../../styles/style.css">

    <title>Patienten Toevoegen | ZilverenKruis</title>
</head>
<body>

<?php
include '../../nav.php';
?>

<section class="clean-block clean-form h-100">
        <div class="container">
            <div class="block-heading" style="padding-top: 0px;">
                <h2 class="text-primary" style="margin-top: 100px;">Voeg een Patient toe<br></h2>
                <p>Voeg hier een patient toe aan het systeem</p>
            </div>
            <form action="patienten-add.php" method="post" enctype="multipart/form-data" role="form">
                <div class="form-group mb-3"><label class="form-label">Zilverenkruisnummer*</label><input class="form-control" type="text" placeholder="Zilverenkruisnummer" name="Zilverenkruisnummer" required=""></div>
                <div class="form-group mb-3"><label class="form-label">Voornaam*</label><input class="form-control" type="text" placeholder="Voornaam" name="Voornaam" required=""></div>
                <div class="form-group mb-3"><label class="form-label">Tussenvoegsel*</label><input class="form-control" type="text" placeholder="Tussenvoegsel" name="Tussenvoegsel" required=""></div>
                <div class="form-group mb-3"><label class="form-label">Achternaam*</label><input class="form-control" type="text" placeholder="Achternaam" name="Achternaam" required=""></div>
                <div class="form-group mb-3"><label class="form-label">Geboortedatum*</label><input class="form-control" type="Date" placeholder="Geboortedatum" name="Geboortedatum" required=""></div>
                <div class="form-group mb-3"><label class="form-label">Email*</label><input class="form-control" type="text" placeholder="Email" name="email" required=""></div>
                <div class="form-group mb-3"><label class="form-label">Telefoonnummer*</label><input class="form-control" type="text" placeholder="Telefoonnummer" name="tel" required=""></div>
                <div class="form-group mb-3"><label class="form-label">Bijzonderheden</label><textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="Bijzonderheden" placeholder="Bijzonderheden"></textarea></div>
                
                <div class="form-group mb-3"><label class="form-label">Dokter*</label><select  name="idArts" class="form-select countries order-alpha limit-pop-1000000 presel-MX group-continents group-order-na" required="">
                <?php 
                    include 'dropdown-patient.php';

                    $rows = dropdownarts();
                    foreach($rows as $row){
                        echo "<option value='". $row['idGebruiker'] . "'>" . $row['Naam_Gebruiker'] . "</option>";
                    }
                  ?>
                </select></div>



                <div class="form-group mb-3"><label class="form-label">Apotheek*</label><select  name="idApotheek" class="form-select countries order-alpha limit-pop-1000000 presel-MX group-continents group-order-na" required="">
                    <?php
                    $rows2 = dropdownapotheek();
                  
                    
                    foreach($rows2 as $row){
                        echo "<option value='". $row['idGebruiker'] . "'>" . $row['Naam_Gebruiker'] . "</option>";
                    }
                  ?>  
                  </select></div>
              
                    
                
                <hr style="margin-top: 30px;margin-bottom: 10px;">
                <div class="form-group mb-3"><button class="btn btn-primary d-block w-100" type="submit"><i class="fas fa-save"></i>&nbsp;Opslaan</button></div>
            </form>
        </div>
    </section>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    
</body>
</html>