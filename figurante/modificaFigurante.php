
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
    <h1 style="text-align: center;">Modifica</h1>
    <form action="cambioFigurante.php?codSocio=<?=$codSocio?>" method="post">
      <div class="form-row">
        <?php
        $codSocio = $_GET['codSocio'];
        include "../conn.php";
        ?>
        <?php
        include "../conn.php";
        try {
          $codSocio = $_GET['codSocio'];
          $sql = "SELECT * FROM figurante WHERE codSocio='$codSocio';";
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $us = $row['uscita'];
            $use = $row['uscitaEsterna'];
            $mBase = $row['codMaschera'];
            $mRec = $row['mascheraRiserva'];
          }
        } catch (PDOException $e) {
          echo "Errore nella query...";
          echo $e->getMessage() . "<br/>";
          die();
        } finally {
          $conn = null;
        }
        ?>
        <div class="form-row">
          <div class="form-group col-sm-3">
            <label for="maschera"></label>
            <select class="form-control" id="uscita" name="uscita">
              <option value="" disabled selected><?php echo 'uscita: ' . $us; ?></option>';
              <option value="si"> si </option>
              <option value="no"> no </option>
            </select>
          </div>
          <div class="form-group col-sm-4">
            <label for="maschera"></label>
            <select class="form-control" id="uscitaEsterna" name="uscitaEsterna">
              <option value="" disabled selected><?php echo 'uscita esterna: ' . $use; ?></option>';
              <option value="si"> si </option>
              <option value="no"> no </option>
            </select>
          </div>
          <div class="form-group col-sm-4">
            <label for="maschera"></label>
            <select class="form-control" id="maschera" name="maschera">
              <option value="" disabled selected><?php echo 'maschera recupero: ' . $mRec; ?></option>';
              <?php
              try {
                include "../conn.php";
                $sql = "SELECT codMaschera FROM maschera WHERE codMaschera NOT IN(SELECT mascheraRiserva FROM figuranti);";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  echo ' <option value='.$row['codMaschera'].'>'.$row['nMaschera'].'</option>';
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
          <div class="form-group col-md-6">
            <br>
            <input class="form-control" type="reset" name="cancella" value="Annulla">
          </div>
          <div class="form-group col-md-6">
            <br>
            <input type="submit" value="Modifica" class="form-control" id="Modifica">
          </div>
        </div>
    </form>
  </div>
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="./bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>