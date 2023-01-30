<?php

$codiceCarica= $_GET['codiceCarica'];
$carica=$_GET['carica'];
if (isset($codiceCarica) && isset($carica)) {
   
try {
    include "../conn.php";
    $sql = "   UPDATE socio SET carica=NULL WHERE carica='$carica';
    
               DELETE FROM cariche WHERE codiceCarica='$codiceCarica';
               ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

     header("Location: reportCariche.php", true, 301);
    exit();

} catch (PDOException $e) {
    echo "Errore nella query....<br/>";
    echo $e->getMessage() . "<br/>";
}
} else {
    
$codiceCarica= $_POST['codiceCarica'];

try {
    $hostname = "localhost";
    $dbname = "carnevale";
    $user = "root";
    $pass = "";
    $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);

    $sql = "   SELECT * FROM cariche WHERE codiceCarica='$codiceCarica';
               ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $carica2=$row['carica'];
    }

    //  header("Location: reportCariche.php", true, 301);
    // exit();

} catch (PDOException $e) {
    echo "Errore nella query....<br/>";
    echo $e->getMessage() . "<br/>";
}


try {
    $hostname = "localhost";
    $dbname = "carnevale";
    $user = "root";
    $pass = "";
    $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);

    $sql = "   UPDATE socio SET carica=NULL WHERE carica='$carica2';
            ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    //   header("Location: CaricaElimina.php", true, 301);
    //   exit();

} catch (PDOException $e) {
    echo "Errore nella query....<br/>";
    echo $e->getMessage() . "<br/>";
}

try {
    $hostname = "localhost";
    $dbname = "carnevale";
    $user = "root";
    $pass = "";
    $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);

    $sql = "      DELETE FROM cariche WHERE codiceCarica='$codiceCarica';
               ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    header("Location: CaricaElimina.php", true, 301);
     exit();

} catch (PDOException $e) {
    echo "Errore nella query....<br/>";
    echo $e->getMessage() . "<br/>";
}

}

