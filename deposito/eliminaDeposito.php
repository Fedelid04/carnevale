<?php
  include "../controlloRuolo.php";
?>
<?php

if (isset($_GET['deposito'])) {

    try {
        include "../conn.php";

        $sql = "    DELETE FROM maschera WHERE deposito='$deposito'; 
   DELETE FROM deposito WHERE deposito='$deposito';


    ";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        header("Location: reportDepositi.php", true, 301);
        exit();
    } catch (PDOException $e) {
        echo "Errore nella query....<br/>";
        echo $e->getMessage() . "<br/>";
    }
} else {


    $deposito = $_POST['deposito'];


    try {
        $hostname = "localhost";
        $dbname = "carnevale";
        $user = "root";
        $pass = "";
        $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);

        $sql = " SELECT nMaschera FROM maschera WHERE deposito='$deposito';
 ";

        $stmt = $conn->prepare($sql);
        $stmt->execute();


        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $maschera = $row['nMaschera'];

            $sql2 = "DELETE FROM galleria WHERE nMaschera='$maschera';  ";

            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute();

            $sql3 = "DELETE FROM riparazione WHERE codiceMaschera='$maschera';  ";

            $stmt3 = $conn->prepare($sql3);
            $stmt3->execute();


            $sql4 = "UPDATE socio SET nMaschera=NULL WHERE  nMaschera='$maschera' ";
            $stmt4 = $conn->prepare($sql4);
            $stmt4->execute();

            $sql5 = "UPDATE figuranti SET mascheraBase=NULL AND mascheraRecupero=NULL WHERE  mascheraBase='$maschera' OR
    mascheraRecupero='$maschera' ";

            $stmt5 = $conn->prepare($sql5);
            $stmt5->execute();
        }





        $sql = "   DELETE FROM maschera WHERE deposito='$deposito'; 
    DELETE FROM deposito WHERE deposito='$deposito';
 
 
    ";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        header("Location: DepositoElimina.php", true, 301);
        exit();
    } catch (PDOException $e) {
        echo "Errore nella query....<br/>";
        echo $e->getMessage() . "<br/>";
    }
}
