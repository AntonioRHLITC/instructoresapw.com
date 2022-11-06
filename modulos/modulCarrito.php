<?php
    include('global/sesiones.php');
    include('global/conexion.php');

    $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos']: null;
    
    $lista_carrito =  array();

    if($productos != null){
        foreach($productos as $clave => $cantidad){
            $sentencia=$pdo->prepare("SELECT ID_Producto, Nombre_Producto, Precio_producto, Dir_Imagen1 , Stock , ID_Tienda, $cantidad AS cantidad FROM `tblproductos` WHERE ID_Producto=?");
            $sentencia->execute([$clave]);
            $lista_carrito[]=$sentencia->fetch(PDO::FETCH_ASSOC);
            //print_r($listaProductos);
        }
    }
    //session_destroy();
?>