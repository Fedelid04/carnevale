<?php
function creaTabella($sql, $stmt, $vetIndex)
{
    $sql = explode("FROM", $sql)[0];
    $sql = removeSpaces($sql);
    $vetCampi = getCampi($sql);

    // print_r($vetCampi);
    echo '<table border = "1" id="table">';
    
    echo getHeader($vetCampi, $vetIndex);
   
    echo '<tbody id="myTable">';
    printTable($stmt, $vetCampi, $vetIndex);
    echo '</tbody>';
    echo "</table>";
}

function creaTabella2($sql, $stmt, $vetIndex)
{
    $sql = explode("FROM", $sql)[0];
    $sql = removeSpaces($sql);
    $vetCampi = getCampi($sql);

    // print_r($vetCampi);
    echo '<table border = "1" id="table">';
    
    echo getHeader2($vetCampi, $vetIndex);
   
    echo '<tbody id="myTable">';
    printTable($stmt, $vetCampi, $vetIndex);
    echo '</tbody>';
    echo "</table>";
}

#creo un vettore che contiene i campi della query

function getCampi($sql)
{
    $vetData = explode(",", $sql);
    $vetCampi = [];
    for ($i = 0; $i < count($vetData); $i++) {
        # code...
        # predno solo il campo e non la tabella di provenienza
        $vetCampi[$i] = explode(".", $vetData[$i])[1];
    }
    return $vetCampi;
}

# rimuove gli spazi per poter poi isolare i campi della query

function removeSpaces($sql)
{

    $string = "";
    for ($i = 7; $i < strlen($sql); $i++) {
        # code...
        if ($sql[$i] != " ") {
            $string .= $sql[$i];
        }
    }
    $string = rtrim($string);
    return $string;
}

# ritorna l'header da stampare

function getHeader($vetCampi, $vetIndex)
{
    $string = "<thead>";
    $string .= "<tr>";

    for ($i = 0; $i < count($vetCampi); $i++) {
        # code...
        for ($j = 0; $j < count($vetIndex); $j++) {
            # code...
            if ($i == $vetIndex[$j]) {
                # code...
                $string .= "<td>";
              
                $string .= $vetCampi[$i];
                $string .= "</td>";
            }
        }
    }

    $string .= "</tr>";
    $string .= "</thead>";
    return $string;
}

function getHeader2($vetCampi, $vetIndex)
{
   
    $string = "<tr>";

    for ($i = 0; $i < count($vetCampi); $i++) {
        # code...
        for ($j = 0; $j < count($vetIndex); $j++) {
            # code...
            if ($i == $vetIndex[$j]) {
                # code...
                $string .= "<td>";
              
                $string .= $vetCampi[$i];
                $string .= "</td>";
            }
        }
    }

    $string .= "</tr>";
    
    return $string;
}

function printTable($stmt, $vetCampi, $vetIndex)
{
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        for ($i = 0; $i < count($vetCampi); $i++) {
            # code...
            for ($j = 0; $j < count($vetIndex); $j++) {
                # code...
                if ($i == $vetIndex[$j]) {
                    # code...
                    if ($row[$vetCampi[$i]] == NULL) {
                        # code...
                        echo "<td style='background: indianred;'>";
                        echo "N/A";
                        echo "</td>";
                    }elseif ($row[$vetCampi[$i]] == "si") {
                        echo "<td style='background: lightgreen;'>";
                        echo $row[$vetCampi[$i]];
                        echo "</td>";
                    }elseif ($row[$vetCampi[$i]] == "no") {
                        echo "<td style='background: indianred;'>";
                        echo $row[$vetCampi[$i]];
                        echo "</td>";
                    } else {
                        echo "<td>";
                        echo $row[$vetCampi[$i]];
                        echo "</td>";
                    }
                }
            }
        }
        echo "</tr>";
    }
}