<?php
include('global/sesiones.php');
include('global/conexion.php');
//echo "Hola soy productos en modulos";

$sql=$pdo->prepare("SELECT p.ID_Producto, p.Nombre_Producto, p.Marca, p.Precio_producto, p.Descr_Producto, p.Carac_Destacadas, p.Detalle_Producto, p.Stock, p.Dir_Imagen1, p.Dir_Imagen2, p.Dir_Imagen3, p.Dir_Imagen4, p.Modelo, p.Peso, p.Condicion, p.Material, p.Conten_Caja, t.Nombre_Tienda, c.Nombre_Categ, e.Nombre_Estado
FROM `tblproductos` p
LEFT JOIN `tbltiendas` t ON p.ID_Tienda=t.ID_Tienda
LEFT JOIN `tblcategorias` c ON p.ID_Categoria=c.ID_Categoria
LEFT JOIN `tblestados` e ON p.ID_Estado=e.ID_Estado;");
$sql->execute();
$listaProductos = $sql->fetchAll(PDO::FETCH_ASSOC);

//CONSULTA TODOS LOS ESTADOS
$sql=$pdo->prepare("SELECT * FROM `tblestados`;");
$sql->execute();
$listaEstados= $sql->fetchAll(PDO::FETCH_ASSOC);

//CONSULTA TODAS LAS CATEGORIAS
$sql=$pdo->prepare("SELECT * FROM `tblcategorias`;");
$sql->execute();
$listaCategorias= $sql->fetchAll(PDO::FETCH_ASSOC);

//CONSULTA TODAS LAS TIENDAS
$sql=$pdo->prepare("SELECT * FROM `tbltiendas`;");
$sql->execute();
$listaTiendas= $sql->fetchAll(PDO::FETCH_ASSOC);

?>