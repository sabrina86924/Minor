<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toevoeg verwerk</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
require 'config.php';

if(isset($_POST['verzend']))
{

    $ond   = $_POST['Onderwerp'];
    $inh   = $_POST['Inhoud'];
    $begin = $_POST['Begindatum'];
    $eind  = $_POST['Einddatum'];
    $prior = $_POST['Prioriteit'];
    $stat  = $_POST['Status'];

    if($ond == "" || $inh == "" || $begin == "" || $eind == "" || $prior == "" || $stat == ""){
        echo "FOUT! Niet alle velden zijn ingevuld.";
    } 
    else{

        $query = "INSERT INTO verprog1_agenda";
        $query .= " (Onderwerp, Inhoud, Begindatum, Einddatum, Prioriteit, Status)";
        $query .= " VALUES ('{$ond}', '{$inh}', '{$begin}', '{$eind}' , {$prior}, '{$stat}')";

        
        $result = mysqli_query($mysqli, $query);

        if($result)
        {
            // echo "Het item is toegevoegd <br/>";
            header("Location: https://86924.ict-lab.nl/verprog1/toonagenda.php");
            exit();
        }
        else
        {
            echo "FOUT bij toevoegen <br/>";
            echo $query . "<br/>";
            echo mysqli_error($mysqli); 
        }
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