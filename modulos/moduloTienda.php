<?php
    include('global/sesiones.php');
    include('global/conexion.php');
    include("modulos/panel.php");

    foreach($DatosUsuario as $Usuario){
        $PlantaUsuario =  $Usuario['ID_Planta'];
    }

    $sql=$pdo->prepare("SELECT * FROM `tblproductos` WHERE ID_Tienda =:plantaUsuario AND Stock >= 1");
    $sql->bindParam(":plantaUsuario",$PlantaUsuario);
    $sql->execute();
    $listaProductos = $sql->fetchAll(PDO::FETCH_ASSOC);
    //print_r($listaProductos);

    $sql=$pdo->prepare("SELECT * FROM `tblcategorias`");
    $sql->execute();
    $listaCategorias = $sql->fetchAll(PDO::FETCH_ASSOC);
    //print_r($PlantaUsuario);

    // CONSULTA PARA OBTENER EL NOMBRE DE LA CATEGORIA POR PRODUCTO
    //select prod.ID_Producto, prod.Nombre_Producto, prod.Precio_producto, prod.Dir_Imagen1, prod.ID_Categoria, cat.ID_Categoria, cat.Nombre_Categ
    //from tblProductos prod
    //inner join tblCategorias cat
    //on prod.ID_Categoria = cat.ID_Categoria
    //order by prod.ID_Producto asc;
         
?>

