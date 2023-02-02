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
  <div class="container-fluid">
    <a href="../home.php" class="btn btn-info" role="button">Home</a>
  </div>
  <div class="container">
    <h3 style="text-align: center;">Aggiungi Sarta</h3>
    <form action="registerSarta.php" method="post" name="form" id="form" class="">
      <div class="form-row">
        <div class="form-group col-md-4 mx-auto">
          <label class="container text-center" for="codiceSarta">nome: </label>
          <input class="form-control" type="text" id="codiceSarta" placeholder="nome" name="nome" maxlength="50"
            required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4 mx-auto">
          <label class="container text-center" for="nome">cognome:</label>
          <input class="form-control" type="text" id="nome" placeholder="cognome" name="cognome" maxlength="50"
            required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4 mx-auto">
          <label class="container text-center" for="costo">costo all'ora:</label>
          <input class="form-control" type="number" min="0" id="costo" placeholder="costo" name="costo" maxlength="50"
            required>
        </div>
      </div>
      <div class="form-row">               
        <div class="form-group col-md-2 mx-auto">
          <input class="form-control" type="submit" value="registra" class="form-control" id="registrazione">
        </div>
      </div>
      <script src="//code.jquery.com/jquery.js"></script>
      <script src="./bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>