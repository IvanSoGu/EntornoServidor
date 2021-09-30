<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title> Piedra, papel, tijera </title>

    <style> 
        
        body{
        
            font-size: 200px;

        }

    </style>

</head>

<body>

    <?php

        //He intentado hacerlo con funciones todo para ir cogiendo costumbre

        function numeroAleatorio(){

            return $num= random_int(1,3); 

        }

        //Cada jugador utiliza la función para obtener 1 número aleatorio, despues imprime el dibujo correspondiente

        $jugador1=numeroAleatorio();

        switch($jugador1){

            case 1: echo"&#x1F91C;"; break;

            case 2: echo"&#x1F91A;"; break;

            case 3: echo"&#x1F596;"; 

        }

        $jugador2=numeroAleatorio();

        switch($jugador2){

            case 1: echo"&#x1F91B;"; break;

            case 2: echo"&#x1F91A;"; break;

            case 3: echo"&#x1F596;";

        }

        echo"</br></br>";

        //La funcion comparaPPT devuelve un int (jugador) o 0

        function comparaPPT($jugador1, $jugador2){
    
            //Descarto primero los empates
            if($jugador1==$jugador2){
            
                return 0;
            
            //Descarto las jugadas en las que ninguno saca el valor 3 (Tijeras)
            }else if(($jugador1<3)&&($jugador2<3)){
    
                if($jugador2>$jugador1){
    
                    return $jugador2;
    
                }else{
    
                    return $jugador1;
    
                }
            
            //Y aquí trato el caso en el que alguno sea 3
            }else if($jugador1==3){
    
                if($jugador2==1){
    
                    return $jugador2;
    
                }else{
                
                    return $jugador1;

                }
    
            }else if($jugador2==3){

                if($jugador1==1){
    
                    return $jugador1;
    
                }else{
                
                    return $jugador2;

                }

            }

        }

        $resultado=comparaPPT($jugador1,$jugador2);

        if($resultado==$jugador1){

            echo"¡Gana Jugador1!";

        }else if($resultado==$jugador2){

            echo"¡Gana Jugador2!";

        }else{

            echo"¡Empate!";

        }

        echo"</br>Jugador1=$jugador1</br>Jugador2=$jugador2";

    ?>
    
</body>

</html>