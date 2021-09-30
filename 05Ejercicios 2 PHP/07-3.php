<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Document</title>

        <style >

            table, td, th{

                border: 1px solid black;

            }

        </style>

    </head>

    <body>

        <h2> TABLERO DE COLORES </h2>

        <table>

            <?php

                $colorR=random_int(1,255);
                $colorG=random_int(1,255);
                $colorB=random_int(1,255);
                $contadorDegradado=0;

                for($i=0;$i<10;$i++){

                    echo"<tr></tr>";

                    for($j=0;$j<10;$j++){
                    
                        echo"<td style =\" height:40px; width:40px; background-color:rgb(".($colorR+$contadorDegradado).",".($colorG+$contadorDegradado).",".($colorB+$contadorDegradado)."); \"></td>";
                    
                        $contadorDegradado++;
            
                    }

                    $contadorDegradado++;

                }

            ?>

        </table>
        
    </body>

</html>