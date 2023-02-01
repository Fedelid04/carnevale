
<?php

$codiceMaschera= $_POST['codiceMaschera'];

try {
    include "../conn.php";
    $sql = "   DELETE FROM riparazione WHERE codiceMaschera='$codiceMaschera';
    
              UPDATE maschera SET riparazione='no' WHERE  nMaschera='$codiceMaschera'; 
               ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

  
        header("Location: gestioneRiparazioni.php", true, 301);
          exit();


} catch (PDOException $e) {
    echo "Errore nella query....<br/>";
    echo $e->getMessage() . "<br/>";
}