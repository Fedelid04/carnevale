
<!DOCTYPE html>
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
    <a href="../home.php" class="btn btn-info" role="button">Home</a>
  </div>
  <div class="container">
    <h1>Aggiungi Tessera</h1>
    <form action="registerTessera.php" method="post" name="form" id="form" class="">
      <div class="form-row">
        <div class="form-group col-sm-2">
          <label for="codiceSocio">numero tessera:</label>
          <input type="text" class="form-control" id="numeroTessera" placeholder="numeroTessera" name="numeroTessera" maxlength="50" required>
        </div>
        <div class="form-group col-sm-2">
          <label for="codiceCarica"> note tessera:</label>
          <input type="text" class="form-control" id="tipo" placeholder="note tessera" name="tipo" maxlength="50" required>
        </div>
        <div class="form-group col-md-2">
          <label for="">‎</label>
          <input class="form-control" type="reset" name="cancella" value="Annulla">
        </div>
        <div class="form-group col-md-2">
          <label for="">‎</label>
          <input type="submit" value="Aggiungi" class="form-control" id="registrazione">
        </div>
      </div>
      <?php
      if (isset($_GET['errore'])) {
        $errore = $_GET['errore'];
        if ($error == 1) {
          echo "<div class=container>";
          echo "<h3>Numero Tessera già presente</h3>";
          echo "</div>";
        }
      }
      ?>
      <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
          arrow[i].addEventListener("click", (e) => {
            let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
            arrowParent.classList.toggle("showMenu");
          });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
          sidebar.classList.toggle("close");
        });
      </script>
      <script src="//code.jquery.com/jquery.js"></script>
      <script src="./bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>