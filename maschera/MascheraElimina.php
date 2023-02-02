<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registrazione Socio</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link href="../bootstrap-4.0.0-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/formStyle2.css">
</head>

<body>
  <div class="container-fluid">
    <a href="../home.php" class="btn btn-info" role="button">Home</a>
  </div>
  <div class="container">
    <h3 style="text-align: center">Elimina Maschera</h3>
    <form action="eliminaMaschera.php" method="post">
      <div class="form-row">
        <div class="form-group col-sm-6 mx-auto" style="text-align: center;">
          <label for="">Seleziona la Maschera</label>
          <select name="codMaschera" class="form-control" style="color:inherit;">
            <?php
            if (isset($_GET['codMaschera'])) {
              include '../conn.php';
              $sql= "SELECT * FROM maschera where codMaschera = '".$_GET['codMaschera']."'";
              $stmt = $conn->query($sql);
              $row = $stmt->fetch(PDO::FETCH_ASSOC);
              echo "<option value = $row[codMaschera]>$row[codMaschera] $row[descrizione] </option>";              
            } else {
              try {
                include "../conn.php";
                $sql = "SELECT  * FROM maschera where eliminato = 'no'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  echo ' <option value=' . $row['codMaschera'] . ' style="color:' . $row['colore'] . ';">' . $row['codMaschera'] . ' ' . $row['descrizione'] . '</option>';
                }
              } catch (PDOException $e) {
                echo "Errore nella query....<br/>";
                echo $e->getMessage() . "<br/>";
                die();
              } finally {
                $conn = null;
              }
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