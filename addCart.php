<?php

include("modulos/cartStore.php");

if (isset($_POST['id_producto'])) {//validar si nos estan enviando una variable con el nombre id_producto

    $id_producto = $_POST['id_producto'];//se recibe el dato id_producto
    $token = $_POST['token'];//se recibe el dato token
    $cantidad = $_POST['cantidad'];
    $stock = $_POST['stock'];//Se recibe el stock del producto a agregar al carrito

    $token_tmp = hash_hmac('sha1', $id_producto, KEY_TOKEN);
    //valida que el TOKEN sea correcto
    if ($token == $token_tmp) {
        if (isset($_SESSION['carrito']['productos'][$id_producto])) {//variable de sesión
            if($cantidad > $stock){
                $_SESSION['carrito']['productos'][$id_producto] += $stock;
                $datos['ok'] = false;
            }else{
                $_SESSION['carrito']['productos'][$id_producto] += $cantidad;
                $datos['ok'] = true;
            }                
        } if($cantidad > $stock){
            $_SESSION['carrito']['productos'][$id_producto] = $stock;
            $datos['ok'] = false;
        }else {
            $_SESSION['carrito']['productos'][$id_producto] = $cantidad;
            
            $datos['ok'] = true;
        }
    $datos['numero'] = count($_SESSION['carrito']['productos']);
    } else {
        $datos['ok'] = false;
    }
} else {
    $datos['ok'] = false;//valida si no detecta que nos esten envaindo ningun dato o información
}

echo json_encode($datos);
?>