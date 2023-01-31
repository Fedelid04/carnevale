<?php
  include "../controlloRuolo.php";
?>
<?php

$nTessera = $_GET['nTessera'];

if (isset($_GET['nTessera'])) {

    try {
        include "../conn.php";

        $sql = "   UPDATE socio SET nTessera='NULL' WHERE nTessera='$nTessera';
    
               DELETE FROM tessera WHERE nTessera='$nTessera';
               ";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        header("Location: reportTessera.php", true, 301);
        exit();
    } catch (PDOException $e) {
        echo "Errore nella query....<br/>";
        echo $e->getMessage() . "<br/>";
    }
} else {


    $nTessera = $_POST['numeroTessera'];


    try {
        include  "../conn.php";

        $sql = "   UPDATE socio SET nTessera='NULL' WHERE nTessera='$nTessera';
        
                   DELETE FROM tessera WHERE nTessera='$nTessera';
                   ";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        header("Location: TesseraElimina.php", true, 301);
        exit();
    } catch (PDOException $e) {
        echo "Errore nella query....<br/>";
        echo $e->getMessage() . "<br/>";
    }
}
