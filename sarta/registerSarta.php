<?php

include  "../conn.php";

$codiceSarta=$_POST['codiceSarta'];
$costo=$_POST['costo'];
$nome=$_POST['nome'];

        $sql = "SELECT codiceSarta FROM sarta
         WHERE codiceSarta = '$codiceSarta' LIMIT 1 ";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $totale = $stmt->rowCount();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<br>';
         
        }

        if ($totale != 0) {
           
            header("Location: aggiungiSarta.php?errore=1", true, 301);
            exit();
        
      }else{

            
        
        $query = " INSERT INTO sarta
         VALUES('$codiceSarta','$nome','$costo');
           ";
       
        
           if($conn->query($query)==true){
              
             header("Location: aggiungiSarta.php", true, 301);
              exit();
           }else{
              
               echo "errore registrazione $query ".$conn->error;
           
           } 
            

   }
