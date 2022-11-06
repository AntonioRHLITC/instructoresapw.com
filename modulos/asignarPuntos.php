<?php
include('../global/conexion.php');
include('../global/sesiones.php');
 
/**BORRAR CATEGORIA**/
$inputID=(isset($_POST['inputID']))?$_POST['inputID']:"";
$Puntos= $_POST['PuntosUsuario'];
$Usuario= $_POST['Usuario'];
$borrar=$pdo->prepare("UPDATE tblusuarios SET Puntos= Puntos+:Puntos WHERE ID_Usuario=:id_usuario");
$borrar->bindParam(':Puntos',$Puntos);
$borrar->bindParam(':id_usuario',$Usuario);

if($borrar->execute()){
        header('Location:../VistaUsuarios.php');
        echo '<script>alert(Puntos asignados correctamente)</script>';
}else{
        header('Location:../VistaUsuarios.php');
        echo "Error al asignar Puntos";
}
/**BORRAR CATEGORIA**/
?>