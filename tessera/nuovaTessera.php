<?php
session_start();
?>
<?php
include '../conn.php';
$codTessera = $_POST['codTessera'];
$sql = "SELECT * FROM tessera where codTessera='$codTessera'";
$stmt = $conn->query($sql);
$totale = $stmt->rowCount();
if ($totale == 1) {
    header("Location: segnalazioneTessera.php?errore=1");
    exit();
}
$tipo = $row['idTipo'];
$sql = "UPDATE tessera set attiva='no' where codTessera='$_SESSION[tessera]' and codSocio='$_SESSION[usr]'";
$stmt = $conn->query($sql);
$_SESSION['tessera'] = $codTessera;
$sql = "INSERT INTO tessera values ('$codTessera','$tipo',DEFAULT,'$_SESSION[usr]',CURDATE())";
$stmt = $conn->query($sql);
header("Location: ../home.php");
exit();
?>