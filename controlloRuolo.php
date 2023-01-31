<?php
session_start();
?>
<?php
  if($_SESSION['tipoCarica']!="C1"){
  header("Location: ../home.php");
  }
?>