<?php
    include('connessione.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>select attori eta</title>
</head>
<body>

<?php

    $anno_min = $_GET['anno_min'];
    $anno_max = $_GET['anno_max'];
    $campo = $_GET['campo'];

    $sql = "SELECT * FROM attori WHERE anno_nascita BETWEEN $anno_min AND $anno_max ORDER BY $campo ASC";

    $result = mysqli_query($conn, $sql);

    if ($result > 0) {
        echo "<table border='1'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Cognome</th>
                        <th>Anno di Nascita</th>
                        <th>Nazionalità</th>
                    </tr>
                </thead>
                <tbody>";
        while ($attore = $result) {
            echo "<tr>
                    <td>{$attore['id']}</td>
                    <td>{$attore['nome']}</td>
                    <td>{$attore['cognome']}</td>
                    <td>{$attore['anno_nascita']}</td>
                    <td>{$attore['nazionalita']}</td>
                </tr>";
        }
        
        echo "</tbody></table>";
    } else {
        echo "Nessun attore con anno di nascita compreso tra $anno_min e $anno_max.";
    }

    mysqli_close($conn);
?>
    
</body>
</html>