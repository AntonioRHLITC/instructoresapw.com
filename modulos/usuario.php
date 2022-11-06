<?php
//error_reporting(E_ALL);
include('global/sesiones.php');
include('global/conexion.php');
include('usuarios.php');

    $id_usuario = isset($_GET['ID_Usuario']) ? $_GET['ID_Usuario']: '';
    $token = isset($_GET['token']) ? $_GET['token']: '';

    if($id_usuario == '' || $token == ''){
        echo 'Error al procesar la petición';
        exit;
    }else{
        $token_tmp = hash_hmac('sha1', $id_usuario, KEY_TOKEN);
        if($token == $token_tmp){
            $sql=$pdo->prepare("SELECT count(ID_Usuario) FROM `tblusuarios` WHERE ID_Usuario=?");
            $sql->execute([$id_usuario]);
            if($sql->fetchColumn() > 0){
                $sql=$pdo->prepare("SELECT u.ID_Usuario, u.Nombre, u.Primer_Apellido, u.Segundo_Apellido, u.Num_Cel, u.Num_Nomina, u.ID_Planta, u.ID_Proceso, u.ID_Funcion, u.Correo,u.Password, u.Foto, u.Puntos, u.ID_Rol, u.ID_Estado, u.fecha_Ingreso, f.ID_Funcion, f.Nombre_Funcion, p.ID_Planta, p.Nombre_Planta, pr.ID_Proceso, pr.Nombre_Proceso, r.ID_Rol, r.Rol, e.ID_Estado, e.Nombre_Estado
                FROM `tblusuarios` u
                LEFT JOIN `tblfunciones` f ON u.ID_Funcion=f.ID_Funcion
                LEFT JOIN `tblplantas` p ON u.ID_Planta=p.ID_Planta
                LEFT JOIN `tblprocesos` pr ON u.ID_Proceso=pr.ID_Proceso
                LEFT JOIN `tblroles` r ON u.ID_Rol=r.ID_Rol
                LEFT JOIN `tblestados` e ON u.ID_Estado=e.ID_Estado WHERE ID_Usuario=? LIMIT 1");
                $sql->execute([$id_usuario]);
                $infoUsuario=$sql->fetchAll(PDO::FETCH_ASSOC);
                //print_r($infoUsuario);
            } 
        }else{
            echo 'Error al procesar la petición';
            exit;
        }
    }
?>

