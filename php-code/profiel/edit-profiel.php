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

    <title>Profiel Bewerken | ZilverenKruis</title>
</head>
<body>

<?php
include '../../nav.php';
?>

<section class="clean-block clean-form h-100">
        <div class="container">
            <div class="block-heading" style="padding-top: 0px;">
                <h2 class="text-primary" style="margin-top: 100px;">Wijzig je profiel<br></h2>
                <p>Wijzig hier je profiel.</p>
            </div>
            <form action="edit-profiel-process.php?id=<?php echo $id = $_SESSION['id']; ?>"  method="post" enctype="multipart/form-data" role="form">

                <div class="form-group mb-3"><label class="form-label">Naam gebruiker*</label><input class="form-control" type="text" placeholder="Naam-Gebruiker" name="Naam-Gebruiker" value="<?php echo $_SESSION['name'];?>" required=""></div>        
                <div class="form-group mb-3"><label class="form-label">Adress*</label><input class="form-control" type="text" placeholder="Adress" name="Adress" value="<?php echo $_SESSION['ad'];?>" required=""></div>        
                <div class="form-group mb-3"><label class="form-label">Email*</label><input class="form-control" type="email" placeholder="Email" name="Email" value="<?php echo $_SESSION['mail'];?>" required=""></div>             
                <div class="form-group mb-3"><label class="form-label">Telefoonnummer*</label><input class="form-control" type="text" placeholder="Telefoonnummer" name="Telefoonnummer" value="<?php echo $_SESSION['tel'];?>" required=""></div>        
                
                <hr style="margin-top: 30px;margin-bottom: 10px;">
                <div class="form-group mb-3"><button class="btn btn-primary d-block w-100" type="submit"><i class="fas fa-save"></i>&nbsp;Opslaan</button></div>
            </form>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    
</body>
</html>