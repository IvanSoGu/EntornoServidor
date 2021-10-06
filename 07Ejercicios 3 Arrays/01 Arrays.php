<!DOCTYPE html>
<html lang="es">

    <head>
        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title> 01 Arrays </title>

    </head>

    <body>

        <?php

            $arrayNAleatorios=[];
            $arrayModa=[];
            $maximo;
            $minimo;

            for($i=0;$i<20;$i++){
                
                $arrayNAleatorios[$i]=random_int(1,10);
                
                if($i==0){

                    $maximo=$arrayNAleatorios[0];
                    $minimo=$arrayNAleatorios[0];

                }else if($maximo<$arrayNAleatorios[$i]){

                    $maximo=$arrayNAleatorios[$i];

                }else if($minimo>$arrayNAleatorios[$i]){

                    $minimo=$arrayNAleatorios[$i];

                }

                if(array_key_exists($arrayNAleatorios[$i],$arrayModa)){

                    $arrayModa[$arrayNAleatorios[$i]]++;

                } else {

                    $arrayModa[$arrayNAleatorios[$i]]=1;

                }

                arsort($arrayModa);

            }

            var_dump($arrayNAleatorios);
            echo"</br></br>";
            var_dump($arrayModa);
            echo"</br> El máximo es: $maximo. </br> El mínimo es: $minimo. </br> La Moda es: ";
            foreach ($arrayModa as $key => $value) {

                if($value==$arrayModa[array_key_first($arrayModa)]){

                    echo"$key, ";

                }

            }

        ?>
        
    </body>

</html>