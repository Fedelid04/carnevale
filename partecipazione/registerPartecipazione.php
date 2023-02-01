
<?php

include  "../conn.php";

$codiceEvento=$_POST['codiceEvento'];
$codiceSocio=$_POST['codSocio'];
$mascheraBase=$_POST['mascheraBase'];
$data=$_POST['dataEvento'];

        $sql = "SELECT codiceEvento,codSocio FROM partecipazioneevento
         WHERE codiceEvento = '$codiceEvento' AND codSocio='$codiceSocio' ";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $totale = $stmt->rowCount();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<br>';
         
        }

        if ($totale != 0) {
           
            header("Location: aggiungiPartecipazione.php?errore=1", true, 301);
            exit();
        
      }else{

            
        $query = "  SELECT mascheraBase,mascheraRecupero FROM figuranti WHERE codSocio='$codiceSocio';
          ";
      
       
      $stmt = $conn->prepare($query);
      $stmt->execute();
    
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  
        $numeroR=$row['mascheraRecupero'];
    }
       

       
        $query = " INSERT INTO partecipazioneevento
         VALUES('$codiceEvento','$codiceSocio','$data','$mascheraBase','$numeroR');
           ";
       
        
           if($conn->query($query)==true){
              
             header("Location: aggiungiPartecipazione.php", true, 301);
              exit();
           }else{
              
               echo "errore registrazione $query ".$con->error;
           
           } 
            

   } 
       

  

      
      
    

        ?>

  


        
        
