<html>

    <head>

        <meta charset="UTF-8">
        <link href="web/default.css" rel="stylesheet" type="text/css" />
        <title> MINIFORO </title>

        <?php 
        
            include_once 'app/funciones.php';
        
        ?>

    </head>

    <body>

        <div id="container" style="width: 450px;">
        
            <div id="header">

                <img src="web/logo.png" alt="mini foro logo" width="100px" height="100px">

                <h1>MINIFORO versión 1.0</h1>

            </div>

            <div id="content">

                <?php 

                    // PRIMERA APROXIMACIÓN AL MODELO VISTA CONTROLADOR. 
                    // Funciones auxiliars Ej- usuarioOK
                    include_once 'app/funciones.php';

                    if ( !isset($_REQUEST['orden']) ){

                        include_once 'app/entrada.php';

                    } 

                    else {

                        switch ($_REQUEST['orden']){
                            
                            case "Entrar":
                                // Chequear usuario
                                if ( isset($_REQUEST['nombre']) && isset($_REQUEST['contraseña']) && 
                                    usuarioOK($_REQUEST['nombre'], $_REQUEST['contraseña'] )) {

                                    echo " Bienvenido <b>".limpiarElemento($_REQUEST['nombre'])."</b><br>";
                                    include_once  'app/comentario.html';
                                    
                                }else{

                                    include_once 'app/entrada.php';
                                    echo " <br> Usuario no válido </br>";

                                }

                                break;
                                
                            case "Nueva opinión":

                                echo " Nueva opinión <br>";
                                include_once  'app/comentario.html';
                                break;

                            case "Detalles": // Mensaje y detalles

                                echo "Detalles de su opinión";
                                include_once 'app/comentariorelleno.php';
                                include_once 'app/detalles.php';
                                break;

                            case "Terminar": // Formulario inicial
                                include_once 'app/entrada.php';

                        }
                        
                    }

                ?>

            </div>

        </div>

    </body>

</html>