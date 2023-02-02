<?php
include '../conn.php';
$_POST['descrizione'] = trim($_POST['descrizione']);
$sql = "UPDATE maschera set descrizione = '$_POST[descrizione]' , riparazione = '$_POST[riparazione]'".
    ",codSarta = '$_POST[codSarta]' , codDeposito = '$_POST[codDeposito]' , colore = '$_POST[colore]'".
    " where codMaschera like '$_GET[codMaschera]'";
echo $sql;
$conn->query($sql);
header("location: ./modificaMaschera.php?codMaschera=".$_GET['codMaschera']);
?>