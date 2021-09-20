<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <h1>Details</h1>
    <?php

    require 'config.php';

    $id = $_GET['id'];
    // echo "ID van het agenda-item is: " . $id . "<br/>";

    $query = "SELECT * FROM verprog1_agenda WHERE ID = " . $id;

    $result = mysqli_query($mysqli, $query);

    if(mysqli_num_rows($result) > 0)
    {
        $item = mysqli_fetch_assoc($result);
        echo "<table border='1px'>";
        echo "<tr><th>Onderwerp</th><th>Inhoud</th><th>Begindatum</th><th>Einddatum</th><th>Prioritet</th><th>Status</th></tr>";

        echo "<td>" . $item['Onderwerp'] . "</td>";
        echo "<td>" . $item['Inhoud'] . "</td>";
        echo "<td>" . $item['Begindatum'] . "</td>";
        echo "<td>" . $item['Einddatum'] . "</td>";
        echo "<td>" . $item['Prioriteit'] . "</td>";
        echo "<td>" . $item['Status'] . "</td>";

        echo "</table>";
    }
    else
    {
        echo "Er is geen record met ID: " . $id . "<br/>";

    }

    echo "<br><a class='anderePagina' href='toonagenda.php'>OVERZICHT</a><br>";
    echo "<a class='anderePagina'  href='verwijder.php?id=" . $item['ID'] . "&onderwerp=" . $item['Onderwerp'] . "'>Verwijderen</a><br>";
    echo "<a class='anderePagina'  href='pasaan.php?id=" . $item['ID'] . "'>Pas aan</a>";
    ?>

</body>
</html>