<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>01</title>

    </head>

    <body>

        <?php

            function ElMayor ($a, $b, &$c=0){

                if ($a==$b){

                    $c=0;

                }else if($a>$b){

                    $c=$a;

                }else{

                    $c=$b;

                }

                return $c;
    
            }

            echo(ElMayor($d=random_int(1,10),$e=random_int(1,10)));

        ?>
        
    </body>

</html>