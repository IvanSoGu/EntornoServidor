<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> 06 Arrays </title>

    </head>

    <body>

        <?php

            require_once "infopaises.php";

            $paisMaxPoblacion;
            $maxPoblacion=0;

            foreach ($paises as $pais => $contenido) {
                
                if($contenido["Poblacion"]>$maxPoblacion){

                    $paisMaxPoblacion=$pais;
                    $maxPoblacion=$contenido["Poblacion"];

                }

            }

            var_dump($ciudades[$paisMaxPoblacion]);

        ?>
    
    </body>

</html>