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

    <title>Patienten | ZilverenKruis</title>
</head>
<body>

<?php
if($_SESSION['role'] == 1){

    include ('nav.php');
} elseif ($_SESSION == 2){
    include ('nav.php');
}else{
    include 'arts-nav.php';
}


if($_SESSION['role'] == 1){

    echo "<button class='btn btn-primary d-block w-40 patienten-add' onclick='window.location.href=`php-code/patient/patienten-toevoegen.php`' type='button'>&nbsp;Voeg patient toe</button>";
}
?>

<!-- <button class="btn btn-primary d-block w-40 patienten-add" onclick="window.location.href='php-code/patient/patienten-toevoegen.php'" type="button">&nbsp;Voeg patient toe</button> -->


<div class="views">
<?php
    include 'php-code/patient/dropdown-patient.php';
    patientenLatenZien();
?>
</div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    
</body>
</html>