
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registrazione Socio</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link href="../bootstrap-4.0.0-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/navBar.css">
</head>

<body>
  <div class="container-fluid">
    <a href="../home2.php" class="btn btn-info" role="button">Home</a>
  </div>
  <div class="container" id="FormElimina">
    <h1>Aggiungi Partecipazione</h1>
    <form action="./registerPartecipazione.php" method="post">
      <div class="form-row">
        <div class="form-group col-md-2 mx-auto ">

          <label for="dataEvento"> data evento:</label>
          <select class="form-control" id="dataEvento" name="dataEvento" required>

            <?php

            try {
              include  "../conn.php";



              $sql = "SELECT dataEvento,descrizione FROM evento";
              $stmt = $conn->prepare($sql);
              $stmt->execute();


              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo ' <option value=' . $row['dataEvento'] . '>' . $row['dataEvento'] . ' nome: ' . $row['descrizione'] . '</option>';
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
        <div class="form-group col-md-2 mx-auto">
          <label for="codiceEvento"> codice evento:</label>

          <select class="form-control" id="codiceEvento" name="codiceEvento" required>

            <?php

            try {
              include  "../conn.php";



              $sql = "SELECT codiceEvento FROM evento";
              $stmt = $conn->prepare($sql);
              $stmt->execute();


              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo ' <option value=' . $row['codiceEvento'] . '>' . $row['codiceEvento'] . ' </option>';
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
        <div class="form-group col-md-2 mx-auto ">

          <label for="mascheraBase"> maschera evento:</label>

          <select class="form-control" id="mascheraBase" name="mascheraBase" required>

            <?php

            try {
              include  "../conn.php";



              $sql = "SELECT nMaschera FROM maschera WHERE riparazione='no';";
              $stmt = $conn->prepare($sql);
              $stmt->execute();


              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo ' <option value=' . $row['nMaschera'] . '>' . $row['nMaschera'] . ' </option>';
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
        <div class="form-group col-md-2 mx-auto">
          <label for="codSocio"> codice socio:</label>

          <select class="form-control" id="codSocio" name="codSocio" required>

            <?php

            try {
              include  "../conn.php";



              $sql = "SELECT codSocio FROM socio WHERE figurante='si';";
              $stmt = $conn->prepare($sql);
              $stmt->execute();


              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo ' <option value=' . $row['codSocio'] . '>' . $row['codSocio'] . ' </option>';
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
        <div class="form-group col-md-4 mx-auto">
          <input class="form-control" type="submit" value="aggiungi" class='submit' id="registrazione">
          <br>
<input class="form-control" type="reset" name="cancella" value="Annulla">
          </div>
      </div>
  </div>
  </div>
  </form>
  </div>
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="./bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>

</body>

</html>