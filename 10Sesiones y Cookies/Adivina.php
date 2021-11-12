<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> Adivina </title>

    </head>

    <body>

        <?php

            session_start();

            if (!isset ($_SESSION['numeroOculto'])){

                $_SESSION['numeroOculto'] = random_int(1, 20);
                $_SESSION['intentos']     = 0;
                echo "<H1> !! BIENVENIDO !! </H1> ";

            }else {

                if ( isset ($_REQUEST['numeroUsuario'])){

                    $numu = $_REQUEST['numeroUsuario'];
                    $numx = $_SESSION['numeroOculto'];
                    $_SESSION['intentos']++;
                    echo " INTENTOS =". $_SESSION['intentos'] ."<br> ";
                    if ($numx == $numu){
                        echo " Enhorabuena has acertado <br> ";
                        session_destroy();
                        echo " Se ha generando un nuevo número a adivinar ";
                        header("Refresh:3");
                        exit();
                    } else 
                        if ( $_SESSION['intentos'] >= 5 ){
                        echo " Superado el número de intentos <br> ";
                        session_destroy();
                        echo " Se ha generando un nuevo número a adivinar ";
                        header("Refresh:3");
                        exit();
                        }
                        else if ( $numx > $numu){
                            echo " No llegas <br> ";
                            } else {
                            echo " Te pasas <br> ";
                            }
                    }          
                }
            
        ?>

        <form method="get">

            Introduce un número: <input name="numeroUsuario" type="number" size="5" min=1 max=20>

        </form>
        
    </body>

</html>