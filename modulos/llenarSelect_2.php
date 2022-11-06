<?php
include('../global/conexion.php');


$planta=$_POST['planta'];
$sql=$pdo->prepare("SELECT * FROM `tblprocesos` WHERE ID_Planta ='$planta';");
$sql->execute();
$resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
//print_r($resultado);
//select-proceso-lista
$cadena="
<select name='selectProceso' id='selectProceso' class=''>
<option selected='selected' disabled>Elige un proceso</option>";

foreach($resultado as $proceso){
    $cadena=$cadena."<option value='$proceso[ID_Proceso]'>$proceso[Nombre_Proceso]</option>";
}
echo  $cadena."</select>";

?>