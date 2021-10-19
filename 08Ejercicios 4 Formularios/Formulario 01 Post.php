<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> Post Formulario 01 </title>

        <script lang="javascript">

            function goBack(){

                history.go(-1);

            }

        </script>

        <?php

            $loginCorrecto=false;

            $baseDatos = [ 

                "Alumno" => "Alumno",
                "Profesor" => "Pr0f3s0r",
                "Agente π" => "53RV1C10D31N73L163NC14"

            ];

        ?>

    </head>

    <body>

            

        <pre>
            
            <?php

                foreach ($baseDatos as $key => $value) {
                    
                    if(($_REQUEST["usuario"]==$key)&&($_REQUEST["contraseña"]==$value)){

                        $loginCorrecto=true;
                        $usuario=$key;
                        break;

                    }
                    
                }

                if($loginCorrecto){
                
                    echo "Bienvenido $usuario";

                }else{

                    echo "Usuario o contraseña incorrecto <br>";
                    echo '<input type="button" value="Volver" onclick=goBack()>';

                }

            ?>

        </pre>
        
    </body>

</html>