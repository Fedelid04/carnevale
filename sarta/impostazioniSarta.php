
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registrazione Sarta</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/formStyle.css">
</head>

<body>

  <div class="sidebar close">

    <div class="logo-details">
      <a href="home.php"><i class='bx bx-mask home'>
          <h6 style="color: white; font-size: x-small; position: relative; bottom: 32px;">HOME</h6>
        </i></a>
      <span class="logo_name">
        carnevale
      </span>


    </div>

    <ul class="nav-links">


      <li>

      <li>

        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">sezione soci</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-street-view'></i>
            <span class="link_name">sezione soci</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">sezione soci</a></li>
          <li><a href="registraSocio.php">registrazione socio</a></li>
          <li><a href="impostazioniSocio.php">modifica socio</a></li>
          <li><a href="SocioElimina.php">elimina socio</a></li>
          <li><a href="reportSocio.php">report socio</a></li>

        </ul>
      </li>

      <br>

      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bxs-group'></i>
            <span class="link_name">sezione figuranti</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">sezione figuranti</a></li>
          <li><a href="gestioneFiguranti.php">aggiungi figurante </a></li>
          <li><a href="impostazioniFigurante.php">modifica figurante</a></li>
          <li><a href="figuranteElimina.php">elimina figurante</a></li>
        </ul>
      </li>
      <br>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-line-chart'></i>
            <span class="link_name">sezione report</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">sezione report</a></li>
          <li><a href="reportSocio.php">report soci </a></li>
          <li><a href="reportTessere.php">report tessere</a></li>
          <li><a href="reportCariche.php">report cariche </a></li>
          <li><a href="reportMaschere.php">report maschere</a></li>
          <li><a href="reportEventi.php">report eventi </a></li>
          <li><a href="reportDepositi.php">report depositi</a></li>

        </ul>
      </li>
      <br>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bxs-id-card'></i>
            <span class="link_name">sezione tessere</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">sezione tessera</a></li>
          <li><a href="reporttessere.php">report tessera</a></li>
          <li><a href="aggiungitessera.php">aggiungi tessera</a></li>
          <li><a href="tesseraelimina.php">elimina tessera</a></li>
          <li><a href="gestionepagamenti.php">gestione pagamento tessera</a></li>
        </ul>
      </li>
      <br>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bxs-face-mask'></i>
            <span class="link_name">sezione maschere</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">sezione maschere</a></li>
          <li><a href="reportMaschere.php">report maschere</a></li>
          <li><a href="aggiungiMaschera.php">aggiungi maschera</a></li>
          <li><a href="mascheraElimina.php">elimina maschera</a></li>
          <li><a href="gestioneRiparazioni.php">gestione riparazione maschera</a></li>
          <li><a href="aggiungiSarta.php">aggiungi sarta</a></li>
          <li><a href="SartaElimina.php">elimina sarta</a></li>
          <li><a href="impostazioniMaschera.php">modifica maschera</a></li>
          <li><a href="aggiungiImmagine.php">aggiungi immagine</a></li>
          <li><a href="galleriaMaschere.php">galleria maschere</a></li>
        </ul>
      </li>
      <br>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-briefcase-alt'></i>
            <span class="link_name">sezione cariche</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">sezione cariche</a></li>
          <li><a href="reportCariche.php">report cariche</a></li>
          <li><a href="aggiungiCarica.php">aggiungi carica</a></li>
          <li><a href="CaricaElimina.php">elimina carica</a></li>
        </ul>
      </li>
      <br>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-calendar-event'></i>
            <span class="link_name">sezione eventi</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">sezione eventi</a></li>
          <li><a href="reportEventi.php">report eventi</a></li>
          <li><a href="aggiungiEvento.php">aggiungi evento</a></li>
          <li><a href="aggiungiPartecipazione.php">aggiungi partecipazione evento</a></li>
          <li><a href="tabellaGenerale.php">gestione eventi</a></li>
          <li><a href="EventoElimina.php">elimina evento</a></li>
        </ul>
      </li>
      <br>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-building-house'></i>
            <span class="link_name">sezione depositi</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">sezione depositi</a></li>
          <li><a href="reportDepositi.php">report depositi</a></li>
          <li><a href="aggiungiDeposito.php">aggiungi deposito</a></li>
          <li><a href="DepositoElimina.php">elimina deposito</a></li>
        </ul>
      </li>



      </li>
      <li>
        <i class='bx bxs-chevrons-left'></i>


        <ul class="sub-menu">
          <li><a class="link_name" href="javascript:history.go(-1)" onMouseOver="self.status=document.referrer;return true">pagina precedente</a></li>
        </ul>
      </li>
      <li>
        <i class='bx bxs-chevrons-right'></i>
        <ul class="sub-menu">
          <li><a class="link_name" href="javascript:history.go(1)" onMouseOver="self.status=document.referrer;return true">pagina avanti</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <section class="home-section">

    <div class="home-content">
      <i class='bx bx-menu'></i>


      <div style="transform: translate(85px); ">

        <form style="height: 1400px; color:black; transform: translateY(340px); ">
          <fieldset class="fieldsetSocioRegistrazione" style="width: 1220px; color:black;">
            <legend style=" font-weight: 500; color:black; background:white; width:490px;">IMPOSTAZIONI GESTIONE SARTE</legend>
            <br>
            <p>seleziona sarta da modificare/eliminare</p>

            <div class='ricerca'>
              <span class='clienti'>lista sarte</span>
              <input type='text' name='myInput' class='searchBar' id="myInput" onkeyup="myFunction()" placeholder="cerca clienti..">
              <div class="lente">
                <ion-icon name="search-outline" id="lenteIcon"></ion-icon>
              </div>
            </div>

            <br>
            <?php

            include  "conn.php";


            try {


              $sql = "SELECT * FROM sarta";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
            ?>
              <ul style=' overflow:  auto;'>
                <div class="bars">
                <?php
                echo '<table id="myTable"> ';
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                  echo '<tr>';

                  echo '<td>';
                  echo '<td><a class="modificaSocio" href="modificaSarta.php?codiceSarta=' . $row['codiceSarta'] . '">' . $row['nomeSarta'] . ' (' . $row['codiceSarta'] . ')</a>';

                  echo ' <a class="eliminaSocio" href="SartaElimina.php?codiceSarta=' . $row['codiceSarta'] . '"> x </a>';
                  echo ' </td>';

                  echo '</tr>';
                }

                echo '</table> ';
              } catch (PDOException $e) {
                echo "Errore nella query....<br/>";
                echo $e->getMessage() . "<br/>";
                die();
              } finally {
                $conn = null;
              }

                ?>
                </div>
              </ul>
              <section style=" position: absolute; left: -63vh; bottom: -2.5vh;  padding-bottom: -25px;">
                <?php
                echo '<button class="bottoneRegistraImp" style="background: black; border-color: black;"><a href="aggiungiSarta.php">REGISTRAZIONE SARTA</a></button>';
                ?>
              </section>


          </fieldset>
        </form>

      </div>






    </div>
  </section>
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
    $(document).ready(function() {
      $('#dtBasicExample').DataTable();
      $('.dataTables_length').addClass('bs-select');
    });




    function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
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

</body>

</html>