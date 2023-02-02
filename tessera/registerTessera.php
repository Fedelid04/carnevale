
<?php
include "../conn.php";
$tipo = $_POST['Tipo'];
echo $tipo;
$tmp = $_POST['numeroTessera'];

$sql = "SELECT codTessera FROM tessera";
$stmt = $conn->query($sql);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $codTessera = explode('TS', $row['codTessera'])[1];
}
$codTessera = 'TS'.$tmp;
$sql = "SELECT * FROM tessera where codTessera='$codTessera'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$totale = $stmt->rowCount();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<br>';
}
if ($totale == 1) {
    header("Location: aggiungiTessera.php?errore=1", true, 301);
    exit();
} else {
    $sql = "INSERT INTO tessera values ('$codTessera','$tipo',DEFAULT)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
header("Location: aggiungiTessera.php");
exit();
?>
