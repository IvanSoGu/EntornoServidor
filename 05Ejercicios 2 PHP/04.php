<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> 04 </title>

    </head>

    <body>

        <?php
        
        $minimo=0;
        $maximo=0;
        $media=0;

        for($i=1; $i<=50; $i++){

        $generado=random_int(1,100);
                    
            if($i==1){
                            
                $minimo=$generado;
                $maximo=$generado;
                            
            }else if($generado<$minimo){
                            
                $minimo=$generado;
                            
            }else if($generado>$maximo){

                $maximo=$generado;

            }

            $media+=$generado;
                    
        }

        $media=$media/50;;
        
        ?>

        <table>

            <tr>

                <th> Generación de 50 valores aleatorios </th>
                
            </tr>

            <tr> 
                
                <td> Mínimo </td> 
                <td> <?php echo "$minimo" ?> </td>
            
            </tr>

            <tr> 
                
                <td> Máximo </td> 
                <td> <?php echo"$maximo" ?> </td>
            
            </tr>

            <tr> 
                
                <td> Media </td> 
                <td> <?php echo"$media" ?> </td>
            
            </tr>
            

        </table>

    </body>

</html>