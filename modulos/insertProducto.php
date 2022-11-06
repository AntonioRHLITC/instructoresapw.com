<?php
include('global/sesiones.php');
include('global/conexion.php');
//include('global/insertarImagen.php');

if(isset($_SESSION['idUsuario'])){
    $idUsuario = $_SESSION['idUsuario'];
}

//CONSULTA TODAS LAS CATEGORIAS
$sql=$pdo->prepare("SELECT * FROM `tblCategorias`;");
$sql->execute();
$listaCategorias= $sql->fetchAll(PDO::FETCH_ASSOC);

//CONSULTA TODOS LOS ESTADOS
$sql=$pdo->prepare("SELECT * FROM `tblEstados`;");
$sql->execute();
$listaEstados= $sql->fetchAll(PDO::FETCH_ASSOC);

//CONSULTA TODAS LAS TIENDAS
$sql=$pdo->prepare("SELECT * FROM `tblTiendas`;");
$sql->execute();
$listaTiendas= $sql->fetchAll(PDO::FETCH_ASSOC);  


//RECIBE LOS VALORES DE LOS INPUT DEL FORMULARIO
$inputNombre=(isset($_POST['inputNombre']))?$_POST['inputNombre']:"";
$inputPrecio=(isset($_POST['inputPrecio']))?$_POST['inputPrecio']:"";
$inputStock=(isset($_POST['inputStock']))?$_POST['inputStock']:"";
$inputMarca=(isset($_POST['inputMarca']))?$_POST['inputMarca']:"";
$selectCategoria=(isset($_POST['selectCategoria']))?$_POST['selectCategoria']:"";
$selectEstado=(isset($_POST['selectEstado']))?$_POST['selectEstado']:"";
$selectTienda=(isset($_POST['selectTienda']))?$_POST['selectTienda']:"";
$inputDescripcion=(isset($_POST['inputDescripcion']))?$_POST['inputDescripcion']:"";
$inputCaracteristicas=(isset($_POST['inputCaracteristicas']))?$_POST['inputCaracteristicas']:"";
$inputDetalle=(isset($_POST['inputDetalle']))?$_POST['inputDetalle']:"";
$inputModelo=(isset($_POST['inputModelo']))?$_POST['inputModelo']:"";
$inputPeso=(isset($_POST['inputPeso']))?$_POST['inputPeso']:"";
$inputCondicion=(isset($_POST['inputCondicion']))?$_POST['inputCondicion']:"";
$inputMaterial=(isset($_POST['inputMaterial']))?$_POST['inputMaterial']:"";
$inputContenido=(isset($_POST['inputContenido']))?$_POST['inputContenido']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

switch($accion){
    case "btnAgregar":
        $insertar=$pdo->prepare("INSERT INTO `tblProductos` ('Nombre_Producto', 'Marca', 'Precio_producto', 'Descr_Producto', 'Carac_Destacadas', 'Detalle_Producto', 'Stock', 'ID_Categoria', 'ID_Usuario', 'Modelo', 'Peso', 'Condicion', 'Material', 'Conten_Caja', 'ID_Estado', 'ID_Tienda') VALUES (':Nombre_Producto', ':Marca', ':Precio_producto', ':Descr_Producto', ':Carac_Destacadas', ':Detalle_Producto', ':Stock', ':ID_Categoria', ':ID_Usuario', ':Modelo', ':Peso', ':Condicion', ':Material', ':Conten_Caja', ':ID_Estado', ':ID_Tienda')");
        $insertar->bindParam(':Nombre_Producto',$inputNombre);
        $insertar->bindParam(':Marca',$inputMarca);
        $insertar->bindParam(':Precio_producto',$inputPrecio);
        $insertar->bindParam(':Descr_Producto', $inputDescripcion);
        $insertar->bindParam(':Carac_Destacadas',$inputCaracteristicas);
        $insertar->bindParam(':Detalle_Producto',$inputDetalle);
        $insertar->bindParam(':Stock',$inputStock);
        $insertar->bindParam(':ID_Categoria',$selectCategoria);
        $insertar->bindParam(':ID_Usuario',$idUsuario);
        $insertar->bindParam(':Modelo',$inputModelo);
        $insertar->bindParam(':Peso',$inputPeso);
        $insertar->bindParam(':Condicion',$inputCondicion);
        $insertar->bindParam(':Material',$inputMaterial);
        $insertar->bindParam(':Conten_Caja',$inputContenido);
        $insertar->bindParam(':ID_Estado',$selectEstado);
        $insertar->bindParam(':ID_Tienda',$selectTienda);

        $insertar->execute();
        header("location: ../Vistaproductos.php");
        print_r("PRODUCTO REGISTRADO CORRECTAMENTE");

        break;
}










?>