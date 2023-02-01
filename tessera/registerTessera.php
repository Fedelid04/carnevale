
<?php

include "../conn.php";
$sql = "SELECT * FROM tessera order by codTessera desc limit 1";
$stmt=$conn->query($sql);
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    $row['codTessera']=explode("S",$row['codTessera']);
    $row['codTessera']++;
    $codTessera=$row['codTessera'];
}

$sql = "INSERT INTO tessera values ('$codTessera','$tipo'
         WHERE nTessera = '$numeroTessera'  LIMIT 1";

$stmt = $conn->prepare($sql);
$stmt->execute();
$totale = $stmt->rowCount();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<br>';
}

if ($totale == 1) {

    header("Location: aggiungiTessera.php?errore=1", true, 301);
    exit();
} else {




    $query = " INSERT INTO tessera (nTessera,tipo) VALUES('$numeroTessera','$tipo');
           ";


    if ($conn->query($query) == true) {

        header("Location: aggiungiTessera.php?errore=0", true, 301);
        exit();
    } else {

        echo "errore registrazione $query " . $conn->error;
    }
}
?>
