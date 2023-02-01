<?php
$codiceSocio = $_POST['codiceSocio'];
try {
    include "../conn.php";
    $sql = "   DELETE FROM socio_tessera WHERE codSocio='$codiceSocio';
               DELETE FROM socio_evento WHERE codSocio='$codiceSocio';
               DELETE FROM figurante WHERE codSocio='$codiceSocio'; 
               DELETE FROM socio WHERE codSocio='$codiceSocio';
               ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("Location: SocioElimina.php", true, 301);
    exit();
} catch (PDOException $e) {
    echo "Errore nella query....<br/>";
    echo $e->getMessage() . "<br/>";
}
