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

    $sql = "SELECT * FROM attori WHERE anno_nascita BETWEEN ? AND ? ORDER BY $campo ASC";

    $result = $stmt->get_result();
    $attori = $result->fetch_all(MYSQLI_ASSOC);

    // Controllo se ci sono risultati
    if (count($attori) > 0) {
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

        foreach ($attori as $attore) {
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
  
    $conn->close();
?>
    
</body>
</html>