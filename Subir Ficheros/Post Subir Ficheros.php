<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> POST Subir Ficheros </title>

        <?php

            $codigosErrorSubida= [     
                
                0 => 'Subida correcta',    
                1 => 'El tamaño del archivo excede el admitido por el servidor (200kb) ',  // directiva upload_max_filesize en php.ini    
                2 => 'El tamaño del archivo excede el admitido por el cliente ',  // directiva MAX_FILE_SIZE en el formulario HTML    
                3 => 'El archivo no se pudo subir completamente ',    
                4 => 'No se seleccionó ningún archivo para ser subido ',
                5 => 'El tipo de archivo no es admitido por el servidor',
                6 => 'No existe un directorio temporal donde subir el archivo ',  //Añadido en código  
                7 => 'No se pudo guardar el archivo en disco ',  // permisos    
                8 => 'Una extensión PHP evito la subida del archivo '  // extensión PHP

            ];

            function comprobarSiHayFicheros(){

                if (empty($_FILES['archivos']['name']['0'])){

                    return false;

                }else{

                    return true;

                }

            }

            function comprobarRepetido($nombre, $listado){

                $repetido=false;

                foreach ($listado as $key => $value) {
                    
                    if ($nombre == $value){

                        $repetido=true;
                        return $repetido;

                    }

                }

                return $repetido;

            }

            function limpiarElemento($elemento){

                $elemento = trim($elemento); 
                $elemento = stripslashes($elemento);
                $elemento = htmlspecialchars($elemento);
                return $elemento;
            }

            function comprobarErrorTamMaxServidor($archivos, $nArchivos){

                $tamañoArchivos=0;
                $maxTamFichero=false;

                for($i=0;$i<$nArchivos;$i++) {

                    $tamañoArchivos+= $archivos['archivos']['size'][$i];

                    if($tamañoArchivos>300000){

                        $maxTamFichero=true;
                        break;

                    }

                }

                return $maxTamFichero;

            }

        ?>

    </head>

    <body>

        <?php

            if (count($_POST) == 0 ){
                
                echo( "  Error: se supera el tamaño máximo de un petición POST ");
            
            }else {
                    
                $directorioSubida = limpiarElemento($_REQUEST["direccion"]); // debe permitir la escrita para Apache
                // Información sobre el archivo subido  
                    
                $numeroFicheros = count($_FILES['archivos']['name']);

                if (($numeroFicheros==1)&(!comprobarSiHayFicheros())){

                    $numeroFicheros=0;
                    echo(" ERROR -- No se ha enviado ningún fichero ");

                }else{

                    if(comprobarErrorTamMaxServidor($_FILES, $numeroFicheros)){

                        echo (" ERROR -- Los archivos superan el tamaño maximo en conjunto del sevidor (300kb) ");

                    }else{

                        for ($i=0;$i<$numeroFicheros;$i++) {

                            $mensaje="";
        
                            $nombreFichero   =   LimpiarElemento($_FILES['archivos']['name'][$i]);
                            $tipoFichero     =   $_FILES['archivos']['type'][$i];
                            $tamanioFichero  =   $_FILES['archivos']['size'][$i];
                            $temporalFichero =   $_FILES['archivos']['tmp_name'][$i];
                            $errorFichero    =   $_FILES['archivos']['error'][$i];
                            $mensaje .= 'Intentando subir el archivo: ' . ' <br />';
                            $mensaje .= "- Nombre: $nombreFichero" . ' <br />';
                            $mensaje .= '- Tamaño: ' . ($tamanioFichero / 1024) . ' KB <br />';
                            $mensaje .= "- Tipo: $tipoFichero" . ' <br />' ;
                            $mensaje .= "- Nombre archivo temporal: $temporalFichero" . ' <br />';
                            $mensaje .= "- Código de estado: $errorFichero" . ' <br />';
                            $mensaje .= '<br />RESULTADO<br />';
        
                            if($tamanioFichero>200000){

                                $errorFichero=1;

                            }

                            if(($tipoFichero!="image/jpeg")&&($tipoFichero!="image/png")){

                                $errorFichero=5;

                            }
        
                            if ($errorFichero > 0) {        
                            
                                $mensaje .= "Se a producido el error: $errorFichero:".$codigosErrorSubida[$errorFichero].' <br />';
                                
                            } else { 

                                $listadoNombres=scandir($directorioSubida);
                            
                                if ((is_writable ($directorioSubida))&(!comprobarRepetido($nombreFichero,$listadoNombres))){
                                    // si es un directorio y tengo permisos
                                    //y si ocupa menos de 200kb
                                    //Y NO SE REPITEN LOS NOMBRES
                                    
                                    // subida correcta del temporal
            
                                    //Intento mover el archivo temporal al directorio indicado
                                    if (move_uploaded_file($temporalFichero,$directorioSubida.'/'.$nombreFichero) == true) {                
                                            
                                        $mensaje .= 'Archivo guardado en: '.$directorioSubida.'/'.$nombreFichero.' <br/>';
                                        
                                    } else {                
                                            
                                        $mensaje .= 'ERROR: Archivo no guardado correctamente <br />';   
            
                                    }        
            
                                }else {    
                                    
                                    if(!is_dir($directorioSubida)){
            
                                        $mensaje .= 'ERROR: No es un directorio correcto <br>';
            
                                    }else if(!is_writable($directorioSubida)){
            
                                        $mensaje .= 'ERROR: No se tienen permisos de escritura <br>';
            
                                    }else{
                                        
                                        $mensaje .= 'ERROR: Archivo repetido <br>';
                                    
                                    }

                                }

                            }

                            echo $mensaje;
        
                        }

                    }

                }

            }

        ?>
        
    </body>

</html>