<?php
include('global/sesiones.php');
include('global/conexion.php');

    $id_tienda = isset($_GET['ID_Tienda']) ? $_GET['ID_Tienda']: '';
    $token = isset($_GET['token']) ? $_GET['token']: '';

    if($id_tienda == '' || $token == ''){
        echo 'Error al procesar la petición';
        exit;
    }else{
        $token_tmp = hash_hmac('sha1', $id_tienda, KEY_TOKEN);
        if($token == $token_tmp){
            $sql=$pdo->prepare("SELECT count(ID_Tienda) FROM `tbltiendas` WHERE ID_Tienda=?");
            $sql->execute([$id_tienda]);
            if($sql->fetchColumn() > 0){
                //CONSULTA DATOS DE TIENDA Y SU ESTADO(NOMBRE)
                $sql=$pdo->prepare("SELECT * 
                FROM `tbltiendas` T
                JOIN tblestados E
                ON T.ID_Estado = E.ID_Estado
                WHERE T.ID_Tienda=? LIMIT 1;");
                $sql->execute([$id_tienda]);
                $infoTienda= $sql->fetchAll(PDO::FETCH_ASSOC);
                //print_r($infoTienda);
            } 
        }else{
            echo 'Error al procesar la petición';
            exit;
        }
    }
?>

