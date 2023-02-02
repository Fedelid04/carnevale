<?php
$codiceSocio = $_POST['codiceSocio'];
try {
    include "../conn.php";
    $sql = "UPDATE socio set eliminato='si' where codSocio='$codiceSocio'";
    $stmt = $conn->query($sql);
    header("Location: SocioElimina.php", true, 301);
    exit();
} catch (PDOException $e) {
    echo "Errore nella query....<br/>";
    echo $e->getMessage() . "<br/>";
}
