<?php

$codiceSarta= $_POST['codiceSarta'];
echo $codiceSarta;

try {
    include "../conn.php";

    $sql = "    DELETE FROM sarta WHERE codiceSarta='$codiceSarta';
   
    ";
    
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    
        $sql = "    SELECT * FROM riparazione WHERE codiceSarta='$codiceSarta';
   
        ";

 $stmt = $conn->prepare($sql);
$stmt->execute();

$totale= $stmt->rowCount();
  
if ($totale!=0) {
 
    $sql = " UPDATE maschera SET codiceSarta=NULL WHERE  codiceSarta='$codiceSarta';";


$stmt = $conn->prepare($sql);
$stmt->execute();

}
        header("Location: SartaElimina.php", true, 301);
         exit();


} catch (PDOException $e) {
    echo "Errore nella query....<br/>";
    echo $e->getMessage() . "<br/>";
}