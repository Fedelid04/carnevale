<?php
include "../controlloRuolo.php";
?>
<?php
include  "../conn.php";

$deposito = $_POST['deposito'];
$sarta = $_POST['sarta'];
$descrizione = $_POST['descrizione'];


$sql = "SELECT nMaschera FROM maschera order by nMaschera desc LIMIT 1";
$stmt = $conn->query($sql);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    explode('A', $row['nMaschera']);
    $row['nMaschera']++;
    //implode('', $row['nMaschera']);
    $nMaschera = $row['nMaschera'];
}

$sql = "INSERT INTO maschera values ('$nMaschera','$descrizione','$deposito','$sarta',DEFAULT);";
$stmt=$conn->query($sql);

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
