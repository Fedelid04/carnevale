<?php
include '../conn.php';
$codMaschera=$_POST['codMaschera'];
$sql = "UPDATE maschera set riparazione='si' where codMaschera='$codMaschera'";
$stmt = $conn->query($sql);
header("Location: segnalazione.php");
exit();
?>