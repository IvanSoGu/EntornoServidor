<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> 07 Arrays </title>

    </head>

    <body>
        
        <?php

            require_once "infopaises.php";

            $paisAleatorio1=random_int(0,6);
            $paisAleatorio2=random_int(0,6);

            do{

                $paisAleatorio2=random_int(0,6);

            }while($paisAleatorio2==$paisAleatorio1);

            $contador=0;

            foreach ($paises as $pais => $info) {
                
                if($contador==$paisAleatorio1){

                    $contador=0;

                    $paisAleatorio1=$pais;

                }else{

                    $contador++;

                }
                
            }

            foreach ($paises as $pais2 => $info2) {
                
                if($contador==$paisAleatorio2){
    
                    $contador=0;
    
                    $paisAleatorio2=$pais2;
    
                }else{
    
                    $contador++;
    
                }

            }

            echo"Primer pais: $paisAleatorio1</br>";
            var_dump($paises[$paisAleatorio1]); 
            echo "</br>";
            var_dump($ciudades[$paisAleatorio1]);
            echo "</br>";
            echo "Enlace a maps: https://www.google.es/maps/place/$paisAleatorio1";
            echo "</br></br></br>";
            echo"Segundo pais: $paisAleatorio2</br>";
            var_dump($paises[$paisAleatorio2]); 
            echo "</br>";
            var_dump($ciudades[$paisAleatorio2]);
            echo "</br>";
            echo "Enlace a maps: https://www.google.es/maps/place/$paisAleatorio2";

        ?>

    </body>

</html>