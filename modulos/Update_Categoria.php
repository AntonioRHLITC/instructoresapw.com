<?php
include('../global/conexion.php');
include('../global/sesiones.php');
include("modulos/categoria.php");

//include('global/insertarImagen.php');

//RECIBE LOS VALORES DE LOS INPUT DEL FORMULARIO
$inputCategoria=(isset($_POST['inputCategoria']))?$_POST['inputCategoria']:"";
$inputID=(isset($_POST['inputID']))?$_POST['inputID']:"";


$sql=$pdo->prepare("SELECT * FROM `tblcategorias` WHERE ID_Categoria=? LIMIT 1");
$sql->execute([$inputID]);
$infoCategoria=$sql->fetchAll(PDO::FETCH_ASSOC);

foreach($infoCategoria as $Categoria){
    $img1 = $Categoria['Dir_Imagen1'];
    $img2 = $Categoria['Dir_Imagen2'];
    $img3 = $Categoria['Dir_Imagen3'];
    $img4 = $Categoria['Dir_Imagen4'];
    $img5 = $Categoria['Dir_Imagen5'];
    $img6 = $Categoria['Dir_Imagen6'];
}

MoverImagen("inputImagen1");
if (isset($_FILES["inputImagen1"])){
	$file = $_FILES["inputImagen1"];
	$nombre = $file["name"];
	$imagen1="imagenesCategorias/".$nombre;
}else{
    $imagen1=$img1;
}

MoverImagen("inputImagen2");
if (isset($_FILES["inputImagen2"])){
	$file = $_FILES["inputImagen2"];
	$nombre = $file["name"];
	$imagen2="imagenesCategorias/".$nombre;
}else{
    $imagen2=$img2;
}

MoverImagen("inputImagen3");
if (isset($_FILES["inputImagen3"])){
	$file = $_FILES["inputImagen3"];
	$nombre = $file["name"];
	$imagen3="imagenesCategorias/".$nombre;
}else{
    $imagen3=$img3;
}

MoverImagen("inputImagen4");
if (isset($_FILES["inputImagen4"])){
	$file = $_FILES["inputImagen4"];
	$nombre = $file["name"];
	$imagen4="imagenesCategorias/".$nombre;
}else{
    $imagen4=$img4;
}

MoverImagen("inputImagen5");
if (isset($_FILES["inputImagen5"])){
	$file = $_FILES["inputImagen5"];
	$nombre = $file["name"];
	$imagen5="imagenesCategorias/".$nombre;
}else{
    $imagen5=$img5;
}

MoverImagen("inputImagen6");
if (isset($_FILES["inputImagen6"])){
	$file = $_FILES["inputImagen6"];
	$nombre = $file["name"];
	$imagen6="imagenesCategorias/".$nombre;
}else{
    $imagen6=$img6;
}

//print_r($_POST);

$actualizar=$pdo->prepare("UPDATE tblcategorias SET 
Nombre_Categ=:Nombre_Categ, 
Dir_Imagen1=:imagen1, 
Dir_Imagen2=:imagen2, 
Dir_Imagen3=:imagen3, 
Dir_Imagen4=:imagen4, 
Dir_Imagen5=:imagen5, 
Dir_Imagen6=:imagen6 WHERE ID_Categoria=:id_categoria");
$actualizar->bindParam(':Nombre_Categ',$inputCategoria);
$actualizar->bindParam(':imagen1',$imagen1);
$actualizar->bindParam(':imagen2',$imagen2);
$actualizar->bindParam(':imagen3',$imagen3);
$actualizar->bindParam(':imagen4',$imagen4);
$actualizar->bindParam(':imagen5',$imagen5);
$actualizar->bindParam(':imagen6',$imagen6);
$actualizar->bindParam(':id_categoria',$inputID);

if($actualizar->execute()){
	header('Location:../VistaCategorias.php');
	echo '<script>alert(Categoría Modificada correctamente)</script>';
}else{
	header('Location:../VistaCategorias.php');
	echo "Error en actualizar categoría";
}

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