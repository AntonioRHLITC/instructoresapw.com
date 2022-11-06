<?php
    include('global/sesiones.php');
    include('global/conexion.php');

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
                $sql=$pdo->prepare("SELECT * FROM `tblproductos` WHERE ID_Producto=? LIMIT 1");
                $sql->execute([$id_producto]);
                $infoProducto=$sql->fetchAll(PDO::FETCH_ASSOC);
                //print_r($infoProducto);
            } 
        }else{
            echo 'Error al procesar la petición';
            exit;
        }
    }
    //session_destroy();
?>