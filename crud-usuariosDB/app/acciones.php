<?php
include_once "Producto.php";

function accionBorrar ($PRODUCTO_NO){    
    $db = AccesoDatos::getModelo();
    $tpro = $db->borrarProducto($PRODUCTO_NO);
}

function accionTerminar(){
    AccesoDatos::closeModelo();
    session_destroy();
}
 
function accionAlta(){
    $producto = new Producto();
    $producto->PRODUCTO_NO  = "";
    $producto->DESCRIPCION   = "";
    $producto->PRECIO_ACTUAL   = "";
    $producto->STOCK_DISPONIBLE = "";
    $orden= "Nuevo";
    include_once "layout/formulario.php";
}

function accionDetalles($PRODUCTO_NO){
    $db = AccesoDatos::getModelo();
    $producto = $db->getProducto($PRODUCTO_NO);
    $orden = "Detalles";
    include_once "layout/formulario.php";
}


function accionModificar($PRODUCTO_NO){
    $db = AccesoDatos::getModelo();
    $producto = $db->getProducto($PRODUCTO_NO);
    $orden="Modificar";
    include_once "layout/formulario.php";
}

function accionPostAlta(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $producto = new Producto();
    $producto->PRODUCTO_NO      = $_POST['PRODUCTO_NO'];
    $producto->DESCRIPCION      = $_POST['DESCRIPCION'];
    $producto->PRECIO_ACTUAL    = $_POST['PRECIO_ACTUAL'];
    $producto->STOCK_DISPONIBLE = $_POST['STOCK_DISPONIBLE'];
    $db = AccesoDatos::getModelo();
    $db->addProducto($producto);
    
}

function accionPostModificar(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $producto = new Producto();
    $producto->PRODUCTO_NO      = $_POST['PRODUCTO_NO'];
    $producto->DESCRIPCION      = $_POST['DESCRIPCION'];
    $producto->PRECIO_ACTUAL    = $_POST['PRECIO_ACTUAL'];
    $producto->STOCK_DISPONIBLE = $_POST['STOCK_DISPONIBLE'];
    $db = AccesoDatos::getModelo();
    $db->modProducto($producto);
    
}

