
<?php

include  "../conn.php";

$codiceSarta=$_POST['SartaRiparazione'];

$codiceMaschera=$_POST['MascheraRiparazione'];

$note=$_POST['note'];

$sql = "SELECT * FROM riparazione WHERE codMaschera='$codiceMaschera' AND fineRiparazione IS NULL";
$stmt=$conn->prepare($sql);
$stmt->execute();
$totale = $stmt->rowCount();
if($totale==1){
   header("Location: gestioneRiparazioni.php?errore=1");
   exit();
}
$sql = "INSERT INTO riparazione VALUES ('$codiceMaschera','$codiceSarta',CURDATE(),NULL,'$note')";
$stmt=$conn->prepare($sql);
$stmt->execute();
header("Location: gestioneRiparazioni.php");
exit();
?>