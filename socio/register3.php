<?php

include "../conn.php";

$figurante="si";


$numeroTessera =$_POST['nTessera'];

$note =$_POST['note'];
echo $note;
    $codiceSocio =$_POST['codiceSocio'];
    echo $codiceSocio;
    echo '<br>';
    $nMaschera =$_POST['maschera'];
    echo $nMaschera;
    echo '<br>';
    $dataIscrizione =$_POST['dataIscrizione'];
    echo $dataIscrizione;
    echo '<br>';
    $dataEvento =$_POST['dataEvento'];
    echo $dataEvento;
    
  
        $sql = "SELECT codSocio FROM socio
         WHERE codSocio = '$codiceSocio'  LIMIT 1";

        $stmt = $con->prepare($sql);
        $stmt->execute();
        $totale = $stmt->rowCount();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<br>';
            echo $row['codSocio'];
            $codiceLimit=$row['codSocio'];
           
        }

        if ($totale == 1) {
           
            header("Location: registraSocio3.php?errore=1", true, 301);
            exit();
        
      }else {
        $sql = "SELECT nTessera FROM socio
        WHERE nTessera = '$numeroTessera'  LIMIT 1";

       $stmt = $con->prepare($sql);
       $stmt->execute();
       $totale = $stmt->rowCount();

       if ($totale == 1) {
           
           header("Location: registraSocio3.php?errore=2", true, 301);
           exit();
       }else {

            if($dataEvento=="nessuna"&&$nMaschera!="nessuna"){
                
               
        $query = " INSERT INTO socio VALUES('$codiceSocio',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,
        NULL,'$numeroTessera',NULL,'$nMaschera','$dataIscrizione',NULL,NULL,NULL,'$note','$figurante');
          
        ";
                     $stmt = $con->prepare($query);
                     $stmt->execute();

                              
        $query = " INSERT INTO manichini VALUES('$codiceSocio','$nMaschera','$dataIscrizione',NULL,'$note');
          
        ";
                     $stmt = $con->prepare($query);
                     $stmt->execute();
                
            }elseif($dataEvento!="nessuna"&&$nMaschera!="nessuna"){
                
            $sql = "SELECT * FROM evento WHERE codiceEvento='$dataEvento'";
   
            $stmt = $con->prepare($sql);
            $stmt->execute();
       
 
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
     $dataEvento2=$row['dataEvento'];
 }
   
        $query = " INSERT INTO socio VALUES('$codiceSocio',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,
           NULL,'$numeroTessera',NULL,'$nMaschera','$dataIscrizione','$dataEvento2',NULL,NULL,'$note','$figurante');
             
           ";
       
        
           if($con->query($query)==true){
              
                                    
        $query = " INSERT INTO manichini VALUES('$codiceSocio','$nMaschera','$dataIscrizione','$dataEvento2','$note');
          
        ";
                     $stmt = $con->prepare($query);
                     $stmt->execute();
                
          //     header("Location: registraSocio.php", true, 301);
            //   exit();
           }else{
              
               echo "errore registrazione $query ".$con->error;
           
           }  

          

           $sql = "INSERT INTO partecipazioneevento(codiceEvento,codSocio,dataEvento,mascheraBase)
            VALUES('$dataEvento','$codiceSocio','$dataEvento2','$nMaschera')";
   
          $stmt = $con->prepare($sql);
          $stmt->execute();

     
            }elseif($dataEvento=="nessuna"&&$nMaschera=="nessuna"){
               
        $query = " INSERT INTO socio VALUES('$codiceSocio',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,
        NULL,'$numeroTessera',NULL,NULL,'$dataIscrizione',NULL,NULL,NULL,NULL,'$figurante');
          
        ";

                     $stmt = $con->prepare($query);
                     $stmt->execute();
                
                        
                     $query = " INSERT INTO manichini VALUES('$codiceSocio',NULL,'$dataIscrizione',NULL,'$note');
          
                     ";
                                  $stmt = $con->prepare($query);
                                  $stmt->execute();
                             
            }elseif ($dataEvento!="nessuna"&&$nMaschera=="nessuna") {
                $sql = "SELECT * FROM evento WHERE codiceEvento='$dataEvento'";
   
                $stmt = $con->prepare($sql);
                $stmt->execute();
           
     
     while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
         $dataEvento2=$row['dataEvento'];
     }
       
           
        $query = " INSERT INTO socio VALUES('$codiceSocio',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,
        NULL,'$numeroTessera',NULL,NULL,'$dataIscrizione','$dataEvento2',NULL,NULL,NULL,'$figurante');
          
        ";
           
            
               if($con->query($query)==true){
                                          
        $query = " INSERT INTO manichini VALUES('$codiceSocio',NULL,'$dataIscrizione','$dataEvento2','$note');
          
        ";
                     $stmt = $con->prepare($query);
                     $stmt->execute();
                
              //     header("Location: registraSocio.php", true, 301);
                //   exit();

               }else{
                  
                   echo "errore registrazione $query ".$con->error;
               
               }  
               
               if($nMaschera=="nessuna"){
                $query = "INSERT INTO figuranti(codSocio,mascheraBase,mascheraRecupero) VALUES('$codiceSocio',NULL,'N/A');
                ";
        
            }else{
                  $query = "INSERT INTO figuranti(codSocio,mascheraBase,mascheraRecupero) VALUES('$codiceSocio','$nMaschera','N/A');
     ";

            }
    
            $stmt = $con->prepare($query);
            $stmt->execute();
              
    
               $sql = "INSERT INTO partecipazioneevento(codiceEvento,codSocio,dataEvento,mascheraBase)
                VALUES('$dataEvento','$codiceSocio','$dataEvento2',NULL)";
       
    
            }




 
           
 
         if($con->query($sql)==true){

            

           
        $sql = "SELECT nTessera FROM tessera
        WHERE nTessera = '$numeroTessera'  LIMIT 1";

       $stmt = $con->prepare($sql);
       $stmt->execute();
       $totale = $stmt->rowCount();

       if ($totale == 1) {
          
       

        echo  $attivita;

         $query = "UPDATE tessera SET codSocio='$codiceSocio' WHERE  nTessera='$numeroTessera';
          UPDATE tessera SET attivita='NULL' WHERE  nTessera='$numeroTessera';
       ";
 
         if($con->query($query)==true){

            
          }else{
             
              echo "errore registrazione $query ".$con->error;
          
          } 
          
       }else {
        

         $query = "INSERT INTO tessera VALUES($numeroTessera,'manichino','$codiceSocio',NULL);
         ";
 
 echo $query;
         if($con->query($query)==true){

          
         
            
          }else{
             
              echo "errore registrazione $query ".$con->error;
          
          } 
           
              
             }
            
        
     
              
             
           
              
           
             }
       }
            }
        
      
       header("Location: registraSocio3.php", true, 301);
       exit();
