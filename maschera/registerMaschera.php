<?php
include "../conn.php";
$colore = $_POST['colore'];
$deposito = $_POST['deposito'];
$sarta = $_POST['sarta'];
$descrizione = $_POST['descrizione'];
$descrizione = trim($descrizione);
$tmp = 0;

$sql = "SELECT codMaschera FROM maschera";
$stmt = $conn->query($sql);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $codMaschera = explode('MS', $row['codMaschera'])[1];
    if ($codMaschera > $tmp) {
        $tmp = $codMaschera;
    }
}
$tmp++;
$codMaschera = 'MS' . $tmp;


$sql = "INSERT INTO maschera values
 ('$codMaschera', '$colore' , '$descrizione' , DEFAULT , '$sarta' , '$deposito');";
$stmt = $conn->prepare($sql);
$stmt->execute();
echo isset($_POST['my_image']);

if (isset($_FILES["image"])) {    
    $image = $_FILES["image"];
    $image_path = "uploads/" . $image["name"];
    echo $image_path;
    if (move_uploaded_file($image["tmp_name"], $image_path)) {
        $conn = new mysqli("host", "username", "password", "database");
        $sql = "INSERT INTO images (path) VALUES ('$image_path')";
        $conn->query($sql);
        $conn->close();
    }
} else {
    //header("Location: aggiungiMaschera.php");
}