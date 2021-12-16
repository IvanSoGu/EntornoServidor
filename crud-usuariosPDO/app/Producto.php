<?php


class Producto{
    private $PRODUCTO_NO;
    private $DESCRIPCION;
    private $PRECIO_ACTUAL;
    private $STOCK_DISPONIBLE;
    
    // Getter con método mágico
    public function __get($atributo){
        if(property_exists($this, $atributo)) {
            return $this->$atributo;
        }
    }
    // Setter con método mágico
    public function __set($atributo,$valor){
        if(property_exists($this, $atributo)) {
            $this->$atributo = $valor;
        }
    }
    
}

