<!DOCTYPE html>

<html lang="es">

    <head>
   
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio03</title> 

        <style>

            body{font:monospace;}

        </style>
   
    </head>
   
    <body>

        <code>
 
            <?php

                $npel=random_int(1,9);
           
                for($i=1;$i<=$npel;$i++){

                    for($j=1;$j<=$npel-$i; $j++){

                        echo "&nbsp";

                    }

                    for($g=1;$g<=$i*2-1;$g++){

                        echo "*";

                    }   
                
                    echo "</br>";

                }
            
            ?>
        
        </code>
        
    </body>

</html>