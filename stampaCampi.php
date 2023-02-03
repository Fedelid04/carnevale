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

function creaTabella2($tabella , $codSocio)
{
    $sql = "SELECT COLUMN_NAME 
    FROM INFORMATION_SCHEMA.COLUMNS
    WHERE TABLE_NAME = N'" . $tabella . "' AND TABLE_SCHEMA LIKE 'carnevaleFibocchi'";        
    // print_r($vetCampi);
    echo '<table border = "1" id="table">';
    
    echo getHeader2($sql);
   
    echo '<tbody id="myTable">';
    $sql = "select socio.*, figurante.codMaschera as codMaschera , figurante.mascheraRiserva as mascheraRiserva from socio left join figurante ON socio.codSocio = figurante.codSocio where socio.codSocio like '$codSocio'";    
    echo printTable($sql , $tabella);
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

function getHeader2($sql)
{
    include 'conn.php';
    $stmt = $conn->query($sql);
    $string = "<tr>";        
    foreach($stmt as $row){
        $string .="<th>".$row['COLUMN_NAME']."</th>";        
    }
    $string .= "<th>Maschera Principale</th><th>Maschera Riserva</th></tr>";    
    
    return $string;
}

function printTable($sql , $tabella)
{
    include 'conn.php';
    $stmt = $conn->query($sql);    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $query = "SELECT COLUMN_NAME 
    FROM INFORMATION_SCHEMA.COLUMNS
    WHERE TABLE_NAME = N'" . $tabella . "' AND TABLE_SCHEMA LIKE 'carnevaleFibocchi'";        
    $ar = array();
    $stmt = $conn->query($query);
    $i = 0;
    foreach($stmt as $riga){
        $ar[$i] = $riga['COLUMN_NAME'];        
        $i++;
    }
    array_push($ar, "codMaschera", "mascheraRiserva");
        
    $string = "";    
    for ($i = 0; $i < sizeof($row);$i++){        
        $string .= "<td>".$row[$ar[$i]]."</td>";        
    }
    return $string;
}