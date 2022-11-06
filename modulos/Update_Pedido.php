<?php
error_reporting(E_ALL);
include('../global/conexion.php');
include('../global/sesiones.php');
include("modulos/moduloPedidoAdmin.php");

//include('global/insertarImagen.php');

//RECIBE LOS VALORES DE LOS INPUT DEL FORMULARIO
$idventa=(isset($_POST['id_venta']))?$_POST['id_venta']:"";
$selectEstatus=(isset($_POST['selectEstatus']))?$_POST['selectEstatus']:"";
$tareaComentario=(isset($_POST['inputComent']))?$_POST['inputComent']:"";

//

foreach($datosVenta  as $infoVenta){
    //$id_venta = $infoVenta['ID_Venta'];
}


print_r($idventa);
//print_r($_POST);

$actualizar=$pdo->prepare("UPDATE tblventas SET
ID_Estatus=:ID_Estatus,
Comentario=:Comentario WHERE ID_Venta=:id_venta");
$actualizar->bindParam(':ID_Estatus',$selectEstatus);
$actualizar->bindParam(':Comentario',$tareaComentario);
$actualizar->bindParam(':id_venta',$idventa);

if($actualizar->execute()){
	header('Location:../Vistaventas.php');
    echo "Petición realizada exitosamente";
}else{
	header('Location:../Vistaventas.php');
	echo "Error al actualizar el pedido";
}

?>