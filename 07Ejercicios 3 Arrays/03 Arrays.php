<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> 03 Arrays </title>

    </head>

    <body>
        
        <?php

            $periodicos=["El Pais" => "https://elpais.com/", 
            "El Mundo" => "https://www.elmundo.es/", "El ABC" => "https://www.abc.es/", 
            "El Marca" => "https://www.marca.com/", "El 20 minutos" => "https://www.20minutos.es/"];

            foreach ($periodicos as $key => $value) {

                echo("$key : <a href=\"$value\"> enlace </a> </br>");
                
            }

            shuffle($periodicos);

            echo"Hoy recomendamos ";
            var_dump($periodico[array_key_first($periodico)]);

        ?>

    </body>

</html>