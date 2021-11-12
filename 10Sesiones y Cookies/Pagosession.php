<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> Pago Session </title>

    </head>

    <body>

        <?php
        
            session_start();

            if (isset($_GET['nuevatarjeta'])) {

                $tarjeta = $_GET['nuevatarjeta'];

                $_SESSION['tipotarjeta']= $tarjeta;

                echo "<br><h1> Cambiando su tipo de tarjeta...</h1> ";

                header("Refresh:2; url=\"".$_SERVER['PHP_SELF']."\"");
                echo "<body></html>";
                exit();

            } else {

                if (isset($_SESSION['tipotarjeta'])){

                    $tarjeta= $_SESSION['tipotarjeta'];

                }

            }
            
            if (isset($tarjeta)){

                echo " <H2> SU FORMA DE PAGO ACTUAL ES</H2> </br> ";
                echo " <img src='imagenes/$tarjeta.gif' /></a>";

            } else {

                echo " <H2> NO HAY FORMA  DE PAGO ASIGNADA </H2> </br><br><br>";

            }
        
        ?>

        <center>

            <h2>SELECCIONE UNA NUEVA TARJETA DE CREDITO </h2><br>

            <a href='?nuevatarjeta=cashu'>
                <img  src='imagenes/cashu.gif' />
            </a>&ensp; 

            <a href='?nuevatarjeta=cirrus1'>
                <img  src='imagenes/cirrus1.gif' />
            </a>&ensp; 

            <a href='?nuevatarjeta=dinersclub'>
                <img  src='imagenes/dinersclub.gif' />
            </a>&ensp; 

            <a href='?nuevatarjeta=mastercard1'>
                <img  src='imagenes/mastercard1.gif'/>
            </a>&ensp; 

            <a href='?nuevatarjeta=paypal'>
                <img  src='imagenes/paypal.gif' />
            </a>&ensp; 

            <a href='?nuevatarjeta=visa1'>
                <img  src='imagenes/visa1.gif' />
            </a>&ensp; 

            <a href='?nuevatarjeta=visa_electron'>
                <img  src='imagenes/visa_electron.gif'/>
            </a>  

        </center>
        
    </body>

</html>