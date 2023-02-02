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
    <form action="registerEvento.php" method="POST">
      <div class="form-row">
        <div class="form-group col-md-3 mx-auto">
          <label class="container text-center">Descrizione Evento</label>
          <input type="text" class="form-control" id="name" name="descrizione">
        </div>
        <div class="form-group col-md-3 mx-auto">
          <label class="container text-center">Via</label>
          <input type="text" class="form-control" id="via" name="via">
        </div>
        <div class="form-group col-md-3 mx-auto">
          <label class="container text-center">Citta</label>
          <input type="text" class="form-control" id="citta" name="citta">
        </div>
        <div class="form-group col-md-3 mx-auto">
          <label class="container text-center">Provincia</label>
          <input type="text" class="form-control" id="provincia" name="provincia">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-3 mx-auto">
          <label class="container text-center">Evento esterno</label>
          <select class="form-control" name="esterna" id="esterno">
            <option value="si">Si</option>
            <option value="no">No</option>
          </select>
        </div>
        <div class="form-group col-md-3 mx-auto">
          <label class="container text-center">Inserire data evento</label>
          <input type="date" class="form-control" id="data" name="data">
        </div>
      </div>
      <div class="form-row">

        <div class="form-group col-md-3 mx-auto">
          <label class="container text-center">Requisito</label>
          <input class="form-control" type="text" id="input-field" placeholder="es Arlecchino..." name="requisito">
        </div>
        <div class="form-check col-md-2 mx-auto">
          <br>
          <input class="form-check-input" type="radio" id="text-input" name="input-type" value="text" checked>
          <label class="form-check-label" for="text-input">Tipo Maschera</label>
          <br>
          <input class="form-check-input" type="radio" id="color-input" name="input-type" value="color">
          <label class="form-check-label" for="color-input">Colore</label>
        </div>
        <script>
          var textInput = document.getElementById("text-input");
          var colorInput = document.getElementById("color-input");
          var inputField = document.getElementById("input-field");

          textInput.addEventListener("click", function () {
            inputField.type = "text";
            inputField.value = null;
          });

          colorInput.addEventListener("click", function () {
            inputField.type = "color";
          });
        </script>
        <div class="form-group col-md-3 mx-auto">
          <label class="container text-center">Importo</label>
          <input type="text" class="form-control" id="importo" name="importo">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-2  mx-auto">
          <input type="submit" class="btn btn-success" value="Aggiungi">
        </div>
    </form>
  </div>
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="./bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>