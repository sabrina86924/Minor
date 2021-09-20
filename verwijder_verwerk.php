<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verwijder verwerk</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
require 'config.php';

$id = $_GET['id'];

if($id != ""){

    echo "Item met ID " . $id . " wordt verwijderd....<br/>";
    
    $query = "DELETE FROM verprog1_agenda WHERE ID = " . $id;
  
    $result = mysqli_query($mysqli, $query);

    if($result)
    {
        header("Location: https://86924.ict-lab.nl/verprog1/toonagenda.php");
        exit();
        //echo "Het item is verwijderd<br/>";
    }

    else
    {
        echo "FOUT bij verwijderen<br/>";
        echo $query . "<br/>";
        echo mysqli_error($mysqli);
    }
}
else
{
    echo "Geen ID gevonden...<br/>";
}


echo "<a class='anderePagina' href='toonagenda.php'>OVERZICHT</a>";

?>
    
</body>
</html>




