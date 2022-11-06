<?php
include('global/sesiones.php');
include('global/conexion.php');
//echo "Hola soy categorias en modulos";

$sql=$pdo->prepare("SELECT * FROM `tblcategorias`");
$sql->execute();
$listaCategorias = $sql->fetchAll(PDO::FETCH_ASSOC);

?>