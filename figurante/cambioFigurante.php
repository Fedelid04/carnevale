<?php

include "../conn.php";

$codiceSocioVecchio=$_GET['codSocio'];
$uscita=$_POST['uscita'];
$uscitaEsterna=$_POST['uscitaEsterna'];
$recupero=$_POST['maschera'];
echo $recupero;

$sql = "SELECT mascheraRiserva FROM figurante
WHERE mascheraRiserva = '$recupero'  LIMIT 1";

$stmt = $conn->prepare($sql);
$stmt->execute();
$totale = $stmt->rowCount();

if ($totale == 1) {
  
  header("Location: modificaFigurante.php?errore=2&&codiceSocio=".$codiceSocioVecchio."&&uscita=".$uscita."", true, 301);
  exit();
}else{
    try {
       
       
        $codiceSocioVecchio=$_GET['codSocio'];
       
        $sql = "SELECT * FROM figurante WHERE codSocio='$codiceSocioVecchio'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
          
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $codiceSocioVecchio=$row['codSocio'];
          }

        if (isset($uscita)&& !(empty($uscita))) {

            $sql = "UPDATE figurante SET uscita='$uscita' WHERE codSocio='$codiceSocioVecchio' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

       } 

       if (isset($recupero)&& !(empty($recupero))) {

        
        $sql = "UPDATE figurante SET mascheraRiserva='$recupero' WHERE codSocio='$codiceSocioVecchio' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

   } 

   
   if (isset($uscitaEsterna)&& !(empty($uscitaEsterna))) {

    $sql = "UPDATE figurante SET uscitaEsterna='$uscitaEsterna' WHERE  codSocio='$codiceSocioVecchio' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

} 

 
      
       header("Location: modificaFigurante.php?codSocio=".$codiceSocioVecchio."&&uscita=".$uscita."");
       exit(); 

    } catch (PDOException $e) {
        echo "Errore nella query....<br/>";
        echo $e->getMessage() . "<br/>";
        die();
    } finally {
        $conn = null;
    }



}



    


    

                ?>
