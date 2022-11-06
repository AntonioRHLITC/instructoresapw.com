<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

$img= $_POST['rutaImg'];
$file = (isset($_POST['rutaImg']))? (string) $_POST['rutaImg']:$img;

$Dir = $_POST['Dir'];
$DirF = (isset($_POST['Dir']))? (string) $_POST['Dir']:$Dir;

if(unlink('../'.$DirF.$file)){
    $respuesta = array("exito"=>"La imágen fue eliminada correctamente");
}else{
    $respuesta = array("error"=>"Error: La imágen no ha sido borrada");
}
echo json_encode($respuesta);

?>