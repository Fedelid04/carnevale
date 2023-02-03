<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <link href="../bootstrap-4.0.0-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="../css/navBar.css">
    <title>report pagamenti</title>
</head>

<body>
    <?php
    include 'navbarPagamenti.php';
    ?>
    <div class="container" id="anteprima">
        <form action="aggiungiPagamento.php" method="post">
            <h1>AGGIUNGI PAGAMENTO</h1>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="">Codice socio:</label>
                    <select class="form-control" name="codSocio" id="">
                        <?php
                        try {
                            include  "../conn.php";
                            $sql = "SELECT * from socio";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo ' <option value=' . $row['codSocio'] . '>' . $row['codSocio'] . ' nome: ' . $row['nome'] . '</option>';
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
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="">Codice tessera:</label>
                    <select class="form-control" name="codTessera" id="">
                        <?php
                        try {
                            include  "../conn.php";
                            $sql = "SELECT * from tessera";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo ' <option value=' . $row['codTessera'] . '>' . $row['codTessera'] . '</option>';
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
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="annnoP">anno pagato:</label>
                    <?php
                    date_default_timezone_get();
                    $date = date('Y', time());
                    echo '<input class="form-control" type="number" required id="annoP" name="annoP" placeholder="anno" min="1920" max=' . $date . '>';
                    ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="annnoP">numRicevuta:</label>
                    <input class="form-control" type="text" id="quota" name="ricevuta" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <input class="form-control" type="submit" value="Registra">
                </div>
            </div>
        </form>
        <br>
        <form action="aggiungiPagamento.php" method="post">
            <h1>ELIMINA PAGAMENTO</h1>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="">Anno Pagamento:</label>
                    <select class="form-control" name="anno" id="">
                        <?php
                        try {
                            include  "../conn.php";
                            $sql = "SELECT DISTINCT anno FROM pagamento_tessera ORDER BY anno";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo '<option value=' . $row['anno'] . '>' . $row['anno'] . '</option>';
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
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="">Codice tessera:</label>
                    <select class="form-control" name="codTessera" id="">
                        <?php
                        try {
                            include  "../conn.php";
                            $sql = "SELECT DISTINCT codTessera from pagamento_tessera";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo ' <option value=' . $row['codTessera'] . '>' . $row['codTessera'] . '</option>';
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
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <input class="form-control" type="submit" value="Elimina">
                </div>
            </div>
        </form>
    </div>
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="../bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>