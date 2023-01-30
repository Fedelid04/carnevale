<?php
/*
$codiceEvento= $_GET['codiceEvento'];

if (isset( $_GET['codiceEvento'])) {
   
try {
    include "../conn.php";
    $sql = "    DELETE FROM evento WHERE codiceEvento='$codiceEvento';
   
    ";
    
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    
       header("Location: reportEventi.php", true, 301);
      exit();


} catch (PDOException $e) {
    echo "Errore nella query....<br/>";
    echo $e->getMessage() . "<br/>";
}
}else {*/


$codiceEvento = $_POST['codiceEvento'];
try {
    include "../conn.php";

    $sql = "    DELETE FROM evento WHERE codiceEvento='$codiceEvento';
    
   
    ";
    $sql2 = "DELETE  from partecipazioneevento where codiceEvento='$codiceEvento'";
    $stmt = $conn->prepare($sql2);
    $stmt->execute();

    $stmt = $conn->prepare($sql);
    $stmt->execute();


    header("Location: reportEventi.php", true, 301);
    exit();
} catch (PDOException $e) {
    echo "Errore nella query....<br/>";
    echo $e->getMessage() . "<br/>";
}
