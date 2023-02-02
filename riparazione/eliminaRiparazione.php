
<?php

$codiceMaschera = $_POST['codMaschera'];

try {
    include "../conn.php";
    $sql = " UPDATE maschera SET riparazione='no' WHERE codMaschera='$codiceMaschera';";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sql = "UPDATE riparazione set fineRiparazione=CURDATE() WHERE codMaschera='$codiceMaschera'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("Location: gestioneRiparazioni.php", true, 301);
    exit();
} catch (PDOException $e) {
    echo "Errore nella query....<br/>";
    echo $e->getMessage() . "<br/>";
}
