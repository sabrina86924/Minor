<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toon agenda</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>CRUD-applicatie</h1>
    <h6>Sorteren is mogelijk door op de headers te klikken!</h6>
    <?php

    require 'config.php';

    $query = "SELECT * FROM verprog1_agenda";

    $result = mysqli_query($mysqli, $query);

    if(!$result){
        echo "<p>FOUT!</p>";
        echo "<p>" . $query . "</p>";
        echo "<p>" . mysqli_error($mysqli) . "</p>";
        exit;
    }


    if(mysqli_num_rows($result) > 0)
    {
        echo "<table border='1px' id='mijnTabel'>";
        echo "<tr><th onclick='tabelSorteren(0)'>Onderwerp</th><th onclick='tabelSorteren(1)'>Inhoud</th><th onclick='tabelSorteren(2)'>Begindatum</th><th onclick='tabelSorteren(3)'>Einddatum</th><th onclick='tabelSorteren(4)'>Prioriteit</th><th>Detail</th><th>Verwijder</th><th>Pas aan</th></tr>";


        while($item = mysqli_fetch_assoc($result))
        {
            echo "<tr>";
                echo "<td>" . $item['Onderwerp'] . "</td>";
                echo "<td>" . $item['Inhoud'] . "</td>";
                echo "<td>" . $item['Begindatum'] . "</td>";
                echo "<td>" . $item['Einddatum'] . "</td>";
                echo "<td>" . $item['Prioriteit'] . "</td>";
                echo "<td><a href='detail.php?id=" . $item['ID'] . "'>Detail</a></td>";
                echo "<td><a href='verwijder.php?id=" . $item['ID'] . "&onderwerp=" . $item['Onderwerp'] . "'>Verwijder</a></td>";
                echo "<td><a href='pasaan.php?id=" . $item['ID'] . "'>Pas aan</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    }
    else{
        echo "<p>Geen items gevonden!</p>";
    }
    echo "<br><a class='anderePagina' href='toevoegForm.html'>Nieuwe taak toevoegen!</a>";
    echo "<p id='datum'></p>"

    ?>
    <script src="js/script.js"></script>
</body>
</html>