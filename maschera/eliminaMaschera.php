<?php

$nMaschera = $_GET['nMaschera'];


if (isset($_GET['nMaschera'])) {


    try {
        include  "../conn.php";

        $sql = "     DELETE FROM galleria WHERE nMaschera='$nMaschera';

    DELETE FROM riparazione WHERE codiceMaschera='$nMaschera';

    UPDATE partecipazioneevento SET mascheraBase=NULL WHERE  mascheraBase='$nMaschera';
  
  UPDATE partecipazioneevento SET mascheraRecupero=NULL WHERE  mascheraRecupero='$nMaschera';

   
  UPDATE figuranti SET mascheraBase=NULL WHERE  mascheraBase='$nMaschera';
  
  UPDATE figuranti SET mascheraRecupero=NULL WHERE  mascheraRecupero='$nMaschera';

  UPDATE socio SET nMaschera=NULL WHERE  nMaschera='$nMaschera';

DELETE FROM maschera WHERE nMaschera='$nMaschera';
    ";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        header("Location: reportMaschere.php", true, 301);
        exit();
    } catch (PDOException $e) {
        echo "Errore nella query....<br/>";
        echo $e->getMessage() . "<br/>";
    }
} else {

    $nMaschera = $_POST['nMaschera'];

    try {
        $hostname = "localhost";
        $dbname = "carnevale";
        $user = "root";
        $pass = "";
        $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);

        $sql = "     DELETE FROM galleria WHERE nMaschera='$nMaschera';

     DELETE FROM riparazione WHERE codiceMaschera='$nMaschera';

     UPDATE partecipazioneevento SET mascheraBase=NULL WHERE  mascheraBase='$nMaschera';
   
   UPDATE partecipazioneevento SET mascheraRecupero=NULL WHERE  mascheraRecupero='$nMaschera';

    
   UPDATE figuranti SET mascheraBase=NULL WHERE  mascheraBase='$nMaschera';
   
   UPDATE figuranti SET mascheraRecupero=NULL WHERE  mascheraRecupero='$nMaschera';

   UPDATE socio SET nMaschera=NULL WHERE  nMaschera='$nMaschera';

DELETE FROM maschera WHERE nMaschera='$nMaschera';

    ";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        header("Location: MascheraElimina.php", true, 301);
        exit();
    } catch (PDOException $e) {
        echo "Errore nella query....<br/>";
        echo $e->getMessage() . "<br/>";
    }
}
