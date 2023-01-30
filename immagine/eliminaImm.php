<?php

$nMaschera = $_POST['nMaschera'];

try {
    include "../conn.php";

    $sql = "   DELETE FROM galleria WHERE nMaschera='$nMaschera';  ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    header("Location: eliminaImmagine.php", true, 301);
    exit();
} catch (PDOException $e) {
    echo "Errore nella query....<br/>";
    echo $e->getMessage() . "<br/>";
}
