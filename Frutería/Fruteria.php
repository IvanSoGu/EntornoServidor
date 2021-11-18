<?php

    session_start()

?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title> Frutería </title>

        <style>

            div{ 
                
                border: 0.2rem solid black;
                margin: 2%;
                background-color: #d3d3d3;

            }

        </style>

        <?php

            $formularioUsuario=

                '<h4> Bienvenido a nuestra frutería del siglo XXI </h4>

                <form action="Fruteria.php" method="POST"> 
        
                    <label> Introduzca su nombre de usuario </label>
        
                    <input type="text" name="nombreUsuario">
        
                    <input type="submit" value="Registrar">
        
                </form>'

            ;

            $seleccionFrutas=

                '<form action="Fruteria.php" method="POST">

                <label> Selecciona la fruta: </label> <br>
                <select name="tipoFruta">
            
                    <option value="Platanos"> Platanos </option>
                    <option value="Naranjas"> Naranjas </option>
                    <option value="Mandarinas"> Mandarinas </option>
                    <option value="Limones"> Limones </option>
                    <option value="Manzanas"> Manzanas </option>
            
                </select>
                <input type="number" name="cantidad" min=1>
                <input type="submit" name="accion" value="Añadir al carro">
                <input type="submit" name="accion" value="Finalizar el pedido">
    
            </form>'

            ;

        ?>
    
    </head>
    
    <body>
    
        <h2> LA FRUTERÍA DEL SIGLO XXI </h2>

        <?php

            if (!isset($_SESSION['cliente'])){

                if (!isset($_POST['nombreUsuario'])){

                    echo($formularioUsuario);

                }else{

                    $_SESSION['cliente']=$_POST['nombreUsuario'];
                    $_SESSION['carrito']=[];
                    $_SESSION['finalizado']=false;
                    header("Refresh:0; url=\"".$_SERVER['PHP_SELF']."\"");

                }

            }else{

                if(isset($_POST['accion'])){

                    switch($_POST['accion']){

                        case 'Añadir al carro':

                            if(isset($_SESSION['carrito'][$_POST['tipoFruta']])){

                                $_SESSION['carrito'][$_POST['tipoFruta']]=$_SESSION['carrito'][$_POST['tipoFruta']]+$_POST['cantidad'];

                            }else{

                                $_SESSION['carrito'][$_POST['tipoFruta']]=$_POST['cantidad'];

                            }
                            
                            break;

                        case 'Finalizar el pedido':

                            $_SESSION['finalizado'] = true;

                    }

                }else{



                }

                if(count($_SESSION['carrito'])>0){
                
                    echo('<br><div> Su pedido es: ');
                    foreach ($_SESSION['carrito'] as $tipoFruta => $cantidad) {
                        
                        echo('<br>'.$tipoFruta.': '.$cantidad);
    
                    }
                    echo('</div><br>');

                }

                if(!$_SESSION['finalizado']){

                    echo('<h4> Realice su compra '.$_SESSION['cliente'].' </h4>');

                    echo($seleccionFrutas);

                }else{

                    echo('<p> ¡Muchas gracias por su pedido! </p>');
                    session_destroy();
                    echo('<br> <a href="Fruteria.php"> Nuevo pedido </a>');

                }

            }

        ?>



    </body>

</html>