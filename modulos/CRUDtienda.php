<?php
error_reporting(E_ALL);
include('../global/conexion.php');
include('../global/sesiones.php');

//include('global/insertarImagen.php');

//RECIBE LOS VALORES DE LOS INPUT DEL FORMULARIO
$inputTienda=(isset($_POST['inputTienda']))?$_POST['inputTienda']:"";
$inputID=(isset($_POST['inputID']))?$_POST['inputID']:"";
$idUsuario=(isset($_POST['inputIDUsuario']))?$_POST['inputIDUsuario']:"";
$selectEstado=(isset($_POST['selectEstado']))?$_POST['selectEstado']:"";


MoverImagen("inputImagen1");
if (isset($_FILES["inputImagen1"])){
	$file = $_FILES["inputImagen1"];
	$nombre = $file["name"];
	$imagen1="imagenesTiendas/".$nombre;
}

//print_r($_POST);

//echo "la Tienda propuesta es: $inputTienda";
$insertar=$pdo->prepare("INSERT INTO tbltiendas(Nombre_Tienda, Fecha_Add, Foto, ID_Usuario, ID_Estado) VALUES (:Nombre_Tienda, NOW(), :Foto, :ID_Usuario, :ID_Estado)");
$insertar->bindParam(':Nombre_Tienda',$inputTienda);
$insertar->bindParam(':Foto',$imagen1);
$insertar->bindParam(':ID_Usuario',$idUsuario);
$insertar->bindParam(':ID_Estado',$selectEstado);

if($insertar->execute()){
        header('Location:../VistaTiendas.php');
        echo '<script>alert(Tienda registrada correctamente)</script>';
}else{
        header('Location:../VistaTiendas.php');
        echo "Error en registro de Tienda";
}

function MoverImagen($inputImagen){
	$extensiones = array('image/jpg', 'image/jpeg', 'image/png');
	$tamanyo_maximo = 1024 * 1024 * 4;

	$error = $_FILES[$inputImagen]['error'];

	if ($error === UPLOAD_ERR_OK) {
		if (in_array($_FILES[$inputImagen]['type'], $extensiones)) {
			if ($_FILES[$inputImagen]['size'] <= $tamanyo_maximo) {
				$directorio = '../imagenesTiendas/';
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