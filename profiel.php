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

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Login-with-overlay-image.css">
    <link rel="stylesheet" href="assets/css/Ludens-Users---25-After-Register.css">
    <link rel="stylesheet" href="./styles/style.css">

    <title>Account | ZilverenKruis</title>
</head>
<body>

<?php
if($_SESSION['role'] == 1){
    include ('nav.php');
} elseif ($_SESSION['role'] == 2){
    include ('apotheek-nav.php');
}else{
    include 'arts-nav.php';
}
?>

<section class="clean-block clean-form h-100">
        <div class="container">
            <div class="block-heading" style="padding-top: 0px;">
                <h2 class="text-primary" style="margin-top: 100px;">Account<br></h2>
            </div>

            <form action="#"  method="post" enctype="multipart/form-data" role="form">
            <!-- <form action="php-code/patient-edit-process.php?id=<?php //echo $id = $_GET['id']; ?>"  method="post" enctype="multipart/form-data" role="form"> -->


                <div class="form-group mb-3"><label class="form-label">Gebruikersnaam</label><input class="form-control" type="text"  readonly placeholder="Voornaam" name="Voornaam" value="<?php echo $_SESSION['name'];?>"></div>
                <div class="form-group mb-3"><label class="form-label">Address</label><input class="form-control" type="text"  readonly placeholder="Address" name="Address" value="<?php echo $_SESSION['ad'];?>"></div>
                <div class="form-group mb-3"><label class="form-label">Email</label><input class="form-control" type="text"  readonly placeholder="Email" name="Email" value="<?php echo $_SESSION['mail'];?>"></div>
                <div class="form-group mb-3"><label class="form-label">Telefoonnummer</label><input class="form-control" type="text" readonly placeholder="Telefoonnummer" name="Telefoonnummer" value="<?php echo $_SESSION['tel'];?>"></div>
                <div class="form-group mb-3"><label class="form-label">Role</label><input class="form-control" type="text" readonly placeholder="Role" name="Role" 
                value="<?php
                    if ($_SESSION['role'] == 1){
                        echo "Verzekeraar";
                    }
                    else if ($_SESSION['role'] == 2) {
                        echo "Apotheek";
                    }
                    else{
                        echo "Arts";
                    }
                ?>"></div>


                <hr style="margin-top: 30px;margin-bottom: 10px;">
                <div class="form-group mb-3"><button class="btn btn-primary d-block w-100" type="submit"><i class="fas fa-save"></i><a href="php-code/profiel/edit-profiel.php" style="color:white; text-decoration: none;">&nbsp;Aanpassen</button></div>
                <div class="form-group mb-3"><button class="btn btn-primary d-block w-100" type="submit"><i class="fas fa-save"></i><a href="php-code/profiel/edit-wachtwoord.php" style="color:white; text-decoration: none;">&nbsp;Wachtwoord aanpassen</button></div>
            </form>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    
</body>
</html>