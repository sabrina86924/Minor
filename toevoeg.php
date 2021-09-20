<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toevoeg</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php

//Voeg de database-verbinding toe
require 'config.php';

//Maak een toevoeg-query (let op de verschillende aanhalingstekens!)
$query = "INSERT INTO verprog1_agenda";
$query .= " (Onderwerp, Inhoud, Begindatum, Einddatum, Prioriteit, Status)";
$query .= " VALUES ('Minor algemeen', 'DIGSIGN afmaken', '2021-06-09', '2021-06-09', 2, 'b')";

//Voor de query uit en vang het 'resultaat' op.
//LET OP: Het resultaat geeft aan of het wel of niet is geult ('true'/'false')
$result = mysqli_query($mysqli, $query);

if($result)
{
    echo "Het item is toegevoegd <br/>";
}
else
{
    echo "FOUT bij toevoegen <br/>";
    echo mysqli_error($mysqli); //Tijdelijk (!) de foutmelding tonen
}

//Terug naar het overzicht

echo "<a href='toonagenda.php'>OVERZICHT</a>";

?>
    
</body>
</html>