<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verwijder</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
 
    <h1>Verwijder</h1>
    <?php

    require 'config.php';

    $id = $_GET['id'];
    $onderwerp = $_GET['onderwerp'];


    if($id != ""){
       // echo "Verwijder " . $onderwerp . " met ID: " . $id . "<br/>";
        echo "<p>Weet je het zeker dat je " . $onderwerp . " wil verwijderen?</p>";
        echo "<p><a id='ja' href='verwijder_verwerk.php?id={$id}'> JA </a></p><br/>";
    
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
    }
    else
    {
        echo "Geen ID gevonden...<br/>";
    }

    echo "<br><a class='anderePagina' s href='toonagenda.php'>OVERZICHT</a>";

    ?>
    
</body>
</html>