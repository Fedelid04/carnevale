<?php
session_start();
?>
<?php
  if($_SESSION['ruolo']!="presidente"){
  header("Location: ../home.php");
  }
  OK
?>