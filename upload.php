<?php

$numeroMasc = $_POST['nMaschera'];
if (isset($_POST['submit']) && isset($_FILES['my_image'])) {

	try {
		include "../conn.php";
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
				$img_upload_path = 'uploads/' . $new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "INSERT INTO galleria 
				        VALUES('$numeroMasc','$new_img_name')";

				$stmt = $conn->prepare($sql);
				$stmt->execute();

				header("Location: aggiungiImmagine.php");
			} else {
				$em = "non puoi inserire file di questo tipo";
				header("Location: aggiungiImmagine.php?error=$em");
			}
		} else {
			$em = "errore sconosciuto";
			header("Location: aggiungiImmagine.php?error=$em");
		}
	} catch (PDOException $e) {
		echo "Errore nella query....<br/>";
		echo $e->getMessage() . "<br/>";
		die();
	} finally {
		$conn = null;
	}
} else {
	header("Location: aggiungiImmagine.php");
}



echo "<pre>";
print_r($_FILES['my_image']);
echo "</pre>";

header("Location: aggiungiImmagine.php");
