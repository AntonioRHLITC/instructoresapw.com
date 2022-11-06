<?php
include("../global/sesiones.php");
include("../global/conexion.php");
include("modulCarrito.php");
include("panel.php");
//error_reporting(E_ALL);
 
    foreach($DatosUsuario as $Usuario){
        $usuario = $Usuario['ID_Usuario'];
        $PlantaUsuario =  $Usuario['ID_Planta'];
        $puntosUsuario = $Usuario['Puntos'];
    }

    foreach($lista_carrito as $producto){
        $_id_producto = $producto['ID_Producto'];
        $nombre_producto = $producto['Nombre_Producto'];
        $precio_producto = $producto['Precio_producto'];
        $imagen1 = $producto['Dir_Imagen1'];
        $cantidad = $producto['cantidad'];
        $subtotalWF = $cantidad * $precio_producto;
        $tienda = $producto['ID_Tienda'];
        $subtotal = number_format($subtotalWF);
        $totalWF += $subtotalWF;
        $total = number_format($totalWF);
    }


    $puntos=(isset($_POST['puntos']))?$_POST['puntos']:"";
    $totalVenta=(isset($_POST['total']))?$_POST['total']:"";

    if ($puntos >= $totalVenta) {//valida si el Usuario cuenta con suficientes puntos para realizar la compra

        $nuevaVenta=$pdo->prepare("INSERT INTO `tblventas`(ID_Tienda, ID_Usuario, Fecha, Total) VALUES (:ID_Tienda, :ID_Usuario, NOW(), :Total)");
        $nuevaVenta->bindParam(':ID_Tienda',$tienda );
        $nuevaVenta->bindParam(':ID_Usuario',$usuario);
        $nuevaVenta->bindParam(':Total',$totalVenta);
        $nuevaVenta->execute();//INSERT que crea un nuevo registro en la tabla VENTA

        $ulitimaVenta = $pdo->lastInsertId();//Obtenemos el ID del ultimo registro realizao
        foreach($lista_carrito as $producto){//Para cada uno de los elementos (productos) de la lista del CARRITO
            $_id_producto = $producto['ID_Producto'];
            $nombre_producto = $producto['Nombre_Producto'];
            $precio_producto = $producto['Precio_producto'];
            $imagen1 = $producto['Dir_Imagen1'];
            $stock = $producto['Stock'];
            $cantidad = $producto['cantidad'];
            $subtotalWF = $cantidad * $precio_producto;
            $tienda = $producto['ID_Tienda'];
            $subtotal = number_format($subtotalWF);
            $totalWF += $subtotalWF;
            $total = number_format($totalWF);

            $nuevoDetalle=$pdo->prepare("INSERT INTO `tbldetalleventa`(ID_Venta, ID_Producto, PrecioUnit, Cantidad, Total) VALUES (:ID_Venta, :ID_Producto, :PrecioUnit, :Cantidad, :Total)");
            $nuevoDetalle->bindParam(':ID_Venta',$ulitimaVenta);
            $nuevoDetalle->bindParam(':ID_Producto',$_id_producto);
            $nuevoDetalle->bindParam(':PrecioUnit',$precio_producto);
            $nuevoDetalle->bindParam(':Cantidad',$cantidad);
            $nuevoDetalle->bindParam(':Total',$subtotalWF);
            $nuevoDetalle->execute();//INSERT que genera un nuevo registro en la tabla DETALLEVENTA
        }   
        $puntosRestantes = $puntosUsuario - $totalVenta;

        $refreshPuntos=$pdo->prepare("UPDATE `tblusuarios` SET Puntos=:Puntos WHERE ID_Usuario=:id_usuario");
        $refreshPuntos->bindParam(':Puntos',$puntosRestantes);
        $refreshPuntos->bindParam(':id_usuario',$usuario);
        $refreshPuntos->execute();//UPDATE para RESTARLE los puntos de la nueva transacción al USUARIO correspondiente

        foreach($lista_carrito as $producto){//Para cada uno de los elementos (productos) de la lista del CARRITO
            $_id_producto = $producto['ID_Producto'];
            $stock = $producto['Stock'];
            $cantidad = $producto['cantidad'];

            $stockRestante = $stock - $cantidad;

            $refreshProducto=$pdo->prepare("UPDATE `tblproductos` SET Stock=:Stock WHERE ID_Producto=:id_producto");
            $refreshProducto->bindParam(':Stock',$stockRestante);
            $refreshProducto->bindParam(':id_producto',$_id_producto);
            $refreshProducto->execute();//UPDATE para RESTAR del STOCK total de cada producto, la cantidad adquirida.
        }
        unset($_SESSION['carrito']['productos']);//Elimina toda la lista del carrito ( una vez que se proceso CORRECTAMENTE LA COMPRA).        
                
        $datos['ok'] = true;

    }else {
        $datos['ok'] = false;
    }

    echo json_encode($datos);

?>


