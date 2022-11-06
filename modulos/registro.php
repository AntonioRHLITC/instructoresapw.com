<?php
include('global/conexion.php');
//echo "Hola soy usuarios en modulos";

$sql=$pdo->prepare("SELECT u.ID_Usuario, u.Nombre, u.Primer_Apellido, u.Segundo_Apellido, u.Num_Cel, u.Num_Nomina, u.ID_Planta, u.ID_Proceso, u.ID_Funcion, u.Correo, u.Foto, u.Puntos, u.ID_Rol, u.ID_Estado, f.ID_Funcion, f.Nombre_Funcion, p.ID_Planta, p.Nombre_Planta, pr.ID_Proceso, pr.Nombre_Proceso, r.ID_Rol, r.Rol, e.ID_Estado, e.Nombre_Estado
FROM `tblusuarios` u
LEFT JOIN `tblfunciones` f ON u.ID_Funcion=f.ID_Funcion
LEFT JOIN `tblplantas` p ON u.ID_Planta=p.ID_Planta
LEFT JOIN `tblprocesos` pr ON u.ID_Proceso=pr.ID_Proceso
LEFT JOIN `tblroles` r ON u.ID_Rol=r.ID_Rol
LEFT JOIN `tblestados` e ON u.ID_Estado=e.ID_Estado;");
$sql->execute();
$listaUsuarios = $sql->fetchAll(PDO::FETCH_ASSOC);

//CONSULTA TODAS LAS PLANTAS
$sql=$pdo->prepare("SELECT * FROM `tblplantas`;");
$sql->execute();
$listaPlantas= $sql->fetchAll(PDO::FETCH_ASSOC);

//CONSULTA TODOS LOS PROCESOS
$sql=$pdo->prepare("SELECT * FROM `tblprocesos`;");
$sql->execute();
$listaProcesos= $sql->fetchAll(PDO::FETCH_ASSOC);

//CONSULTA TODAS LAS FUNCIONES
$sql=$pdo->prepare("SELECT * FROM `tblfunciones`;");
$sql->execute();
$listaFunciones= $sql->fetchAll(PDO::FETCH_ASSOC);

//CONSULTA TODOS LOS ESTADOS
$sql=$pdo->prepare("SELECT * FROM `tblestados`;");
$sql->execute();
$listaEstados= $sql->fetchAll(PDO::FETCH_ASSOC);

//CONSULTA TODOS LOS ROLES
$sql=$pdo->prepare("SELECT * FROM `tblroles`;");
$sql->execute();
$listaRoles= $sql->fetchAll(PDO::FETCH_ASSOC);

?>
