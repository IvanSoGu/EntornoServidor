<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> 05 </title>

    </head>

    <body>

        <?php

            function generarHTMLTable ( $filas, $columnas, $borde,$contenido){

                echo "<table border=\"$borde\">";

                for ($fil=1;$fil<=$filas;$fil++){

                    echo "<tr> ";

                    for($col=1;$col<=$columnas;$col++){

                        echo "<td> $contenido </td>";

                    }
                    
                    echo "</tr>";

                }

                echo "</table>";

            }

        ?>

        <?php 
        
            generarHTMLTable(5,2,1,"Que hambre");

        ?>
        
    </body>

</html>