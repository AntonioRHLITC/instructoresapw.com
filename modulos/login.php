<?php
include("global/conexion.php");
//echo "Hola soy login en modulos";
$sql=$pdo->prepare("SELECT * FROM `tblusuarios`");
$sql->execute();
$listaCursos = $sql->fetchAll(PDO::FETCH_ASSOC);
//print_r($listaCursos);

if(isset($_POST["btnLogin"])){

    include("global/conexion.php");

    $txtEmail=($_POST['txtEmail']);
    $txtPassword=($_POST['txtPassword']);

    $sql=$pdo->prepare("SELECT * FROM `tblusuarios` WHERE Correo=:Correo COLLATE utf8_bin AND Password=:Password COLLATE utf8_bin");
    $sql->bindParam("Correo",$txtEmail,PDO::PARAM_STR);
    $sql->bindParam("Password",$txtPassword,PDO::PARAM_STR);
    $sql->execute();

    $registro=$sql->fetch(PDO::FETCH_ASSOC);
    //print_r($registro);
    $idUsuario = $registro['ID_Usuario'];
    $nombre = $registro['Nombre'];
    $rol = $registro['ID_Rol'];
    $Foto = $registro['Foto'];
    //print_r($Foto);

    $numeroRegistros=$sql->rowCount();

    if($numeroRegistros>=1){
        session_start();
        $_SESSION['usuario']=$registro;
        $_SESSION['idUsuario']=$idUsuario;
        $_SESSION['nombre']=$nombre;
        $_SESSION['Foto']=$Foto;

        switch($rol){
            case 1:
                echo "Bienvenido Administrador....";
                header('Location:Vistapanel.php');
                $_SESSION['rol'] = $rol;
                break;
            case 2:
                echo "Bienvenido Instructor...";
                header('Location:VistaInstructor.php');
                $_SESSION['rol'] = $rol;
                break;
            default:
        }

    }else{
        echo '<div class="mensaje-error">';
        echo '<p>';
        echo 'El Correo o la Contraseña son incorrectos';
        echo '</p>';
        echo '</div>';
    }
}

?>