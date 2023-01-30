<?php
try {
    $hostname = "localhost";
    $dbname = "carnevale";
    $user = "root";
    $pass = "";
    $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    die();
}
?>