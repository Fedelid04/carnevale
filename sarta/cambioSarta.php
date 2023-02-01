
<?php

include '../conn.php';

$codiceSarta=$_GET['codiceSarta'];
$costo=$_POST['costo'];
$nome=$_POST['nome'];

    try {
       

        if (isset($costo)&& !(empty($costo))) {

            $sql = "UPDATE sarta SET costoOra='$costo' WHERE  codiceSarta='$codiceSarta' ";
            $stmt = $con->prepare($sql);
            $stmt->execute();

       } 

       if (isset($nome)&& !(empty($nome))) {

        $sql = "UPDATE sarta SET nomeSarta='$nome' WHERE  codiceSarta='$codiceSarta' ";
        $stmt = $con->prepare($sql);
        $stmt->execute();

   } 

   
      
       header("Location: modificaSarta.php?codiceSarta=".$codiceSarta."");
       exit(); 

    } catch (PDOException $e) {
        echo "Errore nella query....<br/>";
        echo $e->getMessage() . "<br/>";
        die();
    } finally {
        $conn = null;
    }




                ?>
