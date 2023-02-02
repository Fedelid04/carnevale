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
    <form action="registerMaschera.php" method="post" enctype="multipart/form-data" id="form">
      <div class="form-group col-md-3 mx-auto">
        <label class="container text-center" for="numeroMaschera">numMaschera:</label><br>
        <input id="numeroMaschera" class="form-control" name="numeroMaschera" type="text">
      </div>
      <div class="form-row">
        <div class="form-group col-md-3 mx-auto">
          <label class="container text-center" for="descrizione">descrizione:</label><br>
          <textArea id="descrizione" class="form-control" placeholder="descrizione" name="descrizione" maxlength="150" required rows="1">
          </textArea>
        </div>
        <div class="form-group col-md-1 mx-auto">
          <label class="container text-center" for="colore">colore:</label><br>
          <input id="colore" class="form-control" name="colore" type="color">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-3 mx-auto">
          <label class="container text-center" for="deposito"> deposito:</label>
          <select class="form-control" id="deposito" name="deposito">
            <?php
            try {
              include "../conn.php";
              $sql = "SELECT * FROM deposito";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo ' <option value=' . $row['codDeposito'] . '>';
                echo $row['via'] . ' ' . $row['citta'];
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
        <div class="form-group col-md-3 mx-auto">
          <label class="container text-center" for="sarta">sarta:</label>
          <select id="sarta" name="sarta" class="form-control">
            <?php
            try {
              include "../conn.php";
              $sql = "SELECT * FROM sarta";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo ' <option value=' . $row['codSarta'] . '>' . $row['nome'] . ' ' . $row['cognome'] . '</option>';
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
      </div>
      <div class="form-row">
        <div class="form-group col-md-8 mx-auto">
          <label class="container text-center">scegli immagine</label>
          <input class="form-control" type="file" name="my_image">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-sm-2 mx-auto">
          <input class="form-control" type="reset" name="cancella" value="Annulla">
        </div>
        <div class="form-group col-sm-2 mx-auto">
          <input type="submit" value="registra" class="form-control" id="registrazione">
        </div>
      </div>
    </form>
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="./bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>