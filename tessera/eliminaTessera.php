
<?php
$nTessera = $_POST['numeroTessera'];
try {
    include "../conn.php";
    $sql = "UPDATE tessera SET attiva='no' WHERE codTessera='$nTessera'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("Location: reportTessera.php", true, 301);
    exit();
} catch (PDOException $e) {
    echo "Errore nella query....<br/>";
    echo $e->getMessage() . "<br/>";
}