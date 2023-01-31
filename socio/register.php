<?php
  include "../controlloRuolo.php";
?>
<?php

include  "conn.php";

$figurante=$_POST['figurante'];

$numeroRicevuta=$_POST['ricevuta'];

    $nome =$_POST['nome'];
    echo $nome;
    echo '<br>';
    $cognome =$_POST['cognome'];
    echo $cognome;
    echo '<br>';
    $cf =$_POST['cf'];
    echo $cf;
    echo '<br>';
    $indirizzo= $_POST['indirizzo'];
    echo $indirizzo;
    echo '<br>';
    $numCiv =$_POST['numCiv'];
    echo $numCiv;
    echo '<br>';
    $citta =$_POST['citta'];
    echo $citta;
    echo '<br>';
    $cap =$_POST['cap'];
    echo $cap;
    echo '<br>';
    $provincia =$_POST['provincia'];
    echo $provincia;
    echo '<br>';
    $email =$_POST['email'];
    echo $email;
    echo '<br>';
    $cell =$_POST['cell'];
    echo $cell;
    echo '<br>';
    $codiceSocio =$_POST['codiceSocio'];
    echo $codiceSocio;
    echo '<br>';
    $numeroTessera =$_POST['nTessera'];
    echo $numeroTessera;
    echo '<br>';
    $nMaschera =$_POST['maschera'];
    echo $nMaschera;
    echo '<br>';
    $dataIscrizione =$_POST['dataIscrizione'];
    echo $dataIscrizione;
    echo '<br>';
    $dataEvento =$_POST['dataEvento'];
    echo $dataEvento;
    echo '<br>';
    $annoPagato =$_POST['annoPagato'];
    echo $annoPagato;
    echo '<br>';
    $staff =$_POST['staff'];
    echo $staff;
    echo '<br>';
    $note =$_POST['note'];
    echo $note;
    echo '<br>';
    $carica=$_POST['carica'];
    echo $carica;
    echo '<br>';
    echo '<br>';
    
  
        $sql = "SELECT codSocio FROM socio
         WHERE codSocio = '$codiceSocio'  LIMIT 1";

        $stmt = $con->prepare($sql);
        $stmt->execute();
        $totale = $stmt->rowCount();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<br>';
            echo $row['codiceSocio'];
            $codiceLimit=$row['codiceSocio'];
           
        }

        if ($totale == 1) {
           
            header("Location: registraSocio.php?errore=1", true, 301);
            exit();
        
      }else {
        $sql = "SELECT Ntessera FROM socio
        WHERE nTessera = '$numeroTessera'  LIMIT 1";

       $stmt = $con->prepare($sql);
       $stmt->execute();
       $totale = $stmt->rowCount();

       if ($totale == 1) {
           
           header("Location: registraSocio.php?errore=2", true, 301);
           exit();
       }else {
    
            $sql = "SELECT cf FROM socio
            WHERE cf = '$cf'  LIMIT 1";
    
           $stmt = $con->prepare($sql);
           $stmt->execute();
           $totale = $stmt->rowCount();
    
           if ($totale == 1) {
               
            header("Location: registraSocio.php?errore=3", true, 301);
            exit();
        
        } else {
            $sql = "SELECT email FROM socio
            WHERE email = '$email'  LIMIT 1";
    
           $stmt = $con->prepare($sql);
           $stmt->execute();
           $totale = $stmt->rowCount();
    
           if ($totale == 1) {
               
            header("Location: registraSocio.php?errore=4", true, 301);
             exit();
          
        }else {
            $sql = "SELECT cell FROM socio
            WHERE cell = '$cell'  LIMIT 1";
    
           $stmt = $con->prepare($sql);
           $stmt->execute();
           $totale = $stmt->rowCount();
    
           if ($totale == 1) {
               
             header("Location: registraSocio.php?errore=5", true, 301);
             exit();
          
        }else {

            if($dataEvento=="nessuna"&&$nMaschera!="nessuna"){
                
                $query = " INSERT INTO socio VALUES('$codiceSocio','$nome','$cognome','$cf','$indirizzo',$numCiv,'$citta','$provincia','$email',
                '$cell',$numeroTessera,'$carica','$nMaschera','$dataIscrizione',NULL,$annoPagato,'$staff','$note','$figurante');
                  
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
   
        $query = " INSERT INTO socio VALUES('$codiceSocio','$nome','$cognome','$cf','$indirizzo',$numCiv,'$citta','$provincia','$email',
           '$cell',$numeroTessera,'$carica','$nMaschera','$dataIscrizione','$dataEvento2',$annoPagato,'$staff','$note','$figurante');
             
           ";
       
        
           if($con->query($query)==true){
              
          //     header("Location: registraSocio.php", true, 301);
            //   exit();
           }else{
              
               echo "errore registrazione $query ".$con->error;
           
           }  

          

           $sql = "INSERT INTO partecipazioneevento(codiceEvento,codiceSocio,dataEvento,mascheraBase)
            VALUES('$dataEvento','$codiceSocio','$dataEvento2','$nMaschera')";
   
          $stmt = $con->prepare($sql);
          $stmt->execute();

     
            }elseif($dataEvento=="nessuna"&&$nMaschera=="nessuna"){
                $query = " INSERT INTO socio VALUES('$codiceSocio','$nome','$cognome','$cf','$indirizzo',$numCiv,'$citta','$provincia','$email',
                '$cell',$numeroTessera,'$carica',NULL,'$dataIscrizione',NULL,$annoPagato,'$staff','$note','$figurante');
                  
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
       
            $query = " INSERT INTO socio VALUES('$codiceSocio','$nome','$cognome','$cf','$indirizzo','$numCiv','$citta','$provincia','$email',
               '$cell','$numeroTessera','$carica',NULL,'$dataIscrizione','$dataEvento2','$annoPagato','$staff','$note','$figurante');
                 
               ";
           
            
               if($con->query($query)==true){
                  
              //     header("Location: registraSocio.php", true, 301);
                //   exit();
               }else{
                  
                   echo "errore registrazione $query ".$con->error;
               
               }  
    
              
    
               $sql = "INSERT INTO partecipazioneevento(codiceEvento,codSocio,dataEvento,mascheraBase)
                VALUES('$dataEvento','$codiceSocio','$dataEvento2',NULL)";
       
              $stmt = $con->prepare($sql);
              $stmt->execute();
    
            }




           
        $sql = "SELECT nTessera FROM tessera
        WHERE nTessera = '$numeroTessera'  LIMIT 1";

       $stmt = $con->prepare($sql);
       $stmt->execute();
       $totale = $stmt->rowCount();

       if ($totale == 1) {
          
        
        date_default_timezone_get();
        $date = date('Y', time());
        echo  $date;
        if($date>$annoPagato){
         $attivita='no';
        }else {
         $attivita='si';
        }

        echo  $attivita;

         $query = "UPDATE tessera SET codiceSocio='$codiceSocio' WHERE  nTessera='$numeroTessera';
          UPDATE tessera SET attivita='$attivita' WHERE  nTessera='$numeroTessera';
       ";
 
         if($con->query($query)==true){

            $sql = "INSERT INTO pagamentotessera VALUES(20,'$codiceSocio','$numeroTessera','$annoPagato','$numeroRicevuta')";
 
            $stmt = $con->prepare($sql);
            $stmt->execute();

             if ($figurante=="si") {
                if($nMaschera="nessuna"){
                    $query = "INSERT INTO figuranti(codiceSocio,mascheraBase,mascheraRecupero) VALUES('$codiceSocio','N/A','N/A');
                    ";
            
                }else{
                      $query = "INSERT INTO figuranti(codiceSocio,mascheraBase,mascheraRecupero) VALUES('$codiceSocio','$nMaschera','N/A');
         ";
 
                }
 
         if($con->query($query)==true){
           
               }else{
             
              echo "errore registrazione $query ".$con->error;
          
          }   
             }
            
          }else{
             
              echo "errore registrazione $query ".$con->error;
          
          } 
          
       }else {
        
        date_default_timezone_get();
        $date = date('Y', time());
        echo  $date;
        if($date>$annoPagato){
         $attivita='no';
        }else {
         $attivita='si';
        }

        echo  $attivita;

         $query = "INSERT INTO tessera VALUES($numeroTessera,'$carica','$codiceSocio','$attivita');
         ";
 
 echo $query;
         if($con->query($query)==true){

            $sql = "INSERT INTO pagamentotessera VALUES(20,'$codiceSocio','$numeroTessera','$annoPagato','$numeroRicevuta')";
 
            $stmt = $con->prepare($sql);
            $stmt->execute();

             if ($figurante=="si") {
                if($nMaschera=="nessuna"){
                    $query = "INSERT INTO figuranti(codSocio,mascheraBase,mascheraRecupero) VALUES('$codiceSocio',NULL,'N/A');
                    ";
            
                }else{
                      $query = "INSERT INTO figuranti(codSocio,mascheraBase,mascheraRecupero) VALUES('$codiceSocio','$nMaschera','N/A');
         ";
 
                }
              
                $stmt = $con->prepare($query);
                $stmt->execute();
           
              
           
             }
            
          }else{
             
              echo "errore registrazione $query ".$con->error;
          
          } 
       }
     
  
   } 
       }
       header("Location: registraSocio.php", true, 301);
       exit();
       }
       }

        
    }
  

      
      
    

        ?>
