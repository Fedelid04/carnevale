<?php
  include "../controlloRuolo.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" >

<head>
  <title>Registrazione Socio</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link href="../bootstrap-4.0.0-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="container" id="FormUpdate">
    <div class="form-row">
    <div class="form-group col-md-6">
      <h1>Modifica Socio</h1>
      <form action="modificaSocio1.1.php" method="post">
        <label for="inputState">CodiceSocio</label>
        <select name="codiceSocio" class="form-control">
          <?php
          /*include "../conn.php";
          $sql = "SELECT  * FROM socio";
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option>" . $row['codSocio'] . "</option>";
          }*/
          ?>
        </select>
        <input type="submit" value="Modifica" class="form-control" id="registrazione">
    </div>
    </div>
  </div>

  </form>
  </div>
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="./bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>