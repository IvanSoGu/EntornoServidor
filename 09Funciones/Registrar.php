<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> 02 Funciones </title>

        <?php

            $Formulario = 
                        
            '<form action="Registrar.php" method="post">

                <label> Introduce tu nombre de usuario </label> <br>
                <input type="text" name="nombre"> <br> <hr> <br>

                <label> Introduce una dirección de correo valida </label> <br>
                <input type="email" name="correo"> <br> <hr> <br>

                <label> Introduce una contraseña segura </label> <br>
                <input type="password" name="contraseña"> <br> <br>
                <label> Vuelve a introducir la contraseña </label> <br>
                <input type="password" name="contraseña2"> <br> <br> <br>

                <input type="submit" value="Registrar">

            </form>';

            function comprobarCamposVacios($nombre, $correo, $contraseña1, $contraseña2){

                if(empty($nombre)){

                    return true;

                }else{
                    
                    if(empty($correo)){

                        return true;

                    }else{
                    
                        if(empty($contraseña1)){

                            return true;

                        }else{ 
                        
                            if(empty($contraseña2)){

                                return true;

                            }

                        }

                    }

                }

                return false;

            }

            function tratarContraseñas($primeraContraseña,$segundaContraseña){

                $ok = false;

                if(!compararContraseñas($primeraContraseña,$segundaContraseña)){

                    mostrarError(0);

                }else {

                    if(!comprobarLongitud($primeraContraseña)){

                        mostrarError(1);

                    }else{

                        if(!comprobarAlfabeticos($primeraContraseña)){

                            mostrarError(2);
                            
                        }else{

                            if(!comprobarMayuscula($primeraContraseña)){

                                mostrarError(3);

                            }else{

                                if(!comprobarMinuscula($primeraContraseña)){

                                    mostrarError(4);

                                }else{

                                    if(!comprobarDigito($primeraContraseña)){

                                        mostrarError(5);

                                    }else{

                                        if(!comprobarNoAlfa($primeraContraseña)){

                                            mostrarError(6);

                                        }else{

                                            $ok = true;

                                        }

                                    }

                                }

                            }

                        }

                    }

                }

                return $ok;

            }

            function compararContraseñas($contraseña1,$contraseña2){

                if ($contraseña1==$contraseña2){

                    return true;

                }else{

                    return false;

                }

            }

            function comprobarLongitud($contraseña){

                if(strlen($contraseña)>=8){

                    return true;

                }else{

                    return false;

                }

            }

            function comprobarAlfabeticos($contraseña){

                for($i = 0; $i < strlen($contraseña); $i++){

                    if(ctype_alpha(substr($i,1))){

                        return true;

                    }

                }

                return false;

            }

            function comprobarMayuscula($contraseña){

                for($i = 0; $i < strlen($contraseña); $i++){

                    if(ctype_upper(substr($i,1))){

                        return true;

                    }

                }

                return false;

            }

            function comprobarMinuscula($contraseña){

                for($i = 0; $i < strlen($contraseña); $i++){

                    if(ctype_lower(substr($i,1))){

                        return true;

                    }

                }

                return false;

            }

            function comprobarDigito($contraseña){

                for($i = 0; $i < strlen($contraseña); $i++){

                    if(ctype_digit(substr($i,1))){

                        return true;

                    }

                }

                return false;

            }

            function comprobarNoAlfa($contraseña){

                for($i = 0; $i < strlen($contraseña); $i++){

                    if((ctype_digit(substr($i,1)))&&(ctype_alpha(substr($i,1)))){

                        return true;

                    }

                }

                return false;

            }

            function comprobarEmail($email) {

                if ( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

                    return true;

                }

                return false;

            }

            function mostrarError($codigoError){

                $arrayErrores = [

                    0 => ' Las contraseñas no coinciden. ',
                    1 => ' Las contraseñas no tienen los caracteres mínimos necesarios (8). ',
                    2 => ' Las contraseñas no contienen un carácter alfabético. ',
                    3 => ' Las contraseñas no contienen ningún carácter alfabético en MAYUSCULAS. ',
                    4 => ' Las contraseñas no contienen ningún carácter alfabetico en minusculas. ',
                    5 => ' Las contraseñas no contienen ningún carácter numérico (dígito). ',
                    6 => ' Las contraseñas no contienen ningún caracter no alfanumérico. ',
                    7 => ' El formulario contiene campos vacios. ',
                    8 => ' El email no es un email valido. '
    
                ];

                echo(' --ERROR-- '.$arrayErrores[$codigoError]);

            }

        ?>

    </head>

    <body>

        <?php

            if($_SERVER["REQUEST_METHOD"]=="GET"){

                echo($Formulario);

            }else{

                if(comprobarCamposVacios($_REQUEST['nombre'],$_REQUEST['correo'],$_REQUEST['contraseña'],$_REQUEST['contraseña2'])){

                    mostrarError(7);
                    echo ('<br> <a href="Registrar.php"> Volver </a>');

                }else{

                    if(comprobarEmail($_REQUEST['correo'])){

                        if(tratarContraseñas($_REQUEST['contraseña'],$_REQUEST['contraseña2'])){

                            echo '<br> ¡Registro completado! '; 
                            //No compruebo ni llevo un registro de los usuarios pero es que creo que no es eso lo que pide asi que..
    
                        }else{
                            
                            echo ('<br> <a href="Registrar.php"> Volver </a>');
                            //header("location:Registrar.php");
    
                        }

                    }else{

                        mostrarError(8);
                        echo ('<br> <a href="Registrar.php"> Volver </a>');
                        //header("location:Registrar.php");

                    }

                }

            }

        ?>

    </body>
    
</html>