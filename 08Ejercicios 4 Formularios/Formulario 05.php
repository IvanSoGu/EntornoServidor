<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> Formulario 05 </title>

        <?php

            function limpiarElemento($elemento){

                $elemento = trim($elemento); 
                $elemento = stripslashes($elemento);
                $elemento = htmlspecialchars($elemento);
                return $elemento;
            }

        ?>

    </head>

    <body>

        <?php

            $nombre=limpiarElemento($_REQUEST["Nombre"]);
            $apellidos=limpiarElemento($_REQUEST["Apellidos"]);

            if($_REQUEST["sexo"]=="H"){

                echo("Bienvenido ");

            }else{

                echo("Bienvenida ");

            }

            if($_REQUEST["Edad"]==1){
                
                if($_REQUEST["sexo"]=="H"){

                    echo("Don ");

                }else{

                    echo("Doña ");

                }
                
            }

            echo($nombre);
            echo($apellidos);

            if(!isset($_REQUEST["Hobbies"])){

                echo("no tiene aficiones de nuestra lista.");

            }else{

                if(count($_REQUEST["Hobbies"])==1){

                    echo(" su aficion es ".$_REQUEST["Hobbies"][0]);  

                }else{

                    echo(" sus aficiones son ");
                    for($i=0;$i<count($_REQUEST["Hobbies"]);$i++){

                        echo($_REQUEST["Hobbies"][$i]);

                    }


                }

            }

        ?>
        
    </body>

</html>