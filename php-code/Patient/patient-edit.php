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
                <h2 class="text-primary" style="margin-top: 100px;">Wijzig een patient<br></h2>
                <p>Wijzig hier een patient.</p>
            </div>
            <form action="patient-edit-process.php?id=<?php echo $id = $_GET['id']; ?>"  method="post" enctype="multipart/form-data" role="form">

            <?php
                require_once '../connect.php';
                $con = new connection();
                $pdo = $con->make();
                $id = $_GET['id'];

                $sql = 'SELECT * 
		        FROM patient WHERE idPatient=:id';

                $statement = $pdo->prepare($sql);

                $statement->bindParam(':id', $id);
                
                $statement->execute();
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                
            ?>

                <div class="form-group mb-3"><label class="form-label">Zilverenkruisnummer*</label><input class="form-control" type="text" placeholder="Zilverenkruisnummer" name="Zilverenkruisnummer" value="<?php echo $result['Zilverenkruisnummer'];?>" required=""></div>
                <div class="form-group mb-3"><label class="form-label">Voornaam*</label><input class="form-control" type="text" placeholder="Voornaam" name="Voornaam" value="<?php echo $result['Voornaam'];?>" required=""></div>
                <div class="form-group mb-3"><label class="form-label">Tussenvoegsel*</label><input class="form-control" type="text" placeholder="Tussenvoegsel" name="Tussenvoegsel" value="<?php echo $result['Tussenvoegsel'];?>" required=""></div>
                <div class="form-group mb-3"><label class="form-label">Achternaam*</label><input class="form-control" type="text" placeholder="Achternaam" name="Achternaam" value="<?php echo $result['Achternaam'];?>" required=""></div>
                <div class="form-group mb-3"><label class="form-label">Geboortedatum*</label><input class="form-control" type="Date" placeholder="Geboortedatum" name="Geboortedatum" value="<?php echo $result['Geboortedatum'];?>" required=""></div>
                <div class="form-group mb-3"><label class="form-label">Email*</label><input class="form-control" type="email" placeholder="Email" name="email" value="<?php echo $result['Email_Patient'];?>" required=""></div>
                <div class="form-group mb-3"><label class="form-label">Telefoonnummer*</label><input class="form-control" type="text" placeholder="Telefoonnummer" name="tel" value="<?php echo $result['Telefoonnummer'];?>" required=""></div>
                <div class="form-group mb-3"><label class="form-label">Bijzonderheden</label><textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="Bijzonderheden" placeholder="Bijzonderheden"> <?php echo $result['Bezonderheden'];?> </textarea></div>
                
                <div class="form-group mb-3"><label class="form-label">Dokter*</label><select  name="idArts" class="form-select countries order-alpha limit-pop-1000000 presel-MX group-continents group-order-na" value="<?php echo $result['Arts_idArts'];?>" required="">
                <?php 
                    include 'dropdown-patient.php';

                    $rows = dropdownarts();
                    foreach($rows as $row){
                        echo "<option value='". $row['idGebruiker'] . "'>" . $row['Naam_Gebruiker'] . "</option>";
                    }
                  ?>
                </select></div>



                <div class="form-group mb-3"><label class="form-label">Apotheek*</label><select  name="idApotheek" class="form-select countries order-alpha limit-pop-1000000 presel-MX group-continents group-order-na" value="<?php echo $result['Apotheek_idApot heek'];?>" required="">
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
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    
</body>
</html>