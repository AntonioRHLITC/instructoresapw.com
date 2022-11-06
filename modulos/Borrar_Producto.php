<?php
include('../global/conexion.php');
include('../global/sesiones.php');
 
/**BORRAR CATEGORIA**/
$inputID=(isset($_POST['inputID']))?$_POST['inputID']:"";
$prod= $_POST['ProductoId'];
$borrar=$pdo->prepare("DELETE FROM tblProductos WHERE ID_Producto=:id_producto");
$borrar->bindParam(':id_producto',$prod);

if($borrar->execute()){
        header('Location:../Vistaproductos.php');
        echo '<script>alert(Producto eliminado correctamente)</script>';
}else{
        header('Location:../Vistaproductos.php');
        echo "Error al borrar Producto";
}
/**BORRAR CATEGORIA**/
?>