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
  include 'navbarFigurante.php';
  ?>
  <div class="container" id="FormElimina">
    <h1 style="text-align: center;">ELIMINA FIGURANTE</h1>
    <form action="eliminaFigurante.php" method="post" name="form" id="form" class="">
      <div class="form-row">
        <div class="form-group col-sm-6 mx-auto" style="text-align: center;">
          <label for="codiceSocio">Codice socio:</label>

          <select id="codiceSocio" class="form-control" name="codiceSocio" required>
            <?php
            try {
              include "../conn.php";
              $sql = "SELECT * FROM figurante join socio using(codSocio)
              where socio.eliminato='no' and socio.figurante='si'";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo ' <option value=' . $row['codSocio'] . '>' . $row['codSocio'] . '</option>';
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
          <input type="submit" value="Elimina" class="form-control" id="registrazione">
        </div>
      </div>
    </form>
  </div>
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="./bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>