<?php
include('../global/conexion.php');
include('../global/sesiones.php');

//include('global/insertarImagen.php');

//RECIBE LOS VALORES DE LOS INPUT DEL FORMULARIO
$inputCategoria=(isset($_POST['inputCategoria']))?$_POST['inputCategoria']:"";

MoverImagen("inputImagen1");
$imagen1 = 'imagenesCategorias/'.$_FILES[$inputImagen]['name'];

MoverImagen("inputImagen2");
$imagen2 = 'imagenesCategorias/'.$_FILES[$inputImagen]['name'];

MoverImagen("inputImagen3");
$imagen3 = 'imagenesCategorias/'.$_FILES[$inputImagen]['name'];

MoverImagen("inputImagen4");
$imagen4 = 'imagenesCategorias/'.$_FILES[$inputImagen]['name'];

MoverImagen("inputImagen5");
$imagen5 = 'imagenesCategorias/'.$_FILES[$inputImagen]['name'];

MoverImagen("inputImagen6");
$imagen6 = 'imagenesCategorias/'.$_FILES[$inputImagen]['name'];

//print_r($_POST);

//echo "la categoria propuesta es: $inputCategoria";



function MoverImagen($inputImagen){
	$extensiones = array('image/jpg', 'image/jpeg', 'image/png');
	$tamanyo_maximo = 1024 * 1024 * 4;

	$error = $_FILES[$inputImagen]['error'];

	if ($error === UPLOAD_ERR_OK) {
		if (in_array($_FILES[$inputImagen]['type'], $extensiones)) {
			if ($_FILES[$inputImagen]['size'] <= $tamanyo_maximo) {
				$directorio = '../imagenesCategorias/';
				if(file_exists($directorio)){
					//echo "El fichero".$directorio." SI EXISTE";
					$archivo_subido = $directorio . basename($_FILES[$inputImagen]['name']);
					if (move_uploaded_file($_FILES[$inputImagen]['tmp_name'], $archivo_subido)) {
						return $_FILES[$inputImagen]['name'];
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