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
$tipo = $_POST['tipo'];
$sql = "UPDATE tessera set attiva='no' where codTessera='$_SESSION[tessera]' and codSocio like '$_SESSION[usr]'";
$stmt = $conn->query($sql);
$sql = "INSERT INTO tessera values ('$codTessera','$tipo',DEFAULT,'$_SESSION[usr]',CURDATE())";
$stmt = $conn->query($sql);
header("Location: ../login/logout.php");
exit();
?>