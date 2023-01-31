<?php
  include "../controlloRuolo.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registrazione Socio</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../bootstrap-4.0.0-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" href="../css/formStyle2.css">
</head>

<body>
  <?php

  ?>
  <div class="container-fluid">
    <a href="../home.php" class="btn btn-info" role="button">Home</a>
  </div>
  <div class="container">
    <h3 style="text-align: center;">AGGIUNGI MASCHERA</h3>
    <form action="registerMaschera.php" method="post" name="form" id="form" class="">
      <div class="form-row">
        <div class="form-group col-sm-2">
          <label for="deposito"> deposito:</label>
          <select class="form-control" id="deposito" name="deposito">
            <?php
            try {
              include  "../conn.php";
              $sql = "SELECT * FROM deposito";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo ' <option value=' . $row['deposito'] . '>';
                echo $row['deposito'];
                echo '</option>';
              }
            } catch (PDOException $e) {
              echo "Errore nella query....<br/>";
              echo $e->getMessage() . "<br/>";
              die();
            } finally {
              $conn = null;
            }
            ?>
          </select>
        </div>
        <div class="form-group col-sm-2">
          <label for="sarta">sarta:</label>
          <select id="sarta" name="sarta" class="form-control">
            <?php
            try {
              include "../conn.php";
              $sql = "SELECT * FROM sarta";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo ' <option value=' . $row['codiceSarta'] . '>' . $row['codiceSarta'] . ' nome: ' . $row['nomeSarta'] . ' (costo: ' . $row['costoOra'] . ' euro)</option>';
              }
            } catch (PDOException $e) {
              echo "Errore nella query....<br/>";
              echo $e->getMessage() . "<br/>";
              die();
            } finally {
              $conn = null;
            }
            ?>
          </select>
        </div>
        <div class="form-group col-sm-3">
          <label for="file">scegli immagine</label>
          <input class="form-control" type="file" id="file" class="file" name="my_image">
          <p class="file-name"></p>
        </div>
        <div class="form-group col-sm-2">
          <label for="colore">colore:</label><br>
          <input id="colore" class="form-control" name="descrizione" type="color">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-sm-2">
          <label for="descrizione">descrizione:</label><br>
          <textArea id="descrizione" class="form-control" placeholder="descrizione" name="descrizione" maxlength="150" required rows="1">
          </textArea>
        </div>
        <div class="form-group col-md-2">
          <label>‎</label>
          <input class="form-control" type="reset" name="cancella" value="Annulla">
        </div>
        <div class="form-group col-md-2">
          <label for="">‎</label>
          <input type="submit" value="registra" class="form-control" id="registrazione">
        </div>
      </div>
      <script src="//code.jquery.com/jquery.js"></script>
      <script src="./bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>