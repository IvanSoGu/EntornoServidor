<?php

function limpiarElemento($elemento){

   $elemento = trim($elemento); 
   $elemento = stripslashes($elemento);
   $elemento = htmlspecialchars($elemento);

   return $elemento;

}

function usuarioOk($usuario, $contraseña) : bool {

   if(comprobarLongitud($usuario)){

      if(comprobarContraseña($usuario,$contraseña)){

         return true;

      }

   }

   return false;
   
}

function comprobarLongitud($usuario) : bool {

   if(strlen($usuario)>=8){

       return true;

   }else{

      mostrarError(0);

      return false;

   }

}

function comprobarContraseña($usuario,$contraseña) : bool {

   if (strrev($usuario)==$contraseña){

      return true;

   }else{

      mostrarError(1);

      return false;

   }

}

function letraMasRepetida($comentario){

   $comentarioAux = str_replace(' ', '', $comentario);
   $vecesRepetida = 0;
   $letraMasRepetida = "";
   $repetidas=[];

   for ($i=0; $i<strlen($comentarioAux); $i++){

      if(!empty($repetidas[$comentarioAux[$i]])){

         break;

      }else{

         $repetidas[$comentarioAux[$i]] = 1;

      }

      for ($j=$i+1; $j<strlen($comentarioAux); $j++){

         if($comentarioAux[$j]==$comentarioAux[$i]){

            $repetidas[$comentarioAux[$i]]++;

         }

      }

      if($letraMasRepetida!=$comentarioAux[$i]){

         if($repetidas[$comentarioAux[$i]]>$vecesRepetida){

            $letraMasRepetida=$comentarioAux[$i];
            $vecesRepetida=$repetidas[$comentarioAux[$i]];

         }

      }

   }

   return $letraMasRepetida;

}

function palabraMasRepetida($comentario){

   $palabras = str_word_count($comentario,1);

   $palabrasRepeticiones = array_count_values($palabras);

   asort($palabrasRepeticiones);

   return array_key_last($palabrasRepeticiones);

}

function mostrarError($codigoError){

   $arrayErrores = [

      0 => ' La longitud del usuario es menor a 8 caracteres. ',
      1 => ' La contraseña no es correccta (no coincide con el usuario) ',

   ];

   echo(' --ERROR-- '.$arrayErrores[$codigoError]);

}

?>