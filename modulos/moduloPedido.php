<?php
    include('global/sesiones.php');
    include('global/conexion.php');

    $id_venta = isset($_GET['ID_Venta']) ? $_GET['ID_Venta']: '';
    $token = isset($_GET['token']) ? $_GET['token']: '';

    if($id_venta == '' || $token == ''){
        echo 'Error al procesar la petición';
        exit;
    }else{
        $token_tmp = hash_hmac('sha1', $id_venta, KEY_TOKEN);
        if($token == $token_tmp){
            $sql=$pdo->prepare("SELECT count(ID_Venta) FROM `tblventas` WHERE ID_Venta=?");
            $sql->execute([$id_venta]);
            if($sql->fetchColumn() > 0){
                $sql=$pdo->prepare("SELECT d.ID_Detalle, d.ID_Venta, d.ID_Producto, d.PrecioUnit, d.Cantidad, d.Total, p.Nombre_Producto, p.Dir_Imagen1
                                    FROM tbldetalleventa d, tblproductos p
                                    WHERE d.ID_Producto = p.ID_Producto
                                    AND d.ID_Venta = ?");
                $sql->execute([$id_venta]);
                $detalleVenta=$sql->fetchAll(PDO::FETCH_ASSOC);
                //print_r($detalleVenta);

                $sql=$pdo->prepare("SELECT e.ID_Estatus, e.NombreEstatus, v.ID_Venta, v.ID_Tienda, v.ID_Usuario, v.Fecha, v.Total 
                    FROM tblestatuspedidos e, tblventas v 
                    WHERE e.ID_Estatus = v.ID_Estatus
                    AND v.ID_Venta = ? ");
                $sql->execute([$id_venta]);
                $datosVenta = $sql->fetchAll(PDO::FETCH_ASSOC);
                //print_r($pedidos);
                            } 
        }else{
            echo 'Error al procesar la petición';
            exit;
        }
    }
    //session_destroy();
?>