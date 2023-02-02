<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registrazione Socio</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../bootstrap-4.0.0-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" href="../css/navBar.css">
</head>

<body>
  <?php
  include '../conn.php';

  try {
    $codMaschera = $_GET['codMaschera'];
    $sql = "SELECT * FROM maschera WHERE codMaschera='$codMaschera'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $nm = $row['codMaschera'];
      $de = $row['descrizione'];
      $colore = $row['colore'];
      $dp = $row['codDeposito'];
      $cs = $row['codSarta'];
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
  <div class="container" id="FormUpdate">
    <h3 style="text-align: center;">MODIFICA MASCHERA</h3>
    <form action="cambioMaschera.php?codMaschera=<?= $codMaschera ?>" method="post" name="form" id="form" class="">
      <div class="form-row">
        <div class="form-group col-sm-4 mx-auto">
          <label for="deposito"> deposito:</label>

          <select id="deposito" name="codDeposito" class="form-control">
            <?php
            try {
              include "../conn.php";
              $sql = "SELECT codDeposito,citta,via FROM deposito";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo ' <option value=' . $row['codDeposito'] . '>' . $row['codDeposito'] . ' via: ' . $row['via'] . ' citta: ' . $row['citta'] . '</option>';
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
        <div class="form-group col-sm-2 mx-auto">
          <label for="sarta">sarta:</label>
          <select id="sarta" name="codSarta" class="form-control">
            <?php
            try {
              include "../conn.php";
              $sql = "SELECT codSarta,nome,cognome FROM maschera join sarta using(codSarta) where codMaschera like '" . $_GET['codMaschera'] . "'";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              $row = $stmt->fetch(PDO::FETCH_ASSOC);
              $codSarta = $row['codSarta'];
              echo ' <option value=' . $row['codSarta'] . '>' . $row['codSarta'] . ' ' . $row['nome'] . ' ' . $row['cognome'] . '</option>';
            } catch (PDOException) {
              echo "Errore nella query....<br/>";
              echo $e->getMessage() . "<br/>";
              die();
            }
            try {
              $sql = "SELECT distinct * FROM sarta where codSarta not like '$codSarta'";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo ' <option value=' . $row['codSarta'] . '>' . $row['codSarta'] . ' ' . $row['codiceSarta'] . $row['nome'] . ' ' . $row['cognome'] . '</option>';
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
        <div class="form-group col-sm-2 mx-auto">
          <label for="riparazione">riparazione:</label>
          <select id="riparazione" name="riparazione" required class="form-control">
            <?php
            try {
              include "../conn.php";
              $sql = "select riparazione from maschera where codMaschera like '$_GET[codMaschera]'";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              $row = $stmt->fetch(PDO::FETCH_ASSOC);
              if ($row['riparazione'] == 'no') {
                echo '<option value="' . $row['riparazione'] . '">' . $row['riparazione'] . '</option>';
                echo '<option value="si">si</option>';
              } else {

                echo '<option value="' . $row['riparazione'] . '">' . $row['riparazione'] . '</option>';
                echo '<option value="no">no</option>';
              }
            } catch (PDOException $e) {
              echo "Errore nella query....<br/>";
              echo $e->getMessage() . "<br/>";
              die();
            }
            ?>
          </select>
        </div>
        <div class="form-group col-sm-3 mx-auto">
          <label for="descrizione">descrizione:</label><br>
          <textArea id="descrizione" class="form-control" placeholder="descrizione" name="descrizione" maxlength="150" required rows="1">
            <?php
            include '../conn.php';
            $sql = "SELECT descrizione from maschera where codMaschera like '$_GET[codMaschera]'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            echo $row['descrizione'];
            ?>
          </textArea>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-sm-3 mx-auto">
          <label>Colore:</label>
          <?php
          include '../conn.php';
          $sql = "SELECT colore from maschera where codMaschera like '$_GET[codMaschera]'";
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          echo '<input type="color" class="form-control" id="colore" name="colore" value="' . $row['colore'] . '">';
          ?>
        </div>
        <div class="form-group col-md-2 mx-auto">
          <label>‎</label>
          <input class="form-control" type="reset" name="cancella" value="Annulla">
        </div>
        <div class="form-group col-md-2 mx-auto">
          <label for="">‎</label>
          <input type="submit" value="cambia" class="form-control" id="registrazione">
        </div>
      </div>
      <script src="//code.jquery.com/jquery.js"></script>
      <script src="./bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>