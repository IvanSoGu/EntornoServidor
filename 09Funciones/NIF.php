<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> 01 Funciones </title>

        <?php
        
            $Formulario = 
            
            '<form action="NIF.php" method="post">

                <label> Introduce tu DNI/NIF </label>
                <input type="number" name="NIF">

                <input type="submit" value="Obtener letra">

            </form>';

            function calcularLetraNIF($NIF){

                $letrasNIF = [

                    "T",
                    "R",
                    "W",
                    "A",
                    "G",
                    "M",
                    "Y",
                    "F",
                    "P",
                    "D",
                    "X",
                    "B",
                    "N",
                    "J",
                    "Z",
                    "S",
                    "Q",
                    "V",
                    "H",
                    "L",
                    "C",
                    "K",
                    "W"

                ];

                $Modulo = $NIF%23;

                return  $letrasNIF[$Modulo];

            }

        ?>

    </head>

    <body>

        <?php

            if($_SERVER["REQUEST_METHOD"]=="GET"){

                echo($Formulario);
                

            }else{

                $NIF    =  $_REQUEST['NIF'];
                $letra  =  calcularLetraNIF($NIF);

                echo("La letra asignada es: $letra <br> El NIF completo es $NIF $letra");

            }

        ?>
        
    </body>

</html>