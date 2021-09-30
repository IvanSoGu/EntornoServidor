<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>02</title>

    </head>

    <body>
        
        <?php

            require_once('funcionesvar02.php');

            $num1=random_int(1,10);
            $num2=random_int(1,10);

            echo"</br>El primer número es: $num1</br>";
            echo"El segundo número es: $num2</br></br>";

            echo(suma($num1,$num2));
            echo"</br>";
            echo(resta($num1,$num2));
            echo"</br>";
            echo(multi($num1,$num2));
            echo"</br>";
            echo(div($num1,$num2));
            echo"</br>";
            echo(modulo($num1,$num2));
            echo"</br>";
            echo(potencia($num1,$num2));

        ?>

    </body>

</html>
