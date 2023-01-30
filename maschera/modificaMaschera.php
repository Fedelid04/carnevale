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

  $hostname = "localhost";
  $dbname = "carnevale";
  $user = "root";
  $pass = "";
  $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);


  try {
    $nMaschera = $_GET['nMaschera'];
    $sql = "SELECT * FROM maschera WHERE nMaschera='$nMaschera '";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $nm = $row['nMaschera'];
      $de = $row['descrizione'];
      $dp = $row['deposito'];
      $cs = $row['codiceSarta'];
      $ri = $row['riparazione'];
    }
  } catch (PDOException $e) {
    echo "Errore nella query....<br/>";
    echo $e->getMessage() . "<br/>";
    die();
  } finally {
    $conn = null;
  }
  ?>
  <div class="container-fluid">
    <a href="../home.php" class="btn btn-info" role="button">Home</a>
  </div>
  <div class="container">
    <h3 style="text-align: center;">MODIFICA MASCHERA</h3>
    <form action="cambioMaschera.php?nMaschera=<?=$nMaschera?>" method="post" name="form" id="form" class="">
      <div class="form-row">
        <div class="form-group col-sm-2">
          <label for="deposito"> deposito:</label>

          <select id="deposito" name="deposito" class="form-control">
            <?php
            echo ' <option value="" disabled selected>' . $dp . '</option>';
            ?>
            <?php
            try {
              include "../conn.php";
              $sql = "SELECT deposito,citta,costoMese FROM deposito";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo ' <option value=' . $row['deposito'] . '>' . $row['deposito'] . ' città: ' . $row['citta'] . ' (costo: ' . $row['costoMese'] . ' euro)</option>';
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
            <option value='nessuna'> nessuna</option>
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
        <div class="form-group col-sm-2">
          <label for="riparazione">riparazione:</label>
          <select id="riparazione" name="riparazione" required class="form-control">
            <option value="si"> si </option>
            <option value="no"> no </option>
          </select>
        </div>
        <div class="form-group col-sm-3">
          <label for="file">scegli immagine</label>
          <input class="form-control" type="file" id="file" class="file" name="my_image">
          <p class="file-name"></p>
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
          <input type="submit" value="cambia" class="form-control" id="registrazione">
        </div>
      </div>
      <script src="//code.jquery.com/jquery.js"></script>
      <script src="./bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>