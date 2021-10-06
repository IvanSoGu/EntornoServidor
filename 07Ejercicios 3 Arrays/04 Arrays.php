<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <title> 04 Arrays </title>

        <style type="text/css">
        
            table,th,td{
		    
                border:1px solid black;
		    
            }

            table{

                margin:40px;

            }

            img{

                width: 200px;
                size: 200px;

            }

        </style>
    
    </head>
    
    <body>
        
        <?php

            $arrayDeportes=["Karate" => "Imagen/LogoKarate.jpg",
            "Ajedrez" => "Imagen/LogoAjedrez.jpg",
            "Golf" => "Imagen/LogoGolf.jpg",
            "Natación" => "Imagen/LogoNatación.jpg",
            "Tennis" => "Imagen/LogoTennis.jpg"];

        ?>

        <table>
            
            <tr>
                
                <th>DEPORTE</th>
                <th>LOGO</th>
            
            </tr>

            <?php foreach ($arrayDeportes as $key => $value) {?>
                
                <tr>
                    
                    <td> <?= $key ?> </td>
                    <td> <img src="<?= $value ?>"> </td>
                
                </tr>

            <?php } ?>

        </table>
    
    </body>

</html>