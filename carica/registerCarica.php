<?php

include "../conn.php";
$carica=$_POST['carica'];
$codiceCarica=$_POST['codiceCarica'];
  
        $sql = "SELECT carica FROM cariche
         WHERE carica = '$carica'  LIMIT 1";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $totale = $stmt->rowCount();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<br>';
         
        }

        if ($totale == 1) {
           
            header("Location: aggiungiCarica.php?errore=1", true, 301);
            exit();
        
      }else {
        $sql = "SELECT codiceCarica FROM cariche
        WHERE codiceCarica = '$codiceCarica'  LIMIT 1";

       $stmt = $conn->prepare($sql);
       $stmt->execute();
       $totale = $stmt->rowCount();

       if ($totale == 1) {
           
           header("Location: aggiungiCarica.php?errore=2", true, 301);
           exit();
       }else {

            
       

       
        $query = " INSERT INTO cariche VALUES('$codiceCarica','$carica');
           ";
       
        
           if($conn->query($query)==true){
              
             header("Location: aggiungiCarica.php", true, 301);
              exit();
           }else{
              
               echo "errore registrazione $query ".$conn->error;
           
           } 
            

   } 
       }

  

      
      
    

        ?>

  


        
        
