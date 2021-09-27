<!DOCTYPE html>

<html lang="es">

    <head>
   
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio06</title> 
   
    </head>
   
    <body>

        </br></br>
        
        <table>

            <tr>

                <th> OPERACIÓN </th>
                <th> RESULTADO </th>

            </tr>

            <?php 

                $n=random_int(1,10);

                for($i=1;$i<=10;$i++){

                    $r=$n*$i;

                    echo("<tr> <td> $n * $i </td> <td> $r </td> </tr>");
                    
                }

            ?>

        </table>
   
    </body>

</html>