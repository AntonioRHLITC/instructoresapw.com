<?php

include('global/sesiones.php');
include('global/conexion.php');

if(isset($_POST['action'])){

    $action = $_POST['action'];
    $id_producto = isset($_POST['id_producto']) ? $_POST['id_producto']: 0;

    if($action == 'agregar'){
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;
        $stock = isset($_POST['stock']) ? $_POST['stock'] : 0;
        $respuesta = agregar($cantidad, $id_producto, $stock);
        if($respuesta > 0){
            $datos['ok'] = true;
        }else{
            $datos['ok'] = false;
        }
        $datos['sub'] = $respuesta;
    }else if($action == 'eliminar'){
        $datos['ok'] = eliminar($id_producto);
    } else{
        $datos['ok'] = false;
    }
}else{
    $datos['ok'] = false;
}
echo json_encode($datos);

function agregar($cantidad, $id_producto, $stock){
    include('global/sesiones.php');
    include('global/conexion.php');

    $res = 0;
    if($id_producto > 0 && $cantidad > 0 && is_numeric(($cantidad))){
        if(isset($_SESSION['carrito']['productos'][$id_producto])){
            if($cantidad > $stock){
                $_SESSION['carrito']['productos'][$id_producto] = $stock;
            }else{
                $_SESSION['carrito']['productos'][$id_producto] = $cantidad;
            }

            $sql=$pdo->prepare("SELECT `Precio_producto` FROM `tblproductos` WHERE ID_Producto=?");
            $sql->execute([$id_producto]);
            $row=$sql->fetchAll(PDO::FETCH_ASSOC);
            foreach($row as $producto){
                $precio = $producto['Precio_producto'];
            }

            $res = $cantidad * $precio;
            number_format($res);

            return $res;
        }
    }else{
        return $res;
    }
}

function eliminar($id_producto){
    if($id_producto > 0){
        if(isset($_SESSION['carrito']['productos'][$id_producto])){
            unset($_SESSION['carrito']['productos'][$id_producto]);
            return true;
        }
    }else{
        return false;
    }
}

?>

