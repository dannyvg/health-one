<?php

session_start();
// if not logged in
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
elseif($_SESSION['role'] == 3){
    header('Location: home.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Voeg een arts toe | Health One</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/Ludens-Users---25-After-Register.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
</head>

<body style="background-color: #f1f7fc;">

    <?php
    include 'nav.php';
    ?>

    <section class="clean-block clean-form h-100">
        <div class="container">
            <div class="block-heading" style="padding-top: 0px;">
                <h2 class="text-primary" style="margin-top: 100px;">Voeg een gebruiker toe<br></h2>
                <p>Voeg hier een gebruiker toe aan het systeem</p>
            </div>
            <form action="php-code/insert.php" method="post" enctype="multipart/form-data" role="form">
                <div class="form-group mb-3"><label class="form-label">Naam*</label><input class="form-control" type="text" placeholder="Naam" name="name" required=""></div>
                <div class="form-group mb-3"><label class="form-label">Address*</label><input class="form-control" type="text" placeholder="Address" name="address" required=""></div>
                <div class="form-group mb-3"><label class="form-label">Telefoonnummer*</label><input class="form-control" type="text" placeholder="Telefoonnummer" name="tel" required=""></div>
                <div class="form-group mb-3"><label class="form-label">Email*</label><input class="form-control" type="text" placeholder="Email" name="email" required=""></div>
                <div class="form-group mb-3"><label class="form-label">Wachtwoord*</label><input class="form-control" type="password" placeholder="Wachtwoord" name="wachtwoord" required=""></div>
                <div class="form-group mb-3"><label class="form-label">Role*</label><select class="form-select countries order-alpha limit-pop-1000000 presel-MX group-continents group-order-na" id="roles" name="roles" required="">
                        <option value="1">verzekeraar</option>
                        <option value="2">Apotheek</option>
                        <option value="3">Arts</option>
                    </select></div>
                <hr style="margin-top: 30px;margin-bottom: 10px;">
                <div class="form-group mb-3"><button class="btn btn-primary d-block w-100" type="submit"><i class="fas fa-save"></i>&nbsp;Opslaan</button></div>
            </form>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>