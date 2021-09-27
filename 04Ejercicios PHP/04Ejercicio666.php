<!DOCTYPE html>

<html lang="es">

    <head>
   
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio04</title>      
   
    </head>
   
    <body>

        <?php

            $NG;//Numero generado
            $C6=0;//Contador de 6
            $CN; //Contador numeros generados
            $TI=microtime(true);
            $T;

            do{

                $NG=random_int(1,9);
                $CN++;

                if($NG==6){

                    $C6++;

                }else{

                    $C6=0;

                }

            } while($C6<3);

            echo("El nº de numeros generados es: $CN.</br>");
            $T= microtime(true)-$TI;
            echo("Y el tiempo que ha tardado es: $T");
            
        ?>
   
    </body>

</html>