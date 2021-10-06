<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> 09 Arrays </title>

        <?php

            $temperaturas =  [ 6, 10, 12, 14, 16 ,20 ,25 , 30, 18, 15, 14, 8];
            $meses = ['enero','febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];

            $arrayResultante=[];

            foreach ($temperaturas as $key => $value) {
                
                $arrayResultante[$meses[$key]]=$temperaturas[$key];

            }

            var_dump($arrayResultante);

        ?>

    </head>

    <body>
        
    </body>

</html>