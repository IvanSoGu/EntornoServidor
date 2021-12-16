<?php
include_once "Producto.php";
include_once "config.php";

/*
 * Acceso a datos con BD Usuarios y Patrón Singleton 
 * Un único objeto para la clase
 */
class AccesoDatos {
    
    private static $modelo = null;
    private $dbh = null;
    private $stmt_productos = null;
    private $stmt_producto  = null;
    private $stmt_borproducto  = null;
    private $stmt_modproducto  = null;
    private $stmt_creaproducto = null;
    
    public static function getModelo(){
        if (self::$modelo == null){
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }
    
   // Constructor privado  Patron singleton
   
    private function __construct(){
        
        try {
            $dsn = "mysql:host=".SERVER_DB.";dbname=".DATABASE.";charset=utf8";
            $this->dbh = new PDO($dsn, "root", "root");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Error de conexión ".$e->getMessage();
            exit();
        }
        // Construyo las consultas
        $this->stmt_productos  = $this->dbh->prepare("select * from productos");
        $this->stmt_producto   = $this->dbh->prepare("select * from productos where PRODUCTO_NO =?");
        $this->stmt_borproducto   = $this->dbh->prepare("delete from productos where PRODUCTO_NO =?");
        $this->stmt_modproducto   = $this->dbh->prepare("update productos set DESCRIPCION=?, PRECIO_ACTUAL=?, STOCK_DISPONIBLE=? where PRODUCTO_NO=?");
        $this->stmt_creaproducto  = $this->dbh->prepare("insert into productos (PRODUCTO_NO,DESCRIPCION,PRECIO_ACTUAL,STOCK_DISPONIBLE) Values(?,?,?,?)");
    }

    // Cierro la conexión anulando todos los objectos relacioanado con la conexión PDO (stmt)
    public static function closeModelo(){
        if (self::$modelo != null){
            $obj = self::$modelo;
            $obj->stmt_productos = null;
            $obj->stmt_producto  = null;
            $obj->stmt_borproducto  = null;
            $obj->stmt_modprodu  = null;
            $obj->stmt_creaproducto = null;
            $obj->dbh = null;
            self::$modelo = null; // Borro el objeto.
        }
    }

    // Devuelvo la lista de Usuarios
    public function getProductos ():array {
        $tproducto = [];
        $this->stmt_productos->setFetchMode(PDO::FETCH_CLASS, 'Producto');
        
        if ( $this->stmt_productos->execute() ){
            while ( $producto = $this->stmt_productos->fetch()){
               $tproducto[]= $producto;
            }
        }
        return $tproducto;
    }
    
    // Devuelvo un usuario o false
    public function getProducto (String $PRODUCTO_NO) {
        $producto = false;
        
        $this->stmt_producto->setFetchMode(PDO::FETCH_CLASS, 'Producto');
        $this->stmt_producto->bindParam(':PRODUCTO_NO', $PRODUCTO_NO);
        if ( $this->stmt_producto->execute() ){
             if ( $obj = $this->stmt_producto->fetch()){
                $producto= $obj;
            }
        }
        return $producto;
    }
    
    // UPDATE
    public function modProducto($producto):bool{
      
        $this->stmt_modproducto->bindValue(':PRODUCTO_NO',$producto->PRODUCTO_NO);
        $this->stmt_modproducto->bindValue(':DESCRIPCION',$producto->DESCRIPCION);
        $this->stmt_modproducto->bindValue(':PRECIO_ACTUAL',$producto->PRECIO_ACTUAL);
        $this->stmt_modproducto->bindValue(':STOCK_DISPONIBLE',$producto->STOCK_DISPONIBLE);
        $this->stmt_modproducto->execute();
        $resu = ($this->stmt_modproducto->rowCount () == 1);
        return $resu;
    }

    //INSERT
    public function addProducto($producto):bool{
        
        $this->stmt_creaproducto->execute( [$producto->PRODUCTO_NO, $producto->DESCRIPCION, $producto->PRECIO_ACTUAL, $producto->STOCK_DISPONIBLE]);
        $resu = ($this->stmt_creaproducto->rowCount () == 1);
        return $resu;
    }

    //DELETE
    public function borrarProducto(String $PRODUCTO_NO):bool {
        $this->stmt_borproducto->bindParam(':PRODUCTO_NO', $PRODUCTO_NO);
        $this->stmt_borproducto->execute();
        $resu = ($this->stmt_borproducto->rowCount () == 1);
        return $resu;
    }
    
     // Evito que se pueda clonar el objeto. (SINGLETON)
    public function __clone()
    { 
        trigger_error('La clonación no permitida', E_USER_ERROR); 
    }
}

