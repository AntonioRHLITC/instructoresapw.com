<?php
include('../global/conexion.php');
include('../global/sesiones.php');
include("modulos/producto.php");

//include('global/insertarImagen.php');

//RECIBE LOS VALORES DE LOS INPUT DEL FORMULARIO
$inputID=(isset($_POST['inputID']))?$_POST['inputID']:"";
$inputNombre=(isset($_POST['inputNombre']))?$_POST['inputNombre']:"";
$inputMarca=(isset($_POST['inputMarca']))?$_POST['inputMarca']:"";
$inputPrecio=(isset($_POST['inputPrecio']))?$_POST['inputPrecio']:"";
$inputDescripcion=(isset($_POST['inputDescripcion']))?$_POST['inputDescripcion']:"";
$inputCaracteristicas=(isset($_POST['inputCaracteristicas']))?$_POST['inputCaracteristicas']:"";
$inputDetalle=(isset($_POST['inputDetalle']))?$_POST['inputDetalle']:"";
$inputStock=(isset($_POST['inputStock']))?$_POST['inputStock']:"";
$selectCategoria=(isset($_POST['selectCategoria']))?$_POST['selectCategoria']:"";
$idUsuario=(isset($_POST['inputIDUsuario']))?$_POST['inputIDUsuario']:"";
$inputModelo=(isset($_POST['inputModelo']))?$_POST['inputModelo']:"";
$inputPeso=(isset($_POST['inputPeso']))?$_POST['inputPeso']:"";
$inputCondicion=(isset($_POST['inputCondicion']))?$_POST['inputCondicion']:"";
$inputMaterial=(isset($_POST['inputMaterial']))?$_POST['inputMaterial']:"";
$inputContenido=(isset($_POST['inputContenido']))?$_POST['inputContenido']:"";
$selectEstado=(isset($_POST['selectEstado']))?$_POST['selectEstado']:"";
$selectTienda=(isset($_POST['selectTienda']))?$_POST['selectTienda']:"";


$sql=$pdo->prepare("SELECT * FROM `tblproductos` WHERE ID_Producto=? LIMIT 1");
$sql->execute([$inputID]);
$infoProducto=$sql->fetchAll(PDO::FETCH_ASSOC);

foreach($infoProducto as $Producto){
    $img1 = $Producto['Dir_Imagen1'];
    $img2 = $Producto['Dir_Imagen2'];
    $img3 = $Producto['Dir_Imagen3'];
    $img4 = $Producto['Dir_Imagen4'];
}

MoverImagen("inputImagen1");
if (isset($_FILES["inputImagen1"])){
	$file = $_FILES["inputImagen1"];
	$nombre = $file["name"];
	$imagen1="imagenesProductos/".$nombre;
}else{
    $imagen1=$img1;
}

MoverImagen("inputImagen2");
if (isset($_FILES["inputImagen2"])){
	$file = $_FILES["inputImagen2"];
	$nombre = $file["name"];
	$imagen2="imagenesProductos/".$nombre;
}else{
    $imagen2=$img2;
}

MoverImagen("inputImagen3");
if (isset($_FILES["inputImagen3"])){
	$file = $_FILES["inputImagen3"];
	$nombre = $file["name"];
	$imagen3="imagenesProductos/".$nombre;
}else{
    $imagen3=$img3;
}

MoverImagen("inputImagen4");
if (isset($_FILES["inputImagen4"])){
	$file = $_FILES["inputImagen4"];
	$nombre = $file["name"];
	$imagen4="imagenesProductos/".$nombre;
}else{
    $imagen4=$img4;
}

//print_r($_POST);

$actualizar=$pdo->prepare("UPDATE tblproductos SET
Nombre_Producto=:Nombre_Producto,
Marca=:Marca,
Precio_producto=:Precio_producto,
Descr_Producto=:Descr_Producto,
Carac_Destacadas=:Carac_Destacadas,
Detalle_Producto=:Detalle_Producto,
Stock=:Stock,
Dir_Imagen1=:Dir_Imagen1,
Dir_Imagen2=:Dir_Imagen2,
Dir_Imagen3=:Dir_Imagen3,
Dir_Imagen4=:Dir_Imagen4,
ID_Categoria=:ID_Categoria,
ID_Usuario=:ID_Usuario,
Date_Add= NOW(),
Modelo=:Modelo,
Peso=:Peso,
Condicion=:Condicion,
Material=:Material,
Conten_Caja=:Conten_Caja,
ID_Estado=:ID_Estado,
ID_Tienda=:ID_Tienda WHERE ID_Producto=:id_producto");
$actualizar->bindParam(':Nombre_Producto',$inputNombre);
$actualizar->bindParam(':Marca',$inputMarca);
$actualizar->bindParam(':Precio_producto',$inputPrecio);
$actualizar->bindParam(':Descr_Producto', $inputDescripcion);
$actualizar->bindParam(':Carac_Destacadas',$inputCaracteristicas);
$actualizar->bindParam(':Detalle_Producto',$inputDetalle);
$actualizar->bindParam(':Stock',$inputStock);
$actualizar->bindParam(':Dir_Imagen1',$imagen1);
$actualizar->bindParam(':Dir_Imagen2',$imagen2);
$actualizar->bindParam(':Dir_Imagen3',$imagen3);
$actualizar->bindParam(':Dir_Imagen4',$imagen4);
$actualizar->bindParam(':ID_Categoria',$selectCategoria);
$actualizar->bindParam(':ID_Usuario',$idUsuario);
$actualizar->bindParam(':Modelo',$inputModelo);
$actualizar->bindParam(':Peso',$inputPeso);
$actualizar->bindParam(':Condicion',$inputCondicion);
$actualizar->bindParam(':Material',$inputMaterial);
$actualizar->bindParam(':Conten_Caja',$inputContenido);
$actualizar->bindParam(':ID_Estado',$selectEstado);
$actualizar->bindParam(':ID_Tienda',$selectTienda);
$actualizar->bindParam(':id_producto',$inputID);


if($actualizar->execute()){
	header('Location:../Vistaproductos.php');
	echo '<script>alert(Producto modificado correctamente)</script>';
}else{
	header('Location:../Vistaproductos.php');
	echo "Error en actualizar Producto";
}


function MoverImagen($inputImagen){
	$extensiones = array('image/jpg', 'image/jpeg', 'image/png');
	$tamanyo_maximo = 1024 * 1024 * 4;

	$error = $_FILES[$inputImagen]['error'];

	if ($error === UPLOAD_ERR_OK) {
		if (in_array($_FILES[$inputImagen]['type'], $extensiones)) {
			if ($_FILES[$inputImagen]['size'] <= $tamanyo_maximo) {
				$directorio = '../imagenesProductos/';
				if(file_exists($directorio)){
					//echo "El fichero".$directorio." SI EXISTE";
					$archivo_subido = $directorio . basename($_FILES[$inputImagen]['name']);
					if (move_uploaded_file($_FILES[$inputImagen]['tmp_name'], $archivo_subido)) {;

						//echo 'Se ha subido el archivo correctamente';
					} else {
						echo 'Ha ocurrido un error mientras se movía el archivo';
					}
				}else{
					echo "El fichero".$directorio." NO EXISTE";
				}
			} else {
				echo 'El archivo excede el tamaño máximo de ' . $tamanyo_maximo . ' bytes';
			}
		} else {
			echo 'La extensión es incorrecta. El archivo no ha podido subirse';
		}
	} else {
		if ($error === UPLOAD_ERR_INI_SIZE || $error === UPLOAD_ERR_FORM_SIZE) {
			echo 'El tamaño del archivo sobrepasa el máximo permitido';
		} elseif ($error === UPLOAD_ERR_PARTIAL || $error === UPLOAD_ERR_NO_FILE) {
			echo 'El archivo no ha podido subirse correctamente';
		} elseif ($error === UPLOAD_ERR_NO_TMP_DIR) {
			echo 'No existe la carpeta temporal, contacta con el proveedor del hosting';
		} elseif ($error === UPLOAD_ERR_CANT_WRITE || $error === UPLOAD_ERR_EXTENSION) {
			echo 'Ha ocurrido un error durante la subida del archivo';
		}
	}
}
?>