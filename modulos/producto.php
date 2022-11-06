<?php
include('global/sesiones.php');
include('global/conexion.php');
include('productos.php');

    $id_producto = isset($_GET['ID_Producto']) ? $_GET['ID_Producto']: '';
    $token = isset($_GET['token']) ? $_GET['token']: '';

    if($id_producto == '' || $token == ''){
        echo 'Error al procesar la petición';
        exit;
    }else{
        $token_tmp = hash_hmac('sha1', $id_producto, KEY_TOKEN);
        if($token == $token_tmp){
            $sql=$pdo->prepare("SELECT count(ID_Producto) FROM `tblproductos` WHERE ID_Producto=?");
            $sql->execute([$id_producto]);
            if($sql->fetchColumn() > 0){
                $sql=$pdo->prepare("SELECT p.ID_Producto, p.Nombre_Producto, p.Marca, p.Precio_producto, p.Descr_Producto, p.Carac_Destacadas, p.Detalle_Producto, p.Stock, p.Dir_Imagen1, p.Dir_Imagen2, p.Dir_Imagen3, p.Dir_Imagen4, p.Modelo, p.Peso, p.Condicion, p.Material, p.Conten_Caja, t.ID_Tienda, t.Nombre_Tienda, c.ID_Categoria, c.Nombre_Categ, e.ID_Estado, e.Nombre_Estado
                FROM `tblproductos` p
                LEFT JOIN `tbltiendas` t ON p.ID_Tienda=t.ID_Tienda
                LEFT JOIN `tblcategorias` c ON p.ID_Categoria=c.ID_Categoria
                LEFT JOIN `tblestados` e ON p.ID_Estado=e.ID_Estado WHERE ID_Producto=? LIMIT 1");
                $sql->execute([$id_producto]);
                $infoProducto=$sql->fetchAll(PDO::FETCH_ASSOC);
                //print_r($infoProducto);
            } 
        }else{
            echo 'Error al procesar la petición';
            exit;
        }
    }
?>

