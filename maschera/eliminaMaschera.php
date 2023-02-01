<?php
include '../conn.php';
$sql = "UPDATE maschera SET eliminato = 'si' where codMaschera LIKE '$_POST[codMaschera]'";
$conn->query($sql);
header("location:../MascheraElimina.php");
?>