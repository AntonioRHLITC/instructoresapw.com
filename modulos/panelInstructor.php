<?php
error_reporting(E_ALL);
include('global/sesiones.php');
include('global/conexion.php');

//echo "Hola soy panel en modulos";

$sentenciaSQL=$pdo->prepare("SELECT count(*) totalProductos FROM `tblProductos` ");
$sentenciaSQL->execute();
$productos=$sentenciaSQL->fetch(PDO::FETCH_ASSOC);
$totalProductos=$productos['totalProductos'];

$sentenciaSQL=$pdo->prepare("SELECT count(*) totalUsuarios FROM `tblUsuarios`");
$sentenciaSQL->execute();
$usuarios=$sentenciaSQL->fetch(PDO::FETCH_ASSOC);
$totalUsuarios=$usuarios['totalUsuarios'];

$sql=$pdo->prepare("SELECT Nombre, Primer_Apellido, Puntos FROM `tblUsuarios` ORDER BY Puntos DESC LIMIT 10");
$sql->execute();
$listaRanking = $sql->fetchAll(PDO::FETCH_ASSOC);
//print_r($listaRanking);


//SELECT Nombre, Puntos FROM `tblUsuarios` ORDER BY Puntos DESC

if(isset($_SESSION['nombre'])){
    $nombreUsuario = $_SESSION['nombre'];
}

if(isset($_SESSION['idUsuario'])){
    $idUsuario = $_SESSION['idUsuario'];
    $sql=$pdo->prepare("SELECT * FROM `tblUsuarios` WHERE ID_Usuario =:id_usuario");
    $sql->bindParam(":id_usuario",$idUsuario);
    $sql->execute();
    $DatosUsuario = $sql->fetchAll(PDO::FETCH_ASSOC);
}




?>