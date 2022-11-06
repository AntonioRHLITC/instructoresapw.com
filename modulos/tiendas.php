<?php
include('global/sesiones.php');
include('global/conexion.php');
//echo "Hola soy tiendas en modulos";

$sql=$pdo->prepare("SELECT * FROM `tbltiendas`");
$sql->execute();
$listaTiendas = $sql->fetchAll(PDO::FETCH_ASSOC);

//CONSULTA TODOS LOS ESTADOS
$sql=$pdo->prepare("SELECT * FROM `tblestados`;");
$sql->execute();
$listaEstados= $sql->fetchAll(PDO::FETCH_ASSOC);

//print_r($listaEstados[1]);

?>