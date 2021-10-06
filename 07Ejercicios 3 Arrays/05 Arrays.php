<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> 05 Arrays </title>

        <?php
        
            $arrayGenerarAleatorios=[];
            $aleatorios;
            $complementario;
            $claveComplementario=random_int(0,5);

            for($i=1;$i<50;$i++){

                $arrayGenerarAleatorios[]= $i;

            }

            $aleatorios=array_rand($arrayGenerarAleatorios,6);

            $complementario=$aleatorios[$claveComplementario];

            unset($aleatorios[$claveComplementario]);

        ?>

    </head>

    <body>

        <table>

            <tr>

                <?php

                foreach ($aleatorios as $value) { 

                    echo "<td>  $value </td>";
                    
                }

                echo "<td> Complementario: $complementario  </td>" ?>

            </tr>

        </table>
        
    </body>

</html>