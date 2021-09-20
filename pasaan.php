<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pas aan</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Pas aan</h1>
        <?php

            require 'config.php';

            $id = $_GET['id'];
      
            // echo "ID van het agenda-item is: " . $id . "<br/>";

            $query = "SELECT * FROM verprog1_agenda WHERE ID = " . $id;

            $result = mysqli_query($mysqli, $query);

            if(mysqli_num_rows($result) > 0)
            {
                $item = mysqli_fetch_assoc($result);
        ?>

        <form class="pasaan" name="aanpasFormulier" method="post" action="pasaanVerwerk.php">
            <input type="hidden" name="id" value="<?php echo $item['ID']; ?>"/>
                <table class="pasaan">
                    <tr>
                        <td class="header">Onderwerp:</td>
                        <td><input type="text" name="Onderwerp" required value="<?php echo $item['Onderwerp']; ?>"></td>
                    </tr>
                    <tr>
                    <td class="header">Inhoud:</td>
                    <td><input type="text" name="Inhoud" required value="<?php echo $item['Inhoud']; ?>"></td>
                </tr>
                <tr>
                    <td class="header">Begindatum:</td>
                    <td><input type="date" name="Begindatum" required value="<?php echo $item['Begindatum']; ?>"></td>
                </tr>
                <tr>
                    <td class="header">Einddatum:</td>
                    <td><input type="date" name="Einddatum" required value="<?php echo $item['Einddatum']; ?>"></td>
                </tr>
                <tr>
                    <td class="header">Prioriteit:</td>
                    <td> <input type="number" name="Prioriteit" min="1" max="5" required value="<?php echo $item['Prioriteit']; ?>"></td>
                </tr>
                <tr>
                    <td class="header">Status:</td>
                    <td>
                        <select name="Status">
                
                        <?php
                        if($item['Status'] == "n"){ ?>
                            <option value="<?php echo $item['Status']; ?>" selected>Niet begonnen</option>
                            <option value="<?php echo $item['Status']; ?>">Bezig</option>
                            <option value="<?php echo $item['Status']; ?>" >Afgerond</option>
                            <?php
                        }
                        else if($item['Status'] == "b"){ ?>
                            <option value="<?php echo $item['Status']; ?>" selected>Bezig</option>
                            <option value="<?php echo $item['Status']; ?>" >Niet begonnen</option>
                            <option value="<?php echo $item['Status']; ?>" >Afgerond</option>
                            <?php
                        }
                        else if($item['Status'] == "a"){ ?>
                            <option value="<?php echo $item['Status']; ?>" selected>Afgerond</option>
                            <option value="<?php echo $item['Status']; ?>" >Bezig</option>
                            <option value="<?php echo $item['Status']; ?>" >Niet begonnen</option>
                        <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td id="hidden"> </td>
                    <td id="verzend"><input type="submit" name="verzend" value="Item aanpassen"></td>
                </tr>
                </table>
        </form>

        <?php
            }
            else
            {
                echo "Er is geen record met ID: " . $id . "<br/>";
            }

            echo "<br><a class='anderePagina' href='toonagenda.php'>OVERZICHT</a>";
        ?>

    </body>
</html>


