<?php
// if not logged in
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Voorgeschreven | ZilverenKruis</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../../assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="../../assets/css/Login-with-overlay-image.css">
    <link rel="stylesheet" href="../../styles/style.css">
</head>
<body>
<?php
if($_SESSION['role'] == 1){

    include ('../../nav.php');
} elseif ($_SESSION['role'] == 2){
    include '../../apotheek-nav.php';
}else{
    include '../../arts-nav.php';
}

?>
<button class="btn btn-primary d-block w-40 patienten-add" onclick="window.location.href='afgeleverd-medicijn.php'" type="button">&nbsp;Afgeleverd</button>

<div class="views">

<?php
include 'voorgeschreven-functie.php';
voorgeschrevenLatenZien();
?>



</div>









</body>
</html>