<?php

$codSarta = $_POST['codSarta'];

try {
    include "../conn.php";

    $sql = "UPDATE sarta SET eliminato =  'si' WHERE codSarta='$codSarta';";

    $stmt = $conn->prepare($sql);
    $stmt->execute();


    header("Location: SartaElimina.php");

} catch (PDOException $e) {
    echo "Errore nella query....<br/>";
    echo $e->getMessage() . "<br/>";
}