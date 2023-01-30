<?php

include "../conn.php";

$codiceSarta=$_POST['codiceSarta'];

$codiceMaschera=$_POST['codiceMaschera'];

$dataInizio=$_POST['dataI'];

echo $dataInizio;
$dataFine=$_POST['dataF'];
echo $dataFine;
echo '<br>';
$note=$_POST['note'];

echo $note;
$codV=$_GET['codiceV'];
echo $codV;
$codS=$_GET['sartaV'];
echo $codS;
$noteV=$_GET['noteV'];
echo $noteV;
$dataIV=$_GET['dataIV'];
echo $dataIV;
$dataFV=$_GET['dataFV'];
echo '....'.$dataFV.'....';
    try {
       
       
        
       
        $sql = "SELECT * FROM riparazione WHERE codiceMaschera='$codV'";
            $stmt = $con->prepare($sql);
            $stmt->execute();
          
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
             
          }

        if (isset($codiceMaschera)&& !(empty($codiceMaschera))) {

            $sql = "UPDATE riparazione SET codiceMachera='$codiceMaschera' WHERE  codiceMaschera='$codV' ";
            $stmt = $con->prepare($sql);
            $stmt->execute();

       } 

       if (isset($codiceSarta)&& !(empty($codiceSarta))) {

        $sql = "UPDATE riparazione SET codiceSarta='$codiceSarta' WHERE  codiceSarta='$codS' ";
        $stmt = $con->prepare($sql);
        $stmt->execute();

   } 

   
   if (isset($dataFine)&& !(empty($dataFine))) {
if($dataFV==' '){
    

    if (isset($codiceMaschera)&& !(empty($codiceMaschera))) {
$sql = "UPDATE riparazione SET dataFineRiparazione='$dataFine' WHERE   nMaschera='$codiceMaschera'; 
     ";
    $stmt = $con->prepare($sql);
    $stmt->execute();

        $sql = "UPDATE maschera SET riparazione='no' WHERE  nMaschera='$codiceMaschera' ";
        $stmt = $con->prepare($sql);
        $stmt->execute();

   }else{
    
$sql = "UPDATE riparazione SET dataFineRiparazione='$dataFine' WHERE   nMaschera='$codV'; 
";
$stmt = $con->prepare($sql);
$stmt->execute();
    
    $sql = "UPDATE maschera SET riparazione='no' WHERE  nMaschera='$codV' ";
    $stmt = $con->prepare($sql);
    $stmt->execute();
   } 

}else{
       $sql = "UPDATE riparazione SET dataFineRiparazione='$dataFine' WHERE  dataFineRiparazione='$dataFV' ";
    $stmt = $con->prepare($sql);
    $stmt->execute();
}
 

} 

if (isset($dataInizio)&& !(empty($dataInizio))) {

    $sql = "UPDATE riparazione SET dataInizioRiparazione='$dataInizio' WHERE  dataInizioRiparazione='$dataIV' ";
    $stmt = $con->prepare($sql);
    $stmt->execute();

} 

if (isset($note)&& !(empty($note))) {

    $sql = "UPDATE riparazione SET note='$note' WHERE  note='$noteV' ";
    $stmt = $con->prepare($sql);
    $stmt->execute();

} 



 
     
       header("Location: gestioneRiparazioni.php");
       exit(); 

    } catch (PDOException $e) {
        echo "Errore nella query....<br/>";
        echo $e->getMessage() . "<br/>";
        die();
    } finally {
        $conn = null;
    }


    

                ?>
