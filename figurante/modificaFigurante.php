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
  <div class="container-fluid">
    <a href="../home.php" class="btn btn-info" role="button">Home</a>
  </div>
  <?php
  $codSocio = $_GET['codSocio'];
  ?>
  <div class="container" id="FormUpdate">
    <h1 style="text-align: center;">Modifica Figurante</h1>
    <form action="cambioFigurante.php?codSocio=<?=$codSocio?>" method="post">
      <div class="form-row">
        <?php
        $codSocio = $_GET['codSocio'];
        include "../conn.php";
        ?>
        <div class="form-row">
          <div class="form-group col-sm-5">
            <label for="Uscita">Uscita</label>
            <select class="form-control" id="uscita" name="uscita">
              <option value="si"> si </option>
              <option value="no"> no </option>
            </select>
          </div>
          <div class="form-group col-sm-5">
            <label for="Uscita Esterna">Uscita Es</label>
            <select class="form-control" id="uscitaEsterna" name="uscitaEsterna">
              <option value="si"> si </option>
              <option value="no"> no </option>
            </select>
          </div>
          <div class="form-group col-sm-4">
            <label for="maschera"></label>
            <select class="form-control" id="maschera" name="maschera">
              <?php
              try {
                include "../conn.php";
                $sql = "SELECT codMaschera FROM maschera WHERE codMaschera NOT IN(SELECT mascheraRiserva FROM figuranti);";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  echo ' <option value='.$row['codMaschera'].'>'.$row['codMaschera'].'</option>';
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
          <div class="form-group col-md-3">
            <input class="form-control" type="reset" name="cancella" value="Annulla">
          </div>
          <div class="form-group col-md-3">
            <input type="submit" value="Modifica" class="form-control" id="Modifica">
          </div>
        </div>
    </form>
  </div>
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="./bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>