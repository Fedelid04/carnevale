<?php
  include "../controlloRuolo.php";
?>
<?php

include  "conn.php";

$codiceSarta=$_POST['codiceSarta'];

$codiceMaschera=$_POST['codiceMaschera'];

$dataInizio=$_POST['dataI'];

echo $dataInizio;
$dataFine=$_POST['dataF'];

echo '....'.$dataFine.'....';
echo '<br>';
$note=$_POST['note'];

echo $note;


$sql = "SELECT codiceMaschera FROM riparazione
WHERE codiceMaschera = '$codiceMaschera' AND dataFineRiparazione=NULL LIMIT 1";

$stmt = $con->prepare($sql);
$stmt->execute();
$totale = $stmt->rowCount();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
   echo '<br>';
   echo $row['codiceMaschera'];
   $codiceLimit=$row['codiceMaschera'];
  
}

if ($totale == 1) {
  
   header("Location: gestioneRiparazioni.php?errore=1", true, 301);
   exit();

}else {

     if ($dataFine=="") {
         $query = " INSERT INTO riparazione VALUES('$codiceMaschera','$codiceSarta','$dataInizio',NULL,'$note');
               UPDATE maschera SET riparazione='si' WHERE  nMaschera='$codiceMaschera';
       ";
     }else {
        $query = " INSERT INTO riparazione VALUES('$codiceMaschera','$codiceSarta','$dataInizio','$dataFine','$note');
        UPDATE maschera SET riparazione='si' WHERE  nMaschera='$codiceMaschera';
";
     }

       
  
   
    
       if($con->query($query)==true){
          
            header("Location: gestioneRiparazioni.php", true, 301);
            exit();
       }else{
          
           echo "errore registrazione $query ".$con->$error;
       
       } 
} 