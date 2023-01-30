<?php

include "../conn.php";

$numeroTessera=$_POST['numeroTessera'];
$tipo=$_POST['tipo'];
  
        $sql = "SELECT nTessera FROM tessera
         WHERE nTessera = '$numeroTessera'  LIMIT 1";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $totale = $stmt->rowCount();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<br>';
         
        }

        if ($totale == 1) {
           
            header("Location: aggiungiTessera.php?errore=1", true, 301);
            exit();
        
      }else {
       
            

       
        $query = " INSERT INTO tessera (nTessera,tipo) VALUES('$numeroTessera','$tipo');
           ";
       
        
           if($conn->query($query)==true){
              
             header("Location: aggiungiTessera.php?errore=0", true, 301);
              exit();
           }else{
              
               echo "errore registrazione $query ".$conn->error;
           
           } 
            

   }
   ?>
