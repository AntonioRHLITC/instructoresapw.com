<?php
include('../global/conexion.php');
include('../global/sesiones.php');
 
/**BORRAR CATEGORIA**/
$inputID=(isset($_POST['inputID']))?$_POST['inputID']:"";
$cat= $_POST['CategoriaId'];
$borrar=$pdo->prepare("DELETE FROM tblCategorias WHERE ID_Categoria=:id_categoria");
$borrar->bindParam(':id_categoria',$cat);

if($borrar->execute()){
        header('Location:../VistaCategorias.php');
        echo '<script>alert(Categoría registrada correctamente)</script>';
}else{
        header('Location:../VistaCategorias.php');
        echo "Error en registro de categoría";
}
/**BORRAR CATEGORIA**/
?>