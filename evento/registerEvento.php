<?php
include '../conn.php';
$sql = "SELECT codEvento FROM evento";
$stmt = $conn->query($sql);
$stmt->execute();
$tmp = 0;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $codEvento = explode('E', $row['codEvento'])[1];
  if ($codEvento > $tmp) {
    $tmp = $codEvento;
  }
}
$tmp++;
$codEvento = 'E' . $tmp;
echo "c".$_POST['requisito']."iao";
if($_POST['requisito'] === ''){  
  $sql = "INSERT INTO evento values ('$codEvento' , '$_POST[descrizione]' , $_POST[importo] ,
 null , '$_POST[via]' , '$_POST[citta]' ,'$_POST[provincia]', '$_POST[data]' , '$_POST[esterna]')";
} else {
  $sql = "INSERT INTO evento values ('$codEvento' , '$_POST[descrizione]' , $_POST[importo] ,
 '$_POST[requisito]' , '$_POST[via]' , '$_POST[citta]' ,'$_POST[provincia]', '$_POST[data]' , '$_POST[esterna]')";
}

$conn->query($sql);
header('Location: ./aggiungiEvento');
?>