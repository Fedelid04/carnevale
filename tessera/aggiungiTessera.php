<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registrazione Tessera</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../bootstrap-4.0.0-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" href="../css/NAVBAR2.css">
  <link rel="stylesheet" href="../css/navBar.css">
</head>

<body>
  <?php
  include 'navbarTessera.php';
  ?>
  <br><br>
  <div class="container" id="FormRegistra">
    <h1 style="text-align: center">Aggiungi Tessera</h1>
    <br>
    <form action="registerTessera.php" method="post" name="form" id="form" class="">
      <div class="form-row">
        <div class="form-group col-sm-2 mx-auto">
          <label for="codiceSocio">numero tessera:</label>
          <input type="text" class="form-control" id="numeroTessera" placeholder="numeroTessera" name="numeroTessera" maxlength="50" required>
        </div>
        <div class="form-group col-sm-2 mx-auto">
          <label for="codiceSocio">Tipo:</label>
          <select class="form-control" name="Tipo" placeholder="tipo tessera">
            <?php
            include '../conn.php';
            $sql = "SELECT * FROM tipo_tessera";
            $stmt = $conn->query($sql);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              echo "<option value='$row[idTipo]'>".$row['tipologia']."</option>";
            }
            ?>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-sm-2 mx-auto">
          <label for="">‎</label>
          <input class="form-control" type="reset" name="cancella" value="Annulla">
        </div>
        <div class="form-group col-sm-2 mx-auto">
          <label for="">‎</label>
          <input type="submit" value="Aggiungi" class="form-control" id="registrazione">
        </div>
      </div>
    </form>
  </div>
  <?php
  if (isset($_GET['errore'])) {
    $errore = $_GET['errore'];
    if ($errore == 1) {
      echo '<script>alert("Tessera già presente")</script>';
    }
  }
  ?>
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="../bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>