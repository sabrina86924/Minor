<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pas aan verwerk</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php

require 'config.php';

if(isset($_POST['verzend']))
{
   
    $id    = $_POST['id'];
    $ond   = $_POST['Onderwerp'];
    $inh   = $_POST['Inhoud'];
    $begin = $_POST['Begindatum'];
    $eind  = $_POST['Einddatum'];
    $prior = $_POST['Prioriteit'];
    $stat  = $_POST['Status'];

    $query = "UPDATE verprog1_agenda";
    $query .= " SET Onderwerp = '{$ond}', Inhoud = '{$inh}', Begindatum = '{$begin}',";
    $query .= " Einddatum = '{$eind}', Prioriteit = {$prior}, Status = '{$stat}'";
    $query .= " WHERE ID = {$id}";
    
    $result = mysqli_query($mysqli, $query);

    if($result)
    {
       // echo "Het item is aangepast<br/>";
        header("Location: https://86924.ict-lab.nl/verprog1/toonagenda.php");
        exit();
    }
    else
    {
        echo "FOUT bij aanpassen <br/>";
        echo $query . "<br/>";
        echo mysqli_error($mysqli); 
    }

    echo "<a class='anderePagina' href='toonagenda.php'>OVERZICHT</a>";
}
else
{
    echo "Het formulier is niet (goed) verstuurd <br/>";
}
  
?>
    
</body>
</html>