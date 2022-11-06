<?php
include('../global/conexion.php');
include('../global/sesiones.php');

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


MoverImagen("inputImagen1");
if (isset($_FILES["inputImagen1"])){
	$file = $_FILES["inputImagen1"];
	$nombre = $file["name"];
	$imagen1="imagenesProductos/".$nombre;
}

MoverImagen("inputImagen2");
if (isset($_FILES["inputImagen2"])){
	$file = $_FILES["inputImagen2"];
	$nombre = $file["name"];
	$imagen2="imagenesProductos/".$nombre;
}

MoverImagen("inputImagen3");
if (isset($_FILES["inputImagen3"])){
	$file = $_FILES["inputImagen3"];
	$nombre = $file["name"];
	$imagen3="imagenesProductos/".$nombre;
}

MoverImagen("inputImagen4");
if (isset($_FILES["inputImagen4"])){
	$file = $_FILES["inputImagen4"];
	$nombre = $file["name"];
	$imagen4="imagenesProductos/".$nombre;
}

//print_r($_POST);

//echo "la categoria propuesta es: $inputCategoria";
$insertar=$pdo->prepare("INSERT INTO tblproductos(Nombre_Producto, Marca, Precio_producto, Descr_Producto, Carac_Destacadas, Detalle_Producto, Stock, Dir_Imagen1, Dir_Imagen2, Dir_Imagen3, Dir_Imagen4, ID_Categoria, ID_Usuario, Date_Add, Modelo, Peso, Condicion, Material, Conten_Caja, ID_Estado, ID_Tienda ) VALUES (:Nombre_Producto, :Marca, :Precio_producto, :Descr_Producto, :Carac_Destacadas, :Detalle_Producto, :Stock, :Dir_Imagen1, :Dir_Imagen2, :Dir_Imagen3, :Dir_Imagen4, :ID_Categoria, :ID_Usuario, NOW(), :Modelo, :Peso, :Condicion, :Material, :Conten_Caja, :ID_Estado, :ID_Tienda)");
$insertar->bindParam(':Nombre_Producto',$inputNombre);
$insertar->bindParam(':Marca',$inputMarca);
$insertar->bindParam(':Precio_producto',$inputPrecio);
$insertar->bindParam(':Descr_Producto', $inputDescripcion);
$insertar->bindParam(':Carac_Destacadas',$inputCaracteristicas);
$insertar->bindParam(':Detalle_Producto',$inputDetalle);
$insertar->bindParam(':Stock',$inputStock);
$insertar->bindParam(':Dir_Imagen1',$imagen1);
$insertar->bindParam(':Dir_Imagen2',$imagen2);
$insertar->bindParam(':Dir_Imagen3',$imagen3);
$insertar->bindParam(':Dir_Imagen4',$imagen4);
$insertar->bindParam(':ID_Categoria',$selectCategoria);
$insertar->bindParam(':ID_Usuario',$idUsuario);
$insertar->bindParam(':Modelo',$inputModelo);
$insertar->bindParam(':Peso',$inputPeso);
$insertar->bindParam(':Condicion',$inputCondicion);
$insertar->bindParam(':Material',$inputMaterial);
$insertar->bindParam(':Conten_Caja',$inputContenido);
$insertar->bindParam(':ID_Estado',$selectEstado);
$insertar->bindParam(':ID_Tienda',$selectTienda);

if($insertar->execute()){
        header('Location:../Vistaproductos.php');
        echo '<script>alert(Categoría registrada correctamente)</script>';
}else{
        header('Location:../Vistaproductos.php');
        echo "Error en registro de categoría";
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
						echo 'Ha ocurrido un error mientras se movía el archivo, posiblemente los permisos de la carpeta destino son incorrectos';
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