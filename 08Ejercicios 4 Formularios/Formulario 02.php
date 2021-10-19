<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> Formulario 02 </title>

    </head>

    <?php
    
        function suma($operadorSuma1, $operadorSuma2){

            return $operadorSuma1+$operadorSuma2;

        }

        function resta($operadorResta1, $operadorResta2){

            return $operadorResta1-$operadorResta2;

        }

        function multiplicacion($operadorMultiplicacion1, $operadorMultiplicacion2){

            return $operadorMultiplicacion1 * $operadorMultiplicacion2;

        }

        function division($operadorDivision1, $operadorDivision2){

            return $operadorDivision1/$operadorDivision2;

        }

        function obtenerResultado($operadorResu1, $operadorResu2, $operacionResu){

            switch($operacionResu){

                case "+":

                    $resultado=suma($operadorResu1,$operadorResu2);
                    break;

                case "-":

                    $resultado=resta($operadorResu1,$operadorResu2);
                    break;

                case "*":

                    $resultado=multiplicacion($operadorResu1,$operadorResu2);
                    break;

                case "/":

                    $resultado=division($operadorResu1,$operadorResu2);

            }

            return $resultado;

        }

    ?>

    <body>

        <form action="Formulario 02.php" method="post">

            <label> Operando 1: </label> <input type="number" name="Operando 1" value="0"> </input>
            <label> Operando 2: </label> <input type="number" name="Operando2" value="0"> </input>
            
            <br><br>

            <label> Suma </label> <input type="radio" name="Operacion" value="+"> </input>
            <label> Resta </label> <input type="radio" name="Operacion" value="-"> </input>
            <label> Multiplicacion </label> <input type="radio" name="Operacion" value="*"> </input> 
            <label> Division </label> <input type="radio" name="Operacion" value="/"> </input>

            <br><br>
            
            <label> Decimal </label> <input type="radio" name="Mostrar" value="Decimal"> </input>
            <label> Hexadecimal </label> <input type="radio" name="Mostrar" value="Hexadecimal"> </input>
            <label> Binario </label> <input type="radio" name="Mostrar" value="Binario"> </input>

            <br><br>

            <input type="submit" value="Calcular">

        </form>

        <?php
            
            if($_SERVER["REQUEST_METHOD"]=="POST"){

                $operador1=$_POST["Operando1"];
                $operador2=$_POST["Operando2"];
                $operacion=$_POST["Operacion"];
                $mostrar=$_POST["Mostrar"];

                $resu=obtenerResultado($operador1,$operador2,$operacion);

                switch($mostrar){

                    case "Decimal":

                        break;

                    case "Hexadecimal":

                        $resu=dechex($resu);
                        break;
                        
                    case "Binario":

                        $resu=decbin($resu);

                }

                echo("<br><br> La operación es : $operador1 $operacion $operador2 = $resu");

            }

        ?>
            
    </body>

</html>