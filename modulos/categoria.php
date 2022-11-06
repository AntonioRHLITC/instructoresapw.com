<?php
include('global/sesiones.php');
include('global/conexion.php');

    $id_categoria = isset($_GET['ID_Categoria']) ? $_GET['ID_Categoria']: '';
    $token = isset($_GET['token']) ? $_GET['token']: '';

    if($id_categoria == '' || $token == ''){
        echo 'Error al procesar la petición';
        exit;
    }else{
        $token_tmp = hash_hmac('sha1', $id_categoria, KEY_TOKEN);
        if($token == $token_tmp){
            $sql=$pdo->prepare("SELECT count(ID_Categoria) FROM `tblcategorias` WHERE ID_Categoria=?");
            $sql->execute([$id_categoria]);
            if($sql->fetchColumn() > 0){
                $sql=$pdo->prepare("SELECT * FROM `tblcategorias` WHERE ID_Categoria=? LIMIT 1");
                $sql->execute([$id_categoria]);
                $infoCategoria=$sql->fetchAll(PDO::FETCH_ASSOC);
                //print_r($infoProducto);
            } 
        }else{
            echo 'Error al procesar la petición';
            exit;
        }
    }
?>

