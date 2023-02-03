<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="sidebarclose" id="sidebar">
        <div class="sidebarclose">
            <div class="container-fluid" style="position: relative; right: 15px; top: 50px">
                <div class="row">
                    <div class="auto bg-dark" style="position: relative; left: 15px;">
                        <div class="d-flex flex-sm-column flex-row flex-nowrap bg-dark align-items-center sticky-top">
                            <h1 style="color:white;">LISTA SOCI</h1>
                            <?php
                            include  "../conn.php";

                            $sql = "SELECT * FROM socio join tessera using(codSocio)";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<a style='padding: 30px 30px' id='socio: " . $row['codSocio'] . " tessera: " . $row['codTessera'] . "' class='opzione cliente " . $row['codSocio'] . "' href='gestionePagamenti.php?>";
                                echo "codSocio=";
                                echo $row['codSocio'];
                                echo "&&nTessera=" . $row['codTessera'] . "'>";
                                echo 'socio:' . $row['codSocio'] . ' tessera:' . $row['codTessera'];
                                /*      if($row['attivita']=="no"){
                                echo ' stato:';
                                
                                echo ' 🔴 ';
                                
                                echo "</a></li>";
                                }else {
                                echo ' stato:';
                                echo ' 🟢 ';
                                
                                } */
                                echo "</a>";
                            }
                            ?>

                            </ul>

                        </div>

                    </div>
</body>

</html>