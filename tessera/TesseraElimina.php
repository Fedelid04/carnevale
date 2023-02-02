<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registrazione Socio</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../bootstrap-4.0.0-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" href="../css/navBar.css">
  <link rel="stylesheet" href="../css/NAVBAR2.css">
</head>

<body>
<?php
  include 'navbarTessera.php';
  ?>
  <div class="container" id="FormElimina">
    <h1 style="text-align: center;">ELIMINA TESSERA</h1>
    <form action="eliminaTessera.php" method="post" name="form" id="form" class="">
      <div class="form-row">
        <div class="form-group col-sm-6 mx-auto" style="text-align: center;">
          <label for="codTessera">Codice tessera:</label>

          <select id="nTessera" class="form-control" name="numeroTessera" required>
            <?php

            try {
              include "../conn.php";
              $sql = "SELECT  * FROM tessera where attiva='si'";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo ' <option value='.$row['codTessera'].'>'.$row['codTessera'].'</option>';
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
          <input type="submit" value="Elimina" class="form-control" id="registrazione">
        </div>
      </div>
    </form>
  </div>
  </div>
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
  <script src="../bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>