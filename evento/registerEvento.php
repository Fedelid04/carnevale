
<?php

include "../conn.php";

$codiceEvento=$_POST['codiceEvento'];
$provincia=$_POST['provincia'];
$citta=$_POST['citta'];
$comune=$_POST['comune'];
$incasso=$_POST['incasso'];
$data=$_POST['data'];
$descrizione=$_POST['note'];
  
        $sql = "SELECT codiceEvento FROM evento
         WHERE codiceEvento = '$codiceEvento'  LIMIT 1";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $totale = $stmt->rowCount();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<br>';
         
        }

        if ($totale == 1) {
           
            header("Location: aggiungiEvento.php?errore=1", true, 301);
            exit();
        
      }else{

            
       

       
        $query = " INSERT INTO evento
         VALUES('$codiceEvento','$descrizione','$data','$provincia','$citta','$comune',$incasso);
           ";
       
        
           if($conn->query($query)==true){
              
             header("Location: aggiungiEvento.php", true, 301);
              exit();
           }else{
              
               echo "errore registrazione $query ".$conn->error;
           
           } 
            

   }
