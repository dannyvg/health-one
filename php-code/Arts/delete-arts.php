
<?php
require_once '../connect.php';
$con = new connection();
$pdo = $con->make();

$id = $_GET['id'];

$sql = 'DELETE FROM arts
      WHERE idArts = :id';

$statement = $pdo->prepare($sql);
$statement->bindParam(':id', $id, PDO::PARAM_INT);

if ($statement->execute()) {
  echo 'id'. $id . ' was deleted successfully.';
}

header('location: ../../artsen.php');


?>