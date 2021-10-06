<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> 08 Arrays </title>

        <style type="text/css">

            table, th, td {

                border: 1px solid black;
            
            }
        
        </style>

        <?php

            require_once "infopaises.php";

        ?>

    </head>

    <body>

        <table>

            <tr>

                <th> Pais </th>
                <th> Capital </th>
                <th> Población </th>
                <th> Ciudades </th>

            </tr>

            <?php

                foreach ($paises as $pais => $info) {

                    echo('<tr>

                        <td>$pais</td>
                        <td>'.$info["Capital"].'</td>
                        <td>'.$info["Poblacion"].'</td>
                        <td>'); var_dump($ciudades[$pais]); echo('</td>
                    
                    </tr>');
                    
                }

            ?>

        </table>
        
    </body>

</html>