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
    <a href="../home2.php" class="btn btn-info" role="button">Home</a>
  </div>
  <div class='ricerca' style="text-align:center">
    <h1>Seleziona figurante da modificare</h1>
    <span class='clienti'>lista figuranti</span>
    <input type='text' name='myInput' class='searchBar' id="myInput" onkeyup="myFunction()" placeholder="cerca clienti..">
    <div class="lente">
      <ion-icon name="search-outline" id="lenteIcon"></ion-icon>
    </div>
    <table class="table" id="myTable">
      <tbody>
        <?php
        include "../conn.php";
        try {
          $sql = "SELECT codSocio,uscita FROM figuranti";
          $stmt = $conn->prepare($sql);
          $stmt->execute();
        ?>
        <?php
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr style=text-align:center>';
            echo '<td><button><a class="modificaSocio" href="modificaFigurante.php?codSocio=' . $row['codSocio'] . '&&uscita=' . $row['uscita'] . '"> cod:' . $row['codSocio'] . ' uscita:' . $row['uscita'] . '</button></a>';
            echo '</td>';
            echo '</tr>';
          }
        } catch (PDOException $e) {
          echo "Errore nella query....<br/>";
          echo $e->getMessage() . "<br/>";
          die();
        } finally {
          $conn = null;
        }

        ?>
      </tbody>
    </table>
  </div>


  <script>
    function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
  </script>
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="./bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>