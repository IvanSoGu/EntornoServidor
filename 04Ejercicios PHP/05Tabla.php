<!DOCTYPE html>

<html lang="es">

    <head>
   
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio05</title> 
   
    </head>
   
    <body>

        <?php

            $numero1=random_int(1,10);
            $numero2=random_int(1,10);
            
        ?>

        <p> Primer número: <?php $numero1 ?></br>
        Segundo número: <?php $numero2 ?></br> <p>

        </br></br>
        <table>

            <tr>

                <th> OPERACIÓN </th>
                <th> RESULTADO </th>

            </tr>

            <tr>

                <td> <?php echo"$numero1+$numero2" ?> </td>
                <td> <?php echo"".($numero1+$numero2) ?> </td>

            </tr>

            <tr>

                <td> <?php echo"$numero1-$numero2" ?> </td>
                <td> <?php echo"".($numero1-$numero2) ?> </td>

            </tr>

            <tr>

                <td> <?php echo"$numero1*$numero2" ?> </td>
                <td> <?php echo"".($numero1*$numero2) ?> </td>

            </tr>

            <tr>

                <td> <?php echo"$numero1/$numero2" ?> </td>
                <td> <?php echo"".($numero1/$numero2) ?> </td>

            </tr>

            <tr>

                <td> <?php echo"$numero1%$numero2" ?> </td>
                <td> <?php echo"".($numero1%$numero2) ?> </td>

            </tr>

            <tr>

                <td> <?php echo"$numero1**$numero2" ?> </td>
                <td> <?php echo"".($numero1**$numero2) ?> </td>

            </tr>

        </table>
   
    </body>

</html>