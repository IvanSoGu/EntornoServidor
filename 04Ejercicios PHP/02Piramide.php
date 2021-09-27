<!DOCTYPE html>

<html lang="es">

    <head>
   
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio02</title>     
   
    </head>
   
    <body>

        <?php

            $basepir=random_int(1,9);

            for($i=1;$i<=$basepir;$i++){

                for($j=1;$j<=$i;$j++){
                    
                    if($i%2==0){

                        echo "<span style='color:red'>$i</span>";

                    }

                    if($i%2!=0){

                        echo "<span style='color:blue'>$i</span>";

                    }
                    

                }

                echo "</br>";
                
            }
            
        ?>
   
    </body>

</html>