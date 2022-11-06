<?php
//error_reporting(E_ALL);
include('global/sesiones.php');
include('global/conexion.php');

//echo "Hola soy panel en modulos";

$sentenciaSQL=$pdo->prepare("SELECT count(*) totalProductos FROM `tblproductos` ");
$sentenciaSQL->execute();
$productos=$sentenciaSQL->fetch(PDO::FETCH_ASSOC);
$totalProductos=$productos['totalProductos'];

$sentenciaSQL=$pdo->prepare("SELECT count(*) totalVentas FROM `tblventas` ");
$sentenciaSQL->execute();
$ventast=$sentenciaSQL->fetch(PDO::FETCH_ASSOC);
$totalVentas=$ventast['totalVentas'];

$sentenciaSQL=$pdo->prepare("SELECT count(*) totalUsuarios FROM `tblusuarios`");
$sentenciaSQL->execute();
$usuarios=$sentenciaSQL->fetch(PDO::FETCH_ASSOC);
$totalUsuarios=$usuarios['totalUsuarios'];

$sql=$pdo->prepare("SELECT Nombre, Primer_Apellido, Puntos FROM `tblusuarios` ORDER BY Puntos DESC LIMIT 10");
$sql->execute();
$listaRanking = $sql->fetchAll(PDO::FETCH_ASSOC);
//print_r($listaRanking);

$sql=$pdo->prepare("SELECT ID_Producto, Nombre_Producto, Stock FROM `tblproductos` WHERE Stock<=3 ORDER BY Stock ASC");
$sql->execute();
$ListaMenorStock = $sql->fetchAll(PDO::FETCH_ASSOC);
//print_r($ListaMenorStock);


//SELECT Nombre, Puntos FROM `tblUsuarios` ORDER BY Puntos DESC

if(isset($_SESSION['nombre'])){
    $nombreUsuario = $_SESSION['nombre'];
}

if(isset($_SESSION['idUsuario'])){
    $idUsuario = $_SESSION['idUsuario'];
    $sql=$pdo->prepare("SELECT * FROM `tblusuarios` WHERE ID_Usuario =:id_usuario");
    $sql->bindParam(":id_usuario",$idUsuario);
    $sql->execute();
    $DatosUsuario = $sql->fetchAll(PDO::FETCH_ASSOC);
}




?>