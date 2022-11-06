<?php
include('../global/conexion.php');
include('../global/sesiones.php');
include("modulos/usuario.php");

//include('global/insertarImagen.php');

//RECIBE LOS VALORES DE LOS INPUT DEL FORMULARIO
$inputID=(isset($_POST['inputID']))?$_POST['inputID']:"";
$inputNombre=(isset($_POST['inputNombre']))?$_POST['inputNombre']:"";
$inputPrimerApell=(isset($_POST['inputPrimerApell']))?$_POST['inputPrimerApell']:"";
$inputSegundoApell=(isset($_POST['inputSegundoApell']))?$_POST['inputSegundoApell']:"";
$inputCel=(isset($_POST['inputCel']))?$_POST['inputCel']:"";
$inputNomina=(isset($_POST['inputNomina']))?$_POST['inputNomina']:"";
$selectPlanta=(isset($_POST['selectPlanta']))?$_POST['selectPlanta']:"";
$selectProceso=(isset($_POST['selectProceso']))?$_POST['selectProceso']:"";
$selectFuncion=(isset($_POST['selectFuncion']))?$_POST['selectFuncion']:"";
$inputCorreoE=(isset($_POST['inputCorreoE']))?$_POST['inputCorreoE']:"";
$inputPassword=(isset($_POST['inputPassword']))?$_POST['inputPassword']:"";
$selectRol=(isset($_POST['selectRol']))?$_POST['selectRol']:"";
$selectEstado=(isset($_POST['selectEstado']))?$_POST['selectEstado']:"";


$sql=$pdo->prepare("SELECT * FROM `tblusuarios` WHERE ID_Usuario=? LIMIT 1");
$sql->execute([$inputID]);
$infoUsuario=$sql->fetchAll(PDO::FETCH_ASSOC);

foreach($infoUsuario as $Usuario){
    $img1 = $Usuario['Foto'];
    $puntos = $Usuario['Puntos'];
}

MoverImagen("inputImagen1");
if (isset($_FILES["inputImagen1"])){
	$file = $_FILES["inputImagen1"];
	$nombre = $file["name"];
	$imagen1="imagenesUsuarios/".$nombre;
}else{
    $imagen1=$img1;
}

//print_r($_POST);

$actualizar=$pdo->prepare("UPDATE tblusuarios SET
Nombre=:Nombre,
Primer_Apellido=:Primer_Apellido,
Segundo_Apellido=:Segundo_Apellido,
Num_Cel=:Num_Cel,
Num_Nomina=:Num_Nomina,
ID_Planta=:ID_Planta,
ID_Proceso=:ID_Proceso,
ID_Funcion=:ID_Funcion,
Correo=:Correo,
Password=:Password,
Foto=:Foto,
Puntos=:Puntos,
ID_Rol=:ID_Rol,
ID_Estado=:ID_Estado,
fecha_Ingreso= NOW() WHERE ID_Usuario=:id_usuario");
$actualizar->bindParam(':Nombre',$inputNombre);
$actualizar->bindParam(':Primer_Apellido',$inputPrimerApell);
$actualizar->bindParam(':Segundo_Apellido',$inputSegundoApell);
$actualizar->bindParam(':Num_Cel', $inputCel);
$actualizar->bindParam(':Num_Nomina',$inputNomina);
$actualizar->bindParam(':ID_Planta',$selectPlanta);
$actualizar->bindParam(':ID_Proceso',$selectProceso);
$actualizar->bindParam(':ID_Funcion',$selectFuncion);
$actualizar->bindParam(':Correo',$inputCorreoE);
$actualizar->bindParam(':Password',$inputPassword);
$actualizar->bindParam(':Foto',$imagen1);
$actualizar->bindParam(':Puntos',$puntos);
$actualizar->bindParam(':ID_Rol',$selectRol);
$actualizar->bindParam(':ID_Estado',$selectEstado);
$actualizar->bindParam(':id_usuario',$inputID);

if($actualizar->execute()){
	header('Location:../VistaUsuarios.php');
	echo '<script>alert(Usuario modificado correctamente)</script>';
}else{
	header('Location:../VistaUsuarios.php');
	echo "Error en actualizar Usuario";
}


function MoverImagen($inputImagen){
	$extensiones = array('image/jpg', 'image/jpeg', 'image/png');
	$tamanyo_maximo = 1024 * 1024 * 4;

	$error = $_FILES[$inputImagen]['error'];

	if ($error === UPLOAD_ERR_OK) {
		if (in_array($_FILES[$inputImagen]['type'], $extensiones)) {
			if ($_FILES[$inputImagen]['size'] <= $tamanyo_maximo) {
				$directorio = '../imagenesUsuarios/';
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