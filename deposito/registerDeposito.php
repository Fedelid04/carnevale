
<?php

include "../conn.php";

$costo=$_POST['costo'];
$codiceDeposito=$_POST['codiceDeposito'];
$descrizione=$_POST['descrizione'];
$citta=$_POST['citta'];
$dataIniziale=$_POST['dataIniziale'];
$dataFinale=$_POST['dataFinale'];

echo $dataFinale;

echo $dataIniziale;
try {
    $sql = "SELECT deposito FROM deposito
         WHERE deposito = '$codiceDeposito'  LIMIT 1";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
    return $e;
}
        $totale = $stmt->rowCount();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<br>';
         
        }

        if ($totale == 1) {
           
            header("Location: aggiungiDeposito1.php?errore=1", true, 301);
            exit();
        
      }else {

        if ($dataFinale=="") {
               $query = " INSERT INTO deposito VALUES('$codiceDeposito','$descrizione','$citta','$costo','$dataIniziale',NULL);
           ";
        }else {
            $query = " INSERT INTO deposito VALUES('$codiceDeposito','$descrizione','$citta','$costo','$dataIniziale','$dataFinale');
            ";
        }
       
       
        
           if($conn->query($query)==true){
              
             header("Location: aggiungiDeposito1.php", true, 301);
              exit();
           }else{
              
               echo "errore registrazione $query ".$conn->error;
           
           } 
            

   } 
    

  

      
      
    

        ?>

  


        
        
