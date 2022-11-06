<?php
include('../global/conexion.php');
include('../global/sesiones.php');
 
/**BORRAR CATEGORIA**/
$inputID=(isset($_POST['inputID']))?$_POST['inputID']:"";
$tie= $_POST['TiendaId'];
$borrar=$pdo->prepare("DELETE FROM tblTiendas WHERE ID_Tienda=:id_tienda");
$borrar->bindParam(':id_tienda',$tie);

if($borrar->execute()){
        header('Location:../VistaTiendas.php');
        echo '<script>alert(Tienda eliminada correctamente)</script>';
}else{
        header('Location:../VistaCategorias.php');
        echo "Error al borrar Tienda";
}
/**BORRAR CATEGORIA**/
?>