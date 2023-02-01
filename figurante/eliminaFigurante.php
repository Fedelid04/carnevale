<?php

$codiceSocio = $_POST['codiceSocio'];

try {
    include "../conn.php";

    $sql = "   DELETE FROM figurante WHERE codSocio='$codiceSocio';
    
               UPDATE socio SET figurante='no' WHERE codSocio='$codiceSocio'; 
               ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    header("Location: ../home.php", true, 301);
    exit();
} catch (PDOException $e) {
    echo "Errore nella query....<br/>";
    echo $e->getMessage() . "<br/>";
}
