<?php
  include "../controlloRuolo.php";
?>
<?php

include "../conn.php";

$codiceSocio=$_POST['codiceSocio'];
$recupero=$_POST['recupero'];
$uscita=$_POST['uscita'];
$uscitaEsterna=$_POST['uscitaEsterna'];
  
        $sql = "SELECT codiceSocio FROM figuranti
         WHERE codiceSocio = '$codiceSocio'  LIMIT 1";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $totale = $stmt->rowCount();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<br>';
            echo $row['codiceSocio'];
            $codiceLimit=$row['codiceSocio'];
           
        }

        if ($totale == 1) {
           
            header("Location: gestioneFiguranti.php?errore=1", true, 301);
            exit();
        
      }else {
        $sql = "SELECT mascheraRecupero FROM figuranti
        WHERE mascheraRecupero = '$recupero'  LIMIT 1";

       $stmt = $conn->prepare($sql);
       $stmt->execute();
       $totale = $stmt->rowCount();

       if ($totale == 1) {
           
           header("Location: gestioneFiguranti.php?errore=2", true, 301);
           exit();
       }else {

            
       

       
        $query = " INSERT INTO figuranti (codiceSocio,uscita,mascheraRecupero,uscitaEsterna) VALUES('$codiceSocio','$uscita','$recupero','$uscitaEsterna');
           ";
       
        
           if($conn->query($query)==true){
              
          //     header("Location: registraSocio.php", true, 301);
            //   exit();
           }else{
              
               echo "errore registrazione $query ".$conn->error;
           
           } 
            


           echo $codiceSocio;

            $query = "SELECT * FROM socio WHERE codiceSocio='$codiceSocio';
           
            ";

            
        $stmt = $conn->prepare($query);
        $stmt->execute();
     
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo $row['nMaschera'];
            $nMaschera=$row['nMaschera'];
           
        }
    
            if($conn->query($query)==true){
              
            
             }else{
                
                 echo "errore registrazione $query ".$conn->error;
             
             }
             
             
             
       
        $query = " UPDATE figuranti SET mascheraBase='$nMaschera' WHERE  codiceSocio='$codiceSocio';

                   UPDATE socio SET figurante='si' WHERE  codiceSocio='$codiceSocio';

        ";
    
     
        if($conn->query($query)==true){
           
              header("Location: gestioneFiguranti.php", true, 301);
              exit();
        }else{
           
            echo "errore registrazione $query ".$conn->error;
        
        } 
   } 
       }
