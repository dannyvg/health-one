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
    <title>Home | ZilverenKruis</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Login-with-overlay-image.css">
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
<?php
if($_SESSION['role'] == 1){

    include ('nav.php');
} elseif ($_SESSION['role'] == 2){
    include 'apotheek-nav.php';
}else{
    include 'arts-nav.php';
}

?>


<?php
    echo "<div class='name'> Naam:"." ".$_SESSION['name']; "</div>";

if ($_SESSION['role'] == 1){

    echo "<div class='role'>Role: Verzekeraar</div>";

        echo '<a href="artsen.php">
        <div class="square">
            Artsen
        </div>
    </a>

    <a href="apotheken.php">
        <div class="square">
            Apotheken
        </div>
    </a>

    <br>

    <a href="medicijnen.php">
        <div class="square">
            Medicijnen 
        </div>
    </a>

    <a href="patienten.php">
        <div class="square">
        Patienten
        </div>
    </a>';

} elseif($_SESSION['role'] == 2){

    echo "<div class='role'>Role: Apotheek</div>";
    echo "</br>";
    echo '<a href="php-code/Apotheek/voorgeschreven.php">Voorgeschreven</a>';

} elseif($_SESSION['role'] == 3){

    echo "<div class='role'>Role: Arts</div>";
    echo "</br>";
    echo '<a href="php-code/Arts/patienten.php">Patienten</a>';

}
?>







</body>
</html>