<?php
include  "../conn.php";
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
    if($codMaschera > $tmp){
        $tmp = $codMaschera;    
    }   
}
$tmp++;
$codMaschera = 'MS' . $tmp;


$sql = "INSERT INTO maschera values
 ('$codMaschera', '$colore' , '$descrizione' , DEFAULT , '$sarta' , '$deposito');";
$stmt = $conn->prepare($sql);
$stmt->execute();


if (isset($_FILES['my_image'])) {    
    $img_name = $_FILES['my_image']['name'];
    echo $img_name;
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
            $sql = 'SELECT codFoto from galleria';
            $stmt = $conn->query($sql);            
            foreach($stmt as $row) {                
                $codFoto = explode('F', $row['codFoto'])[1];
                if ($codFoto > $tmp) {
                    $tmp = $codFoto;
                }
            }
            $tmp++;
            $codFoto = "FT".$tmp;            
            // Insert into Database
            $sql = "INSERT INTO galleria
				        VALUES('$codFoto' , '$new_img_name' , '$codMaschera')";
            echo $sql;
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            //header("Location: aggiungiMaschera.php");
        } else {
            $em = "non puoi inserire file di questo tipo";
            //header("Location: aggiungiMaschera.php?error=$em");
        }
    }
} else {
   //header("Location: aggiungiMaschera.php");
}