<?php
include  "../conn.php";

$nMaschera = $_POST['nMaschera'];
$deposito = $_POST['deposito'];
$sarta = $_POST['sarta'];
$riparazione = $_POST['riparazione'];
$descrizione = $_POST['descrizione'];


$sql = "SELECT nMaschera FROM maschera
         WHERE nMaschera = '$nMaschera'  LIMIT 1";

$stmt = $conn->prepare($sql);
$stmt->execute();
$totale = $stmt->rowCount();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<br>';
}

if ($totale == 1) {

    header("Location: aggiungiMaschera.php?errore=1", true, 301);
    exit();
} else {



    if ($sarta == "nessuna") {

        $query = " INSERT INTO maschera VALUES('$nMaschera','$descrizione','$deposito',NULL,'$riparazione');
           ";


        if ($conn->query($query) == true) {

            // header("Location: aggiungiMaschera.php", true, 301);
            //  exit();
        } else {

            echo "errore registrazione $query " . $conn->error;
        }
    } else {

        $query = " INSERT INTO maschera VALUES('$nMaschera','$descrizione','$deposito','$sarta','$riparazione');
    ";


        if ($conn->query($query) == true) {

            // header("Location: aggiungiMaschera.php", true, 301);
            //  exit();
        } else {

            echo "errore registrazione $query " . $conn->error;
        }
    }


    if ($riparazione == "si" && $sarta == "nessuna") {
        date_default_timezone_get();
        $date = date('Y-m-d', time());

        $query = " INSERT INTO riparazione VALUES('$nMaschera',NULL,'$date',NULL,'');
              
        ";


        if ($conn->query($query) == true) {

            //  header("Location: aggiungiMaschera.php", true, 301);
            // exit();
        } else {

            echo "errore registrazione $query " . $conn->error;
        }
    } elseif ($riparazione == "si" && $sarta != "nessuna") {
        date_default_timezone_get();
        $date = date('Y-m-d', time());

        $query = " INSERT INTO riparazione VALUES('$nMaschera','$sarta','$date',NULL,'');
              
        ";


        if ($conn->query($query) == true) {
        }
    }

    if (isset($_FILES['my_image'])) {

        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];

        if ($error == 0) {

            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Insert into Database
                $sql = "INSERT INTO galleria 
				        VALUES('$nMaschera','$new_img_name')";

                $stmt = $conn->prepare($sql);
                $stmt->execute();

                header("Location: aggiungiMaschera.php");
            } else {
                $em = "non puoi inserire file di questo tipo";
                header("Location: aggiungiMaschera.php?error=$em");
            }
        }
    } else {
        header("Location: aggiungiMaschera.php");
    }
    echo "<pre>";
    print_r($_FILES['my_image']);
    echo "</pre>";
    header("Location: aggiungiMaschera.php");
}
