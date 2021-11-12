<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title> Vermes </title>

        <style>

            table{

                border: 1px solid black;

            }

        </style>

        <?php

            function generarCalendario($Mes, $Año){
                
                $primerdía = date("w", mktime(0,0,0,$Mes,1,$Año));

                $numeroDias = date("t", mktime(0,0,0,$Mes,1,$Año));

                echo ('<br> <a href="Vermes.php"> Volver </a>');

                $numeroLineas=calcularLineas($primerdía, $numeroDias);

                $arraySemanas = crearArraySemanas($numeroLineas, $primerdía, $numeroDias);

                pintarCalendario($arraySemanas, $primerdía, $numeroDias);

            }

            function calcularLineas($primerdía, $numeroDias){

                if($primerdía>0){

                    for($i=$primerdía; $i<=7; $i++){

                        $numeroDias--;
    
                    }

                    $numeroLineas = 1;

                }else{

                    $numeroLineas = 0;

                }

                $numeroLineas = $numeroLineas + intdiv($numeroDias, 7);

                if($numeroDias%7>0){

                    $numeroLineas++;

                }

                return $numeroLineas;

            }

            function crearArraySemanas($numeroLineas, $primerdía, $numeroDias){

                $arraySemanas = [];
                $contador=0;

                for ($i=0; $i<$numeroLineas; $i++){

                    if ($i==0){

                        switch ($primerdía){

                            case 0:

                                $arrayAux = ["&nbsp", "&nbsp", "&nbsp", "&nbsp", "&nbsp", "&nbsp", 1];
                                $contador=7;
                                break;

                            case 1:

                                $arrayAux = [1, 2, 3, 4, 5, 6, 7];
                                $contador=7;
                                break;

                            case 2:

                                $arrayAux = ["&nbsp", 1, 2, 3, 4, 5, 6];
                                $contador=7;
                                break;

                            case 3:

                                $arrayAux = ["&nbsp", "&nbsp", 1, 2, 3, 4, 5];
                                $contador=7;
                                break;

                            case 4:

                                $arrayAux = ["&nbsp", "&nbsp", "&nbsp", 1, 2, 3, 4];
                                $contador=7;
                                break;

                            case 5:

                                $arrayAux = ["&nbsp", "&nbsp", "&nbsp", "&nbsp", 1, 2, 3];
                                $contador=7;
                                break;

                            case 6:

                                $contador=7;
                                $arrayAux = ["&nbsp", "&nbsp", "&nbsp", "&nbsp", "&nbsp", 1, 2];

                        }

                    }else if ($i == $numeroLineas-1){

                        unset($arrayAux);

                        for($j = 0; $j < $numeroDias%7; $j++){

                            $arrayAux[$j]= $i*7+$j+1;

                        }

                    }else{

                        $arrayAux = [($i-1)*7+1+$contador, ($i-1)*7+2+$contador, ($i-1)*7+3+$contador, ($i-1)*7+4+$contador, ($i-1)*7+5+$contador, ($i-1)*7+6+$contador, ($i-1)*7+7+$contador];

                    }

                    $arraySemanas[$i]=$arrayAux;

                }

                return $arraySemanas;

            }

            function pintarCalendario($arraySemanas, $primerdía, $numeroDias){

                echo('<br>');
                echo ('<table>');
                $nfilas = count($arraySemanas);

                if ($primerdía=0){

                    $primerdía=7;

                }

                for ($i=0; $i<$nfilas; $i++){

                    echo('<tr>');

                    for ($j=0; $j<7; $j++){

                        if($numeroDias==0){

                            break;
    
                        }

                        if($primerdía>1){

                            echo('<td> &nbsp </td>');
                            $primerdía--;
                            $numeroDias--;

                        }else{

                            echo('<td>'.$arraySemanas[$i][$j].'</td>');
                            $numeroDias--;

                        }

                    }

                    echo('</tr>');

                }

            }

        ?>
    
    </head>
    
    <body>
    
    </body>

    <?php

        if($_SERVER["REQUEST_METHOD"]=="POST"){

            generarCalendario($_REQUEST['Mes'], $_REQUEST['Año']);

        }else {

            echo('

            <form action="Vermes.php" method="Post">

                <label > Mes </label>
                <select name="Mes">

                    <option value=01> Enero </option>
                    <option value=02> Febrero </option>
                    <option value=03> Marzo </option>
                    <option value=04> Abril </option>
                    <option value=05> Mayo </option>
                    <option value=06> Junio </option>
                    <option value=07> Julio </option>
                    <option value=08> Agosto </option>
                    <option value=09> Septiembre </option>
                    <option value=10> Octubre </option>
                    <option value=11> Noviembre </option>
                    <option value=12> Diciembre </option>

                </select>
                
                <label > Año </label>
                <select name="Año">');

                $añoMax=date("Y");
                
                for($i=1980; $i<= $añoMax; $i++){

                    echo(" <option value=$i> $i </option> ");

                }

                echo(
                '</select>

                <input type="submit" value="Enviar"> </input>

            </form>

            ');

        }

    ?>
    
</html>