<?php
//error_reporting(E_ALL);
include('global/sesiones.php');
include('global/conexion.php');
include('modulos/panel.php');

foreach($DatosUsuario as $Usuario){
    $idUsuario =  $Usuario['ID_Usuario'];
}

$sql=$pdo->prepare("SELECT e.ID_Estatus, e.NombreEstatus, v.ID_Venta, v.ID_Tienda, v.ID_Usuario, v.Fecha, v.Total 
                    FROM tblestatuspedidos e, tblventas v 
                    WHERE e.ID_Estatus = v.ID_Estatus
                    AND ID_Usuario =:idUsuario ORDER BY v.Fecha DESC ");
$sql->bindParam(":idUsuario",$idUsuario);
$sql->execute();
$pedidos = $sql->fetchAll(PDO::FETCH_ASSOC);
//print_r($pedidos);

?>
