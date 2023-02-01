
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/generaleStyle.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js">
  </script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="sidebar close">

    <div class="logo-details">

      <a href="home.php"><i class='bx bx-mask'></i></a>
      <span class="logo_name">
        carnevale
      </span>


    </div>

    <ul class="nav-links">
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

      </li>
    </ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu'></i>
      <span class="text">GESTIONE CARNEVALE</span>

      <section class='tabelleLog' style="transform: translateY(400px); height: 600px;">
        <section class="container">

          <?php
          include("stampaCampiGenerale.php");

          try {
            include "conn.php";


            $sql = "SELECT figuranti.codSocio,  figuranti.uscita,  figuranti.mascheraBase,  
                    figuranti.mascheraRecupero,  figuranti.uscitaEsterna  FROM figuranti ORDER BY codSocio ASC;
                    
                     ";

            $stmt = $conn->prepare($sql);
            $stmt->execute();


            $totale = $stmt->rowCount();




            echo '<div class="spostamentoReportY">';
            echo '<div class="spostamentoReport">';
            echo "<div class='nomeS' style='width: 300px;'>report generale figuranti</div>";

            echo "<div class='reportList' style='width: 1300px;'>";
            echo '<form method="post" >';

            creaTabella($sql, $stmt, [0, 1, 2, 3, 4]);

            echo "<div style='transform: translateY(-505px)'>
                    <div style='transform: translateX(-520px)'>";
            echo "<div class='nomeSocieta' style='
                    transform: translateX(850px); width: 200px;'>";
            //  echo "<input type='submit' style=' background: blue; color:white;' value='registra' name='submit' id='submit'>";
            echo "</div>";
            echo "</div>";
            echo "</div>";

            echo "<div style='transform: translateY(-535px)'>
                    <div style='transform: translateX(-820px)'>";
            echo "<div  style='
                    transform: translateX(850px); width: 200px;'>";

            echo ' <select id="dataEvento" style="transform: translateX(220px); width: 200px;" name="dataEvento" required>
                 ';


            try {
              $hostname = "localhost";
              $dbname = "carnevale";
              $user = "root";
              $pass = "";
              $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);



              $sql = "SELECT * FROM evento";
              $stmt = $conn->prepare($sql);
              $stmt->execute();


              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo ' <option value=' . $row['dataEvento'] . '>' . $row['dataEvento'] . ' nome: ' . $row['descrizione'] . '
                    
                      
                    ';
              }
            } catch (PDOException $e) {
              echo "Errore nella query....<br/>";
              echo $e->getMessage() . "<br/>";
              die();
            } finally {
              $conn = null;
            }


            echo '  </select>';
            echo "</div>";
            echo "</div>";
            echo "</div>";

            echo '</form>';
            echo "</div>";
            echo "</div>";
            echo "</div>";
          } catch (PDOException $e) {
            echo "Errore nella query....<br/>";
            echo $e->getMessage() . "<br/>";
            die();
          } finally {
            $conn = null;
          }




          echo "<div style='transform: translateY(-150px)'>";
          echo "<div class='nomeSocieta' style='
                    transform: translateX(850px); background: darkgreen; width: 200px;'>";
          echo "<a style='color:white;' id='bottone'>stampa tabella <i class='bx bx-download'></i></a>";
          echo "</div>";
          echo "</div>"



          ?>
        </section>
      </section>


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
  </script>
</body>


<script>
  $(document).ready(function() {
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {

        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });





  // var $chk = $("[name='check[]']");
  // // bind change event handler
  // $chk.change(function() {
  //   $chk2
  //     // remove current element
  //     .not(this)
  //     // filter out element with same value
  //    // .filter('[value="' + this.value + '"]')
  //     // update disabled property based on the checked property
  //     .prop('disabled', this.checked);
  // })


  // var $chk2 = $("[name='check2[]']");
  // // bind change event handler
  // $chk2.change(function() {
  //   $chk
  //     // remove current element
  //     .not(this)
  //     // filter out element with same value
  //     //.filter('[value="' + this.value + '"]')
  //     // update disabled property based on the checked property
  //     .prop('disabled', this.checked);
  // })
  var $chk = $("[name='check[]']");
  var $chk2 = $("[name='check2[]']");

  $chk.change(function() {
    // Traverse the DOM to get associated child checkbox
    var $child = $(this).closest('tr').find($chk2);

    // Update child state based on checked status
    $child.prop('disabled', this.checked);
  });

  $chk2.change(function() {
    // Traverse the DOM to get associated child checkbox
    var $child = $(this).closest('tr').find($chk);

    // Update child state based on checked status
    $child.prop('disabled', this.checked);
  });



  var $chk = $("[name='check[]']");
  // bind change event handler
  $chk.change(function() {
    $chk2
      // remove current element
      .not(this)
      // filter out element with same value
      .filter('[value="' + this.value + '"]')
      // update disabled property based on the checked property
      .prop('disabled', this.checked);
  })


  var $chk2 = $("[name='check2[]']");
  // bind change event handler
  $chk2.change(function() {
    $chk
      // remove current element
      .not(this)
      // filter out element with same value
      .filter('[value="' + this.value + '"]')
      // update disabled property based on the checked property
      .prop('disabled', this.checked);
  })


  let data = document.getElementById('dataEvento');

  let valori = "";
  valori += '"' + document.getElementById('dataEvento').value + '"';
  valori += ",";
  valori += "\n";

  function cambio(checkbox) {

    if (checkbox.checked == true) {
      valori += '"' + checkbox.value + '"';
      valori += ",";
      valori += "\n";

      console.log(valori);

    } else if (checkbox.checked == false) {
      valori = valori.replaceAll(checkbox.value, '');
      console.log(valori);


    }


  }

  $("select").on('focus', function() {
    // Store the current value on focus and on change
    previous = this.value;
  }).change(function() {
    // Do something with the previous value after the change
    valori = valori.replaceAll(previous, '');

    // Make sure the previous value is updated
    previous = this.value;
  });

  data.addEventListener('change', function() {

    valori += '"' + document.getElementById('dataEvento').value + '"';
    valori += ",";
    valori += "\n";


    console.log('You selected: ', data.value);
    console.log(valori);

  });



  function provaPHP() {

    $.ajax({
      type: "GET",
      url: 'downloadGenerale.php',
      data: "valori=" + valori,
      error: function() {
        alert("errore");
      },
      success: function(result) {
        axios({
            url: 'downloadGenerale.php',
            method: 'GET',
            responseType: 'blob'
          })
          .then((response) => {
            const url = window.URL
              .createObjectURL(new Blob([result]));
            const link = document.createElement('a');
            link.href = url;
            link.setAttribute('download', 'miofile.xls');
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
          })

      }
    });
  }
  // Collego la funzione al click di un oggetto
  $("#bottone").click(provaPHP);


  $(document).ready(function() {
    $('#table').DataTable({
      "pageLength": 5,
      "order": [
        [0, 'asc']
      ],
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/it-IT.json"
      },
      initComplete: function() {
        this.api()
          .columns([1, 4])
          .every(function() {
            var column = this;
            var select = $('<select style="float:right; width:200px;"><option value=""></option></select>')
              .appendTo($(column.footer()).empty())
              .on('change', function() {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                column.search(val ? '^' + val + '$' : '', true, false).draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function(d, j) {
                select.append('<option value="' + d + '">' + d + '</option>');
              });
          });
      },

    });
  });


  $(document).ready(function() {
    $("#submit").on("submit", function() {
      $.ajax({
        type: "POST",
        url: 'tabellaPartecipazione.php',
        data: "val=" + v,
        error: function() {
          alert("errore");
        },
        success: function(result) {
          alert(result);

        }
      });

    });
  });
</script>





<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</html>