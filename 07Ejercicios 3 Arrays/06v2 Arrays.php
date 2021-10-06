<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> 06 Arrays V2 </title>

    </head>

    <body>

        <?php

            require_once "infopaises.php";

            function comparaPaises($pais1,$pais2){

                return ($pais1["Poblacion"] - $pais2["Poblacion"]);

            }

            usort($paises, "comparaPaises");

            $clavePaisMaxPoblacion = array_key_last($paises);

            $capitalPaisMaxPoblacion = $paises[$clavePaisMaxPoblacion]["Capital"];
            
            echo"La capital es $capitalPaisMaxPoblacion </br>";

            foreach ($ciudades as $key => $value) {
                
                if($value[0]==$capitalPaisMaxPoblacion){

                    echo"El pais con mas población es $key</br>";

                    var_dump($value);

                }

            }

        ?>
    
    </body>

</html>