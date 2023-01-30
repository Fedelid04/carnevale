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
  <a href="../home2.php" class="btn btn-info" role="button">Link Button</a>
  </div>
  <div class="container">
    <h3 style="text-align: center;">REGISTRAZIONE</h3>
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
          <label for="">Email</label>
          <input name="email" type="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group col-md-2">
          <label for="">Telefono</label>
          <input name="cell" type="number" class="form-control" placeholder="Telefono" required>
        </div>
        <div class="form-group col-md-2">
          <label for="">Città</label>
          <input name="citta" type="text" class="form-control" placeholder="Arezzo" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-sm-2">
          <label for="">Indirizzo</label>
          <input name="indirizzo" type="text" class="form-control" placeholder="Indirizzo" required>
        </div>
        <div class="form-group col-md-2">
          <label for="inputCity">NumCivico</label>
          <input name="numCiv" type="text" class="form-control" placeholder="NumCivico" required>
        </div>
        <div class="form-group col-md-2">
          <label for="">CAP</label>
          <input name="cap" type="number" class="form-control" placeholder="CAP" required>
        </div>
        <div class="form-group col-md-2">
          <label for="">Provincia</label>
          <input name="provincia" type="text" class="form-control" placeholder="Arezzo" required>
        </div>
        <div class="form-group col-md-2">
          <label for="">Codice Socio</label>
          <input name="codiceSocio" type="number" class="form-control" required placeholder="codice socio (es. SC1, SC2 ecc..)">
        </div>
        <div class="form-group col-md-2">
          <label for="tipologiaSocio">tipo socio:
          </label>
          <select id="tipologiaSocio" name="tipologiaSocio" required class="form-control"
          onchange="location=this.value">
            <option value="" default></option>
            <option value="registraSocio.php">adulto</option>
            <option value="registraSocio2.php">minorenne</option>
            <option value="registraSocio3.php">manichino</option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-2">
          <label for="">Num tessera</label>
          <input name="nTessera" type="number" id="nTessera" placeholder="num tessera (es 1,2,3 ecc..)" name="nTessera" maxlength="50" class="form-control" required>
        </div>
        <div class="form-group col-md-2">
          <label for="">Num ricevuta</label>
          <input name="ricevuta" type="text" id="numeroRicevuta" placeholder="numeroRicevuta" minleght="10" maxleght="10" class="form-control" required>
        </div>
        <div class="form-group col-md-2">
          <label for="inputState">Carica</label>
          <select name="carica" id="inputState" class="form-control">
            <?php
            include "conn.php";
            $sql = "SELECT carica FROM cariche";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              echo "<option>" . $row['carica'] . "</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="inputState">Num maschera</label>
          <select name="maschera" id="inputState" class="form-control">
            <option value='nessuna'> nessuna</option>
            <?php
            include "conn.php";
            $sql = "SELECT nMaschera FROM maschera WHERE riparazione='no' AND nMaschera NOT IN(SELECT nMaschera FROM socio WHERE nMaschera IS NOT NULL)";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              echo "<option>" . $row['nMaschera'] . "</option>";
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
          <label for="dataEvento"> primo evento:</label>
          <select id="dataEvento" name="dataEvento" class="form-control">
            <option value='nessuna'>nessuna</option>
            <?php

            try {
              include "conn.php";
              $sql = "SELECT dataEvento,descrizione,codiceEvento FROM evento";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo ' <option value=' . $row['codiceEvento'] . '>' . $row['dataEvento'] . ' nome: ' . $row['descrizione'] . '</option>';
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
        <div class="form-group col-md-2">
          <label for="dataIscrizione">Data</label>
          <?php
          date_default_timezone_get();
          $date = date('Y', time());
          
          echo '<input class="form-control" type="number" min="2000" name="annoPagato" id="annoPagato" placeholder="ultimo anno pagato"  max=' . $date . ' required value="' . $date . '">';
          ?>
        </div>
        <div class="form-group col-md-2">
          <label for="staff">staff:</label>
          <select class="form-control" id="staff" name="staff" required>
            <option value="si"> si </option>
            <option value="no"> no </option>
          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="figurante">figurante:</label>
          <select class="form-control" id="figurante" name="figurante" required>
            <option value="si"> si </option>
            <option value="no"> no </option>
          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="note">note:</label>
          <textArea class="form-control" id="note" name="note" required rows="1">
                    </textArea>
        </div>
        <div class="form-group col-md-2">
          <br>
          <label></label>
          <input class="form-control" type="reset" name="cancella" value="Annulla">
        </div>
        <div class="form-group col-md-2">
          <br>
          <label></label>
          <input type="submit" value="registra" class="form-control" id="registrazione">
        </div>
    </form>
  </div>
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="./bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>