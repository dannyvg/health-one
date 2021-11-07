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

    <title>Medicijn voorschrijven | ZilverenKruis</title>
</head>
<body>

<?php
if($_SESSION['role'] == 1){

    include ('../../nav.php');
} elseif ($_SESSION == 2){
    include ('../../nav.php');
}else{
    include '../../arts-nav.php';
}
?>

<section class="clean-block clean-form h-100">
        <div class="container">
            <div class="block-heading" style="padding-top: 0px;">
                <h2 class="text-primary" style="margin-top: 100px;">Schrijf een medicijn voor<br></h2>
                <!-- <p>Wijzig hier een apotheek.</p> -->
            </div>
            <form action="voorschrijven-process.php?id=<?php echo $id = $_GET['id']; ?>"  method="post" enctype="multipart/form-data" role="form">

            <?php
                require_once '../connect.php';
                $con = new connection();
                $pdo = $con->make();
                $id = $_GET['id'];

                $sql = 'SELECT * 
		        FROM patient WHERE idPatient = :id';

                $statement = $pdo->prepare($sql);

                $statement->bindParam(':id', $id);
                
                $statement->execute();
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                
            ?>

                <!-- <div class="form-group mb-3"><label class="form-label">Naam Medicijn*</label><input class="form-control" type="text" placeholder="Naam-apotheek" name="Naam-apotheek" value="<?php echo $result['Naam_Gebruiker'];?>" required=""></div>         -->
                <div class="form-group mb-3"><label class="form-label">Medicijn*</label><select  name="idMed" class="form-select countries order-alpha limit-pop-1000000 presel-MX group-continents group-order-na" required="">
                    <?php 
                        include 'dropdownarts.php';

                        $rows = dropdownarts();
                        foreach($rows as $row){
                            echo "<option value='". $row['idMedicijnen'] . "'>" . $row['Naam_Medicijn'] . "</option>";
                        }
                    ?>
                    </select>
                </div>

                <div class="form-group mb-3"><label class="form-label">Patient*</label><input class="form-control" type="text" placeholder="Naam-Patient" name="NaamPatient" value="<?php echo $result['Voornaam'];?>" readonly ></div>        
               

                <div class="form-group mb-3"><label class="form-label">Dosis*</label><input class="form-control" type="text" placeholder="Dosis" name="dosis" required=""></div>        
                <div class="form-group mb-3"><label class="form-label">Begin datum*</label><input class="form-control" type="Date" placeholder="begindatum" name="begindatum" required=""></div>
                <div class="form-group mb-3"><label class="form-label">Eind datum*</label><input class="form-control" type="Date" placeholder="eindatum" name="eindatum" required=""></div>
                



                <hr style="margin-top: 30px;margin-bottom: 10px;">
                <div class="form-group mb-3"><button class="btn btn-primary d-block w-100" type="submit"><i class="fas fa-save"></i>&nbsp;Opslaan</button></div>
            </form>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    
</body>
</html>