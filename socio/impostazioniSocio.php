<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>Registrazione Socio</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link href="../bootstrap-4.0.0-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/navBar.css">
</head>

<body>
  <div class="container text-center" id="FormUpdate">
    
    <br>
    <form action="modificaSocio.php" method="post">

      <div class="form-row">
        <div class="form-group col-sm-6 offset-2">
        <h3>Modifica Socio</h3>
          <label for="inputState">CodiceSocio</label>
          <select name="codiceSocio" class="form-control">
            <?php
            include "../conn.php";
            $sql = "SELECT  * FROM socio";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              echo "<option>" . $row['codSocio'] . "</option>";
            }
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