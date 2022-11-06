<?php
include('global/conexion.php');
//echo "Hola soy productos en modulos";

$sql=$pdo->prepare("SELECT * FROM `tblcursos`");
$sql->execute();
$listaCursos = $sql->fetchAll(PDO::FETCH_ASSOC);

?>