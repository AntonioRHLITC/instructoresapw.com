<?php
include('../global/conexion.php');

//RECIBE LOS VALORES DE LOS INPUT DEL FORMULARIO
$inputNombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
$inputPrimerApell=(isset($_POST['pApellido']))?$_POST['pApellido']:"";
$inputSegundoApell=(isset($_POST['sApellido']))?$_POST['sApellido']:"";
$inputCel=(isset($_POST['telefono']))?$_POST['telefono']:"";
$inputNomina=(isset($_POST['nomina']))?$_POST['nomina']:"";
$selectPlanta=(isset($_POST['planta']))?$_POST['planta']:"";
$selectProceso=(isset($_POST['proceso']))?$_POST['proceso']:"";
$selectFuncion=(isset($_POST['funcion']))?$_POST['funcion']:"";
$inputCorreoE=(isset($_POST['correo']))?$_POST['correo']:"";
$inputPassword=(isset($_POST['password']))?$_POST['password']:"";


//print_r($_POST);

$insertar=$pdo->prepare("INSERT INTO tblusuarios(Nombre, Primer_Apellido, Segundo_Apellido, Num_Cel, Num_Nomina, ID_Planta, ID_Proceso, ID_Funcion, Correo, Password, fecha_Ingreso) VALUES (:Nombre, :Primer_Apellido, :Segundo_Apellido, :Num_Cel, :Num_Nomina, :ID_Planta, :ID_Proceso, :ID_Funcion, :Correo, :Password, NOW())");
$insertar->bindParam(':Nombre',$inputNombre);
$insertar->bindParam(':Primer_Apellido',$inputPrimerApell);
$insertar->bindParam(':Segundo_Apellido',$inputSegundoApell);
$insertar->bindParam(':Num_Cel', $inputCel);
$insertar->bindParam(':Num_Nomina',$inputNomina);
$insertar->bindParam(':ID_Planta',$selectPlanta);
$insertar->bindParam(':ID_Proceso',$selectProceso);
$insertar->bindParam(':ID_Funcion',$selectFuncion);
$insertar->bindParam(':Correo',$inputCorreoE);
$insertar->bindParam(':Password',$inputPassword);


if($insertar->execute()){
    header('Location:../login.php');
    echo '<script>alert(Usuario registrado correctamente)</script>';
}else{
        header('Location:Registro.php');
        echo "Error en registro de Usuario";
}

?>