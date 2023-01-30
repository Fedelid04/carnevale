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
    <h3 style="text-align: center;">AGGIUNGI EVENTO</h3>
    <form action="registerEvento.php" method="post" name="form" id="form" class="">
      <div class="form-row">
        <div class="form-group col-sm-2">
          <label for="codiceEvento">codice evento</label>
          <input type="text" class="form-control" id="codiceEvento" placeholder="codice evento (es EV1,1V2 ecc..)" name="codiceEvento" required>
        </div>
        <div class="form-group col-sm-2">
          <label for="citta">citta evento:</label>
          <input type="text" class="form-control" id="citta" placeholder="citta" name="citta" maxlength="50" required>
        </div>
        <div class="form-group col-sm-2">
          <label for="incasso">incasso:</label>
          <input type="text" class="form-control" id="incasso" placeholder="incasso" name="incasso" maxlength="50" required>
        </div>
        <div class="form-group col-md-2">

          <label for="provincia">provincia evento</label>
          <input type="text" class="form-control" id="provincia" placeholder="provincia" name="provincia" maxlength="50" required>
        </div>
        <div class="form-group col-md-2">

          <label for="comune">comune evento</label>
          <input type="text" class="form-control" id="comune" placeholder="comune" name="comune" maxlength="50" required>
        </div>
        <div class="form-group col-md-2">
          <?php
          date_default_timezone_get();
          $date = date('Y-m-d', time());
          ?>
          <label>Data inizio noleggio</label>

          <input class="form-control" type="date" required id="dataIniziale" name="dataIniziale" placeholder="data" <?php echo 'min=' . $date . '' ?> required>


        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6 ">
          <label for="descrizione"> descrizione:</label> <br>
          <textArea id="note" placeholder="note" name="note" required rows="3" class="form-control">
                    </textArea>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <label>‎</label>
          <input class="form-control" type="reset" name="cancella" value="Annulla">
        </div>
        <div class="form-group col-md-4 offset-md-2">
          <label for="">‎</label>
          <input type="submit" value="registra" class="form-control" id="registrazione">
        </div>
      </div>
      <script src="//code.jquery.com/jquery.js"></script>
      <script src="./bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>


</body>

</html>