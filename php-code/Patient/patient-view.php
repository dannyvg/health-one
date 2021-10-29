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

    <title>Patient inzien | ZilverenKruis</title>
</head>
<body>

<?php
include '../../nav.php';
include 'dropdown-patient.php';

$pattest = patientview();
?>

<section class="clean-block clean-form h-100">
        <div class="container">
            <div class="block-heading" style="padding-top: 0px;">
                <h2 class="text-primary" style="margin-top: 100px;">Patient | <?php echo $pattest['Zilverenkruisnummer'];  ?><br></h2>
            </div>

            <form action="#"  method="post" enctype="multipart/form-data" role="form">
                <div class="form-group mb-3"><label class="form-label">Zilverenkruisnummer</label><input class="form-control" type="text"  readonly placeholder="Zilverenkruisnummer" name="Zilverenkruisnummer" value="<?php echo $pattest['Zilverenkruisnummer'];?>"></div>
                <div class="form-group mb-3"><label class="form-label">Voornaam</label><input class="form-control" type="text"  readonly placeholder="Address" name="Address" value="<?php echo $pattest['Voornaam'];?>"></div>
                <div class="form-group mb-3"><label class="form-label">Tussenvoegsel</label><input class="form-control" type="text"  readonly placeholder="Email" name="Email" value="<?php echo $pattest['Tussenvoegsel'];?>"></div>
                <div class="form-group mb-3"><label class="form-label">Achternaam</label><input class="form-control" type="text" readonly placeholder="Telefoonnummer" name="Telefoonnummer" value="<?php echo $pattest['Achternaam'];?>"></div>
                <div class="form-group mb-3"><label class="form-label">Geboortedatum</label><input class="form-control" type="text" readonly placeholder="Role" name="Role" value="<?php echo $pattest['Geboortedatum']; ?>"></div>
                <div class="form-group mb-3"><label class="form-label">Email</label><input class="form-control" type="text" readonly placeholder="Role" name="Role" value="<?php echo $pattest['Email']; ?>"></div>
                <div class="form-group mb-3"><label class="form-label">Telefoonnummer</label><input class="form-control" type="text" readonly placeholder="Role" name="Role" value="<?php echo $pattest['Telefoonnummer']; ?>"></div>
                <div class="form-group mb-3"><label class="form-label">Bijzonderheden</label><input class="form-control" type="text" readonly placeholder="Role" name="Role" value="<?php echo $pattest['Bezonderheden']; ?>"></div>
                <div class="form-group mb-3"><label class="form-label">Arts</label><input class="form-control" type="text" readonly placeholder="Role" name="Role" value="<?php echo $pattest['Naam_Arts']; ?>"></div>
                <div class="form-group mb-3"><label class="form-label">Apotheek</label><input class="form-control" type="text" readonly placeholder="Role" name="Role" value="<?php echo $pattest['Naam_Apotheek']; ?>"></div>

                <hr style="margin-top: 30px;margin-bottom: 10px;">
                <!-- <div class="form-group mb-3"><button class="btn btn-primary d-block w-100" type="submit"><i class="fas fa-save"></i><a href="#" style="color:white; text-decoration: none;">&nbsp;Aanpassen</button></div> -->
            </form>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    
</body>
</html>
