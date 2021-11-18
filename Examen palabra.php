<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> Ahorcado examen </title>

        <?php

            function elegirPalabra(){

                static $tpalabras = ["Madrid","Sevilla","Murcia","Málaga","Mallorca","Menorca"];
                $aleatorio = random_int(0,5);
            
                return $tpalabras[$aleatorio]; // Devuelve una palabra al azar    
            }

            function comprobarLetra($letra,$cadena){

                for ($i = 0; $i<strlen($cadena); $i++){

                    if($cadena[$i]==$letra){

                        return true;

                    }

                }
                
                return false;   
            }

            function mostrarFormulario(){

                $formulario = 

                '<form action="Examen palabra.php" method="post">

                    <br> <label> Elige una letra </label>
                    <br> <input type="text" name="letra">
                    <br> <input type="submit" value="Elegir">

                </form>';

                echo($formulario);

            }

            function generaPalabraconHuecos ($cadenaletras, $cadenapalabra) {
    
                $resu = $cadenapalabra;

                for ($i = 0; $i<strlen($resu); $i++){

                    $resu[$i] = '-';

                }

                for ($i = 0; $i<strlen($resu); $i++){

                    for($j = 0; $j<strlen($cadenaletras); $j++){

                        if(comprobarLetra($cadenaletras[$j],$cadenapalabra[$i])){

                            $resu[$i] = $cadenapalabra[$i];
    
                        }

                    }
                    
                }
                
                return $resu;
                
            }

            function volverAJugar(){

                session_destroy();

                echo('<br> <a href="Examen palabra.php"> Volver a jugar </a>');

            }
            

        ?>

    </head>

    <body>

        <?php

            if($_SERVER["REQUEST_METHOD"]=="POST"){

                if(comprobarLetra($_REQUEST['letra'],$_SESSION['palabrasecreta'])){

                    echo('<br> <p> ¡Esta! </p>');

                    $_SESSION['letrasusuario'] = $_SESSION['letrasusuario'].$_REQUEST['letra'];

                }else{

                    echo('<br> ¡No esta! ');
                    $_SESSION['letrasfalladas'] = $_SESSION['letrasfalladas'].$_REQUEST['letra'];
                    $_SESSION['fallos']++;

                }

            }else{

                if (! isset($_SESSION['palabrasecreta'])) {

                    $_SESSION['palabrasecreta'] = elegirPalabra();
                    $_SESSION['letrasusuario'] = ""; // Inicialmente no tiene ninguna letra  
                    $_SESSION['fallos'] = 0; // Inicialmente no hay ningún fallo
                    $_SESSION['letrasfalladas'] = ""; //La he utilizado para guiarme, ya la dejo.
                
                }
                 
            }

            if ($_SESSION['fallos'] == 5){

                echo('Has agotado el numero de intentos (5).');
                volverAJugar(false);

            }else if($_SESSION['palabrasecreta']==generaPalabraconHuecos($_SESSION['letrasusuario'],$_SESSION['palabrasecreta'])) {

                echo('<p> ¡GANASTE </p>');
                volverAJugar(true);

            }else{

                echo('<br> Letras acertadas == '.$_SESSION['letrasusuario']);
                echo('<br> Letras falladas == '.$_SESSION['letrasfalladas']);
                echo('<br> Nº de fallos == '.$_SESSION['fallos']);
                mostrarFormulario();
                echo('<br>'.generaPalabraconHuecos($_SESSION['letrasusuario'],$_SESSION['palabrasecreta']));

            }

        ?>

            
        
    </body>

</html>