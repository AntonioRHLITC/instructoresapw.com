<?php
    include('global/sesiones.php');
    include('global/conexion.php');
    include('modulos/panel.php');

    foreach($DatosUsuario as $Usuario){
        $PlantaUsuario =  $Usuario['ID_Planta'];
    }


    $id_categoria = isset($_GET['ID_Categoria']) ? $_GET['ID_Categoria']: '';
    $token = isset($_GET['token']) ? $_GET['token']: '';

    if($id_categoria == '' || $token == ''){
        echo 'Error al procesar la petición';
        exit;
    }else{
        $token_tmp = hash_hmac('sha1', $id_categoria, KEY_TOKEN);
        if($token == $token_tmp){
            $sql=$pdo->prepare("SELECT count(ID_Categoria) FROM `tblCategorias` WHERE ID_Categoria=?");
            $sql->execute([$id_categoria]);
            if($sql->fetchColumn() > 0){
                $sql=$pdo->prepare("SELECT * FROM `tblproductos` WHERE ID_Categoria=? AND ID_Tienda=$PlantaUsuario AND Stock >= 1");
                $sql->execute([$id_categoria]);
                $infoProductos=$sql->fetchAll(PDO::FETCH_ASSOC);
                //print_r($infoProductos);
            } 
        }else{
            echo 'Error al procesar la petición';
            exit;
        }
    }
    //session_destroy();
    $sql=$pdo->prepare("SELECT ca.ID_Categoria, ca.Nombre_Categ, p.ID_Categoria
        FROM `tblcategorias` ca INNER JOIN `tblproductos` p ON ca.ID_Categoria = p.ID_Categoria
        WHERE p.ID_Categoria = ? LIMIT 1");
        $sql->execute([$id_categoria]);
        $infoCategoria=$sql->fetchAll(PDO::FETCH_ASSOC);
        //print_r($infoCategoria);


?>




