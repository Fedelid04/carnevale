<?php
  include "../controlloRuolo.php";
?>
<?php



$codiceSocio= $_POST['codiceSocio'];

try {
    include "../conn.php";
    $sql = "   DELETE FROM pagamentotessera WHERE codSocio='$codiceSocio';
               DELETE FROM tessera WHERE codSocio='$codiceSocio';
               DELETE FROM figuranti WHERE codSocio='$codiceSocio'; 
               DELETE FROM partecipazioneevento WHERE codSocio='$codiceSocio';
               ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $sql = "SELECT codSocio FROM sociminorenni
    WHERE codSocio = '$codiceSocio'  LIMIT 1";

   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $totale = $stmt->rowCount();

   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       echo '<br>';
       echo $row['codSocio'];
       $codiceLimit=$row['codSocio'];
      
   }

   if ($totale == 1) {
      
    $sql = " DELETE FROM sociminorenni WHERE codSocio='$codiceSocio';
    ";

$stmt = $conn->prepare($sql);
$stmt->execute();
       
 }

 $stmt = $conn->prepare($sql);
 $stmt->execute();

 $sql = "SELECT codSocio FROM manichini
 WHERE codSocio = '$codiceSocio'  LIMIT 1";

$stmt = $conn->prepare($sql);
$stmt->execute();
$totale = $stmt->rowCount();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<br>';
    echo $row['codSocio'];
    $codiceLimit=$row['codSocio'];
   
}

if ($totale == 1) {
   
 $sql = " DELETE FROM manichini WHERE codSocio='$codiceSocio';
 ";

$stmt = $conn->prepare($sql);
$stmt->execute();
    
}

    
    $sql = " DELETE FROM socio WHERE codSocio='$codiceSocio';
               ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

   
          header("Location: SocioElimina.php", true, 301);
           exit();

  

} catch (PDOException $e) {
    echo "Errore nella query....<br/>";
    echo $e->getMessage() . "<br/>";
}