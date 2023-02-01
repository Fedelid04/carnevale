<?php
include  "../conn.php";
$colore = $_POST['colore'];
$deposito = $_POST['deposito'];
$sarta = $_POST['sarta'];
$descrizione = $_POST['descrizione'];
$descrizione = trim($descrizione);

$sql = "SELECT codMaschera FROM maschera order by codMaschera desc LIMIT 1";
$stmt = $conn->query($sql);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    explode('S', $row['codMaschera']);
    $row['codMaschera']++;    
    $codMaschera = $row['codMaschera'];
}


$sql = "INSERT INTO maschera values
 ('$codMaschera', '$colore' , '$descrizione' , DEFAULT , '$sarta' , '$deposito');";
echo $sql;

$stmt = $conn->prepare($sql);
$stmt->execute();


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
            $sql = 'SELECT codFoto from galleria order by codFoto desc limit 1';
            $stmt = $conn->query($sql);            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            explode('T' , $row['codFoto']);
            $row['codFoto']++;
            $codFoto = $row['codFoto'];            
            // Insert into Database
            echo '<script>alert(' . $codMaschera . ')</script>';
            $sql = "INSERT INTO galleria
				        VALUES('$codFoto' , '$new_img_name' , '$codMaschera')";

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            header("Location: aggiungiMaschera.php");
        } else {
            $em = "non puoi inserire file di questo tipo";
            header("Location: aggiungiMaschera.php?error=$em");
        }
    }
} else {
   // header("Location: aggiungiMaschera.php");
}