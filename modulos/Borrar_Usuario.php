<?php
include('../global/conexion.php');
include('../global/sesiones.php');
 
/**BORRAR CATEGORIA**/
$inputID=(isset($_POST['inputID']))?$_POST['inputID']:"";
$usu= $_POST['UsuarioId'];
$borrar=$pdo->prepare("DELETE FROM tblUsuarios WHERE ID_Usuario=:id_usuario");
$borrar->bindParam(':id_usuario',$usu);

if($borrar->execute()){
        header('Location:../VistaUsuarios.php');
        echo '<script>alert(Usuario eliminado correctamente)</script>';
}else{
        header('Location:../VistaUsuarios.php');
        echo "Error al borrar Usuario";
}
/**BORRAR CATEGORIA**/
?>