<?php
//error_reporting(E_ALL);
include('global/sesiones.php');
include('global/conexion.php');
include('modulos/panel.php');

foreach($DatosUsuario as $Usuario){
    $idUsuario =  $Usuario['ID_Usuario'];
    $tiendaUsuario = $Usuario['ID_Planta'];
}

//PEDIDOS PENDIENTES DE PREPARACIÓN
$sql=$pdo->prepare("SELECT v.ID_Venta, v.ID_Tienda, v.ID_Usuario, v.Fecha, v.FechaEntrega, v.ID_Estatus, v.Total, e.NombreEstatus, u.Nombre
                    FROM tblVentas v, tblestatuspedidos e, tblusuarios u 
                    WHERE v.ID_Estatus = e.ID_Estatus
                    AND v.ID_Estatus = 2
                    AND v.ID_Usuario = u.ID_Usuario 
                    AND ID_Tienda =:idTienda ORDER BY v.Fecha ASC");
$sql->bindParam(":idTienda",$tiendaUsuario);
$sql->execute();
$ventas = $sql->fetchAll(PDO::FETCH_ASSOC);
//print_r($tiendaUsuario);
//PEDIDOS PENDIENTES DE PREPARACIÓN

//PEDIDOS PENDIENTES DE ENTREGA
$sql=$pdo->prepare("SELECT v.ID_Venta, v.ID_Tienda, v.ID_Usuario, v.Fecha, v.FechaEntrega, v.ID_Estatus, v.Total, e.NombreEstatus, u.Nombre
                    FROM tblVentas v, tblestatuspedidos e, tblusuarios u 
                    WHERE v.ID_Estatus = e.ID_Estatus
                    AND v.ID_Estatus = 3
                    AND v.ID_Usuario = u.ID_Usuario 
                    AND ID_Tienda =:idTienda ORDER BY v.Fecha ASC");
$sql->bindParam(":idTienda",$tiendaUsuario);
$sql->execute();
$pEntrega = $sql->fetchAll(PDO::FETCH_ASSOC);
//print_r($tiendaUsuario);
//PEDIDOS PENDIENTES DE PENTREGA

//PEDIDOS CANCELADOS
$sql=$pdo->prepare("SELECT v.ID_Venta, v.ID_Tienda, v.ID_Usuario, v.Fecha, v.FechaEntrega, v.ID_Estatus, v.Total, e.NombreEstatus, u.Nombre
                    FROM tblVentas v, tblestatuspedidos e, tblusuarios u 
                    WHERE v.ID_Estatus = e.ID_Estatus
                    AND v.ID_Estatus = 1
                    AND v.ID_Usuario = u.ID_Usuario 
                    AND ID_Tienda =:idTienda ORDER BY v.Fecha ASC");
$sql->bindParam(":idTienda",$tiendaUsuario);
$sql->execute();
$pCancelados = $sql->fetchAll(PDO::FETCH_ASSOC);
//print_r($tiendaUsuario);
//PEDIDOS CANCELADOS

//PEDIDOS ENTREGADOS
$sql=$pdo->prepare("SELECT v.ID_Venta, v.ID_Tienda, v.ID_Usuario, v.Fecha, v.FechaEntrega, v.ID_Estatus, v.Total, e.NombreEstatus, u.Nombre
                    FROM tblVentas v, tblestatuspedidos e, tblusuarios u 
                    WHERE v.ID_Estatus = e.ID_Estatus
                    AND v.ID_Estatus = 4
                    AND v.ID_Usuario = u.ID_Usuario 
                    AND ID_Tienda =:idTienda ORDER BY v.Fecha ASC");
$sql->bindParam(":idTienda",$tiendaUsuario);
$sql->execute();
$pEntregados = $sql->fetchAll(PDO::FETCH_ASSOC);
//print_r($tiendaUsuario);
//PEDIDOS ENTREGADOS

?>
