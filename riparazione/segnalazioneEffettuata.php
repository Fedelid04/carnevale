<?php
include '../conn.php';
    $maschera=$_POST['nMaschera'];
$sql="UPDATE maschera set riparazione='si' where nMaschera='$maschera'";
$stmt=$conn->query($sql);
header('Location: segnalazione.php');
exit;
