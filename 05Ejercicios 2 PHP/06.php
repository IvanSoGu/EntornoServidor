<!DOCTYPE html>

<html lang="es">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> 06 </title>

    </head>

    <body>

        <code>
        
            <?php

                $numeroAleatorio=random_int(1,10);
                echo("$numeroAleatorio </br></br>");

                for($j=1;$j<=2;$j++){

                    for($i=0;$i<$numeroAleatorio;$i++){

                        echo("**** ");
        
                    }

                    echo("</br>");

                }

                for($j=0;$j<$numeroAleatorio;$j++){

                    echo("*****");

                }

            ?>

        </code>

    </body>

</html>