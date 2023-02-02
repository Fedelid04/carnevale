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
  include 'navbarSocio.php';
  ?>
  <div class="container" id="FormRegistra">
    <h1 style="text-align: center;">REGISTRAZIONE</h1>
    <form action="register.php" method="post" name="form" id="form" class="">
      <div class="form-row">
        <div class="form-group col-sm-2">
          <label for="">Nome</label>
          <input name="nome" type="text" class="form-control" placeholder="Nome" required>
        </div>
        <div class="form-group col-sm-2">
          <label for="">Cognome</label>
          <input name="cognome" type="text" class="form-control" placeholder="Cognome" required>
        </div>

        <div class="form-group col-sm-2">
          <label for="">CF</label>
          <input name="cf" type="text" class="form-control" placeholder="Codice Fiscale" required>
        </div>
        <div class="form-group col-md-2">
          <label for="">Telefono</label>
          <input name="cell" type="number" class="form-control" placeholder="Telefono" required>
        </div>
        <div class="form-group col-md-2">
          <label for="">Città</label>
          <input name="citta" type="text" class="form-control" placeholder="Arezzo" required>
        </div>
        <div class="form-group col-md-2">
          <label for="staff">staff:</label>
          <select class="form-control" id="staff" name="staff" required>
            <option value="si"> si </option>
            <option value="no"> no </option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-2">
          <label for="">Indirizzo</label>
          <input name="indirizzo" type="text" class="form-control" placeholder="Indirizzo" required>
        </div>
        <div class="form-group col-md-2">
          <label for="">Provincia</label>
          <input name="provincia" type="text" class="form-control" placeholder="Arezzo" required>
        </div>
        <div class="form-group col-md-2">
          <label for="tipologiaTessera">tipo tessera:
          </label>
          <select id="tipologiaTessera" name="tipologiaTessera" required class="form-control">
            <?php
            include '../conn.php';
            $sql = "SELECT idTipo,tipologia from tipo_tessera;";
            $stmt = $conn->query($sql);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              echo "<option value='$row[idTipo]'>" . $row['tipologia'] . "</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="inputState">Carica</label>
          <select name="carica" id="inputState" class="form-control">
            <?php
            include "../conn.php";
            $sql = "SELECT codCarica,tipoCarica FROM carica";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              echo "<option value=$row[codCarica]>" . $row['tipoCarica'] . "</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="dataIscrizione">data iscrizione:</label>
          <?php
          date_default_timezone_get();
          $date = date('Y-m-d', time());
          echo '<input type="date" id="dataIscrizione" name="dataIscrizione" placeholder="data di iscrizione"
                    min="1920-01-01" max=' . $date . ' required class=form-control>';
          ?>
        </div>
        <div class="form-group col-md-2">
          <label for="email">email:</label>
          <input class="form-control" type="email" id="email" name="email">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-2">
          <label for="figurante">figurante:</label>
          <select class="form-control" id="figurante" name="figurante" required onchange=mask()>
            <option value="no">no</option>
            <option value="si">si</option>
          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="">codice Tessera:</label>
          <input type="text" name="codTessera" class="form-control" placeholder="numtessera">
        </div>
        <div class="form-group col-md-2" id="SceltaMaschera" style="display:none;">
          <label for="">Scegli Maschera:</label>
          <select id="mascheraFigurante" name="mascheraFigurante" required class="form-control">
            <?php
            include '../conn.php';
            $sql = "SELECT * from maschera;";
            $stmt = $conn->query($sql);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              echo '<option value="' . $row['codMaschera'] . '">' . $row['codMaschera'] . '</option>';
            }
            ?>
          </select>
        </div>
        <div class="form-group col-md-2" id="SceltaMaschera2" style="display:none;">
          <label for="">Maschera secondaria:</label>
          <select id="mascheraFigurante" name="mascheraFigurante" required class="form-control">
            <?php
            include '../conn.php';
            $sql = "SELECT * from maschera";
            $stmt = $conn->query($sql);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              echo '<option value="' . $row['codMaschera'] . '">' . $row['codMaschera'] . '</option>';
            }
            ?>
          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="">‎</label>
          <input class="form-control" type="reset" name="cancella" value="Annulla">
        </div>
        <div class="form-group col-md-2">
          <label for="">‎</label>
          <input type="submit" value="registra" class="form-control" id="registrazione">
        </div>
    </form>
  </div>
  <img src="../imgs/ImmagineBellaFinalePotente.jpg" class="img-fluid" alt="Responsive image">
  <script>
    function mask() {
      if (document.getElementById("figurante").value == "si") {
        document.getElementById("SceltaMaschera").style.display = "block";
        document.getElementById("SceltaMaschera2").style.display = "block";
      }
      if (document.getElementById("figurante").value == "no") {
        document.getElementById("SceltaMaschera").style.display = "none";
        document.getElementById("SceltaMaschera2").style.display = "none";
      }
    }
  </script>
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="../bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>

</body>

</html>