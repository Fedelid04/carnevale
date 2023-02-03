<html lang="en">

<head>
  <title>Registrazione Socio</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
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
          <input class="form-control" type="email" id="email" name="email" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-2">
          <label for="">NumCivico</label>
          <input name="civico" type="text" class="form-control" placeholder="NumCivico" required>
        </div>
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
          <label for="">Maschera:</label>
          <input type="text" id="mascheraFigurante" name="mascheraFigurante" class="form-control">
        </div>
        <div class="form-group col-md-2" id="SceltaMaschera2" style="display:none;">
          <label for="">Maschera Riserva:</label>
          <input type="text" id="mascheraSecondaria" name="mascheraSecondaria" class="form-control">
        </div>
        <div class="form-group col-md-2" id="SceltaMaschera3" style="display:none;">
          <label for="">Descrizione Maschera:</label>
          <input type="text" id="descrizione" name="descrizione" class="form-control">
        </div>
        <div class="form-group col-md-2" id="colore" style="display:none;">
          <label class="container text-center" for="colore">colore:</label><br>
          <input class="form-control" id="coloreForm" name="colore" type="color">
        </div>
        <div class="form-group col-md-2" id="uscita" style="display: none">
          <label for="figurante">uscita:</label>
          <select class="form-control" id="uscitaForm" name="uscita">
            <option value="no">no</option>
            <option value="si">si</option>
          </select>
        </div>
        <div class="form-group col-md-2" id="esterna" style="display: none">
          <label for="figurante">uscita esterna:</label>
          <select class="form-control" id="esternaForm" name="esterna">
            <option value="no">no</option>
            <option value="si">si</option>
          </select>
        </div>
        <div class="form-group col-md-2" id="sarta" style="display: none">
          <label class="container text-center" for="sarta">sarta:</label>
          <select name="sarta" id="sartaForm" class="form-control">
            <?php
            try {
              include "../conn.php";
              $sql = "SELECT * FROM sarta";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo ' <option value=' . $row['codSarta'] . '>' . $row['nome'] . ' ' . $row['cognome'] . '</option>';
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
        <div class="form-group col-md-2" id="deposito" style="display: none">
          <label class="container text-center" for="deposito"> deposito:</label>
          <select class="form-control" id="depositoForm" name="deposito">
            <?php
            try {
              include "../conn.php";
              $sql = "SELECT * FROM deposito";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo ' <option value=' . $row['codDeposito'] . '>';
                echo $row['via'] . ' ' . $row['citta'];
                echo '</option>';
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
        <div class="form-group col-md-8 mx-auto" id="immagine" style="display: none">
          <label class="container text-center">scegli immagine</label>
          <input class="form-control" type="file" name="my_image">
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
  <?php
    if(isset($_GET['errore'])){
    $errore = $_GET['errore'];
    if($errore==1){
      echo '<script>alert("Maschera già registrata")</script>';
    }
    if($errore==2){
      echo '<script>alert("Tessera già registrata")</script>'; 
    }
    if($errore==3){
      echo '<script>alert("Maschera Primaria e secondaria devono essere diverse")</script>'; 
    }
    }
  ?>
  <img src="../imgs/ImmagineBellaFinalePotente.jpg" class="img-fluid" alt="Responsive image">
  <script>
    function mask() {
      if (document.getElementById("figurante").value == "si") {
        document.getElementById("SceltaMaschera").style.display = "block";
        document.getElementById("SceltaMaschera2").style.display = "block";
        document.getElementById("SceltaMaschera3").style.display = "block";
        document.getElementById("colore").style.display = "block";
        document.getElementById("sarta").style.display = "block";
        document.getElementById("deposito").style.display = "block";
        document.getElementById("immagine").style.display = "block";
        document.getElementById("uscita").style.display = "block";
        document.getElementById("esterna").style.display = "block";
        document.getElementById("mascheraFigurante").setAttribute("required","required");
        document.getElementById("mascheraSecondaria").setAttribute("required","required");
        document.getElementById("descrizione").setAttribute("required","required");
        document.getElementById("coloreForm").setAttribute("required","required");
        document.getElementById("sartaForm").setAttribute("required","required");
        document.getElementById("depositoForm").setAttribute("required","required");
        document.getElementById("uscitaForm").setAttribute("required","required");
        document.getElementById("esternaForm").setAttribute("required","required");
      }
      if (document.getElementById("figurante").value == "no") {
        document.getElementById("SceltaMaschera").style.display = "none";
        document.getElementById("SceltaMaschera2").style.display = "none";
        document.getElementById("SceltaMaschera3").style.display = "none";
        document.getElementById("colore").style.display = "none";
        document.getElementById("sarta").style.display = "none";
        document.getElementById("deposito").style.display = "none";
        document.getElementById("immagine").style.display = "none";
        document.getElementById("uscita").style.display = "none";
        document.getElementById("esterna").style.display = "none";
        document.getElementById("mascheraFigurante").removeAttribute("required");
        document.getElementById("mascheraSecondaria").removeAttribute("required");
        document.getElementById("descrizione").removeAttribute("required");
        document.getElementById("colore").removeAttribute("required");
        document.getElementById("sartaForm").removeAttribute("required");
        document.getElementById("depositoForm").removeAttribute("required");
        document.getElementById("uscitaForm").removeAttribute("required");
        document.getElementById("esternaForm").removeAttribute("required");
    }
  }
  </script>
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="../bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>

</body>

</html>