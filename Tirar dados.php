<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Cinco Dados </title>

        <style type="text/css">

            b{

                font-size: 40px;

            }

        </style>

        <?php

            function llenarArrayDados(){

                $arrayRetorno=[];

                for ($i=0; $i<5; $i++){
                
                    $arrayRetorno[]=random_int(1,6);
                
                }

                return $arrayRetorno;

            }

            function cambiarIntADado($arrayACambiar){

                foreach ($arrayACambiar as $clave => $valor) {
                
                    switch($valor){
    
                        case 1:
    
                            $arrayACambiar[$clave] = "&#9856; ";
                            break;
    
                        case 2:
    
                            $arrayACambiar[$clave] = "&#9857; ";
                            break;
    
                        case 3:
    
                            $arrayACambiar[$clave] = "&#9858; ";
                            break;
    
                        case 4:
    
                            $arrayACambiar[$clave] = "&#9859; ";
                            break;
    
                        case 5:
    
                            $arrayACambiar[$clave] = "&#9860; ";
                            break;
    
                        case 6:
    
                            $arrayACambiar[$clave] = "&#9861; ";
    
                    }
    
                }

                return $arrayACambiar;

            }

            function puntuacion($arrayContar){

                $puntuacion=0;

                foreach ($arrayContar as $clave => $valor) {
                
                    $puntuacion=$puntuacion+$valor;

                    echo"</br>$puntuacion</br>";
    
                }
                
                return $puntuacion;

            }

            function imprimirDados($arrayAImprimir){

                foreach ($arrayAImprimir as $clave => $valor) {

                    echo"$valor";
                    
                }    

            }

        ?>

    </head>

    <body>

        <p> Actualice la página para mostrar una nueva tirada </p>

        <?php

            $arrayDadosJugador1=llenarArrayDados();
            $arrayDadosJugador2=llenarArrayDados();

            $aux1=$arrayDadosJugador1;
            $aux2=$arrayDadosJugador2;

            //Utilizo auxiliares para realizar unset para el calculo y dejo los originales para cambiarlos a la codificacion de imagenes

            $arrayDadosJugador1=cambiarIntADado($arrayDadosJugador1);
            $arrayDadosJugador2=cambiarIntADado($arrayDadosJugador2);

            sort($aux1);
            sort($aux2);

            unset($aux1[array_key_last($aux1)]);
            unset($aux1[array_key_first($aux1)]);

            unset($aux2[array_key_last($aux2)]);
            unset($aux2[array_key_first($aux2)]);

            $puntuacion1=puntuacion($aux1);
            $puntuacion2=puntuacion($aux2);

            echo"Jugador 1 : <b>";

            imprimirDados($arrayDadosJugador1);
            
            echo"</b>  Puntuacion: $puntuacion1";
                        
            echo"</br></br> Jugador 2 : <b>";
            
            imprimirDados($arrayDadosJugador2);
            
            echo"</b>  Puntuacion: $puntuacion2";

            echo"</br></br> Resultado: ";

            if($puntuacion1>$puntuacion2){

                echo"<p> ¡Gana el Jugador 1! </p>";

            }else if($puntuacion1<$puntuacion2){

                echo"<p> ¡Gana el Jugador 2! </p>";

            }else{

                echo"<p> ¡Empate </p>";

            }

        ?>
        
    </body>

</html>