<?php include("modulos/moduloTienda.php"); ?>
<?php include("modulos/cartStore.php"); ?>
<?php include("modulos/panel.php");?>
<?php include("modulos/misPedidos.php");?>
<?php include("modulos/moduloPedido.php");?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--normalize.css-->
        <link rel="stylesheet" href="./Estilos/normalize.css?" type="text/css">
        <!--preload-->
        <link rel=”preload” href="./Estilos/Tienda_Styles.css? " type="text/css">
        <!--Hoja de estilos principal-->
        <link rel="stylesheet" href="./Estilos/Tienda_Styles.css? " type="text/css">

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <title>Tienda</title>
    </head>
    <body>
            <nav class="menu" id="menu">
                <div class="start">
                    <header class="contenedor header">
                        Pedido
                    </header>
                </div>
                <div class="contenedor contenedor-botones-menu">
                    <button id="btn-menu-barras" class="btn-menu-barras"><i class="fas fa-bars"></i></button>
                    <button id="btn-menu-cerrar" class="btn-menu-cerrar"><i class="fas fa-times"></i></button>
                </div>
        
                <div class="contenedor contenedor-enlaces-nav">
                    <div class="icono">
                        <a class="Icono-Tienda" href="VistaTienda.php">Tienda Nissan</a>
                    </div>
                    <div class="btn-departamentos" id="btn-departamentos">
                        <p>Todas las <span>Categorias</span></p>
                        <i class="fas fa-caret-down"></i>
                    </div>

                    <div class="busqueda">
                        <input type="text" placeholder="Busca productos">
                        <button class="search"><span><ion-icon class="lupa-icon" name="search-outline"></ion-icon></span></button>
                    </div>
        
                    <div class="enlaces">
                        <a href="./VistaInstructor.php">Regresar</a>
                        <a href="./VistaPedidos.php">Mis pedidos</a>
                        <a href="./Carrito.php">
                            <ion-icon class="carrito-icon" name="cart-outline"></ion-icon> <span class="span_cart" id="num_cart"><?php echo $num_cart; //print_r($_SESSION);?></span>
                        </a>
                        <a href="#"><ion-icon class="help-icon" name="help-circle"></ion-icon></a>
                    </div>
                </div>
        
                <div class="contenedor contenedor-grid">
                        <div class="grid" id="grid">
                            <div class="categorias">
                                <button class="btn-regresar"><i class="fas fa-arrow-left"></i> Regresar</button>
                                <h3 class="subtitulo">Categorias</h3>
                                <?php foreach($listaCategorias as $categoria){?>
                                    <a href="./Products.php?ID_Categoria=<?php echo $categoria['ID_Categoria']; ?>&token=<?php echo hash_hmac('sha1',$categoria['ID_Categoria'],KEY_TOKEN); ?>" data-categoria="<?php echo $categoria['Nombre_Categ'];?>"><?php echo $categoria['Nombre_Categ'];?> <i class="fas fa-angle-right"></i></a>
                                <?php } ?>
                            </div>
                            <?php foreach($listaCategorias as $categoria){?>
                            <div class="contenedor-subcategorias">
                            
                                <div class="subcategoria " data-categoria="<?php echo $categoria['Nombre_Categ'];?>">

                                    <div class="banner-subcategoria">
                                        <a href="#">
                                            <img src="<?php echo $categoria['Dir_Imagen1']; ?>" alt="">
                                        </a>
                                    </div>
            
                                    <div class="galeria-subcategoria">
                                        <a href="#">
                                            <img src="<?php echo $categoria['Dir_Imagen2']; ?>" alt="">
                                        </a>
                                        <a href="#">
                                            <img src="<?php echo $categoria['Dir_Imagen3']; ?>" alt="">
                                        </a>
                                        <a href="#">
                                            <img src="<?php echo $categoria['Dir_Imagen4']; ?>" alt="">
                                        </a>
                                        <a href="#">
                                            <img src="<?php echo $categoria['Dir_Imagen5']; ?>" alt="">
                                        </a>
                                    </div>

                                    <div class="banner-subcategoria">
                                        <a href="#">
                                            <img src="<?php echo $categoria['Dir_Imagen6']; ?>" alt="">
                                        </a>
                                    </div>
                                </div>
                                <?php } ?>    
                            </div>
                        </div>
                    </div>
                
            </nav>
        
            <main class="contenedor pedidos">
                <div class="contenedor ruta">
                    <ol>
                        <li><a href="./VistaTienda.php">Home </a> > </li>
                        <li><a href="./VistaPedidos.php">Mis pedidos </a> ></li>
                        <li><a href="">Estado del pedido</a></li>
                    </ol>
                </div>
                <div class="raya"></div>

                <div class="layout_Pedido">
                    <div class="col_izq">
                        <div class="numPedido">
                            <h2>ID de pedido: # <?php echo $id_venta ?></h2>
                        </div>

                        <?php foreach($detalleVenta as $prodComprado){ ?>
                        <?php $unit = number_format($prodComprado['PrecioUnit']);?>
                        <?php $totalU = number_format($prodComprado['Total']);?>
                        <div class="pedido_Individual">
                            <div class="producto">
                                <h4><?php echo $prodComprado['Nombre_Producto']; ?></h4>
                                <img class="imagenProducto" src="<?php echo $prodComprado['Dir_Imagen1']; ?>" alt="imagen-producto">
                                <div class="puntosTotales">
                                    <span>Cantidad: <?php echo $prodComprado['Cantidad']; ?> pieza(s)</span>
                                    <span>Costo: <?php echo $unit; ?> puntos</span>
                                    <span>Total: <?php echo $totalU; ?> puntos</span>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        
                    </div>
                    <div class="col_der">
                        <?php foreach($datosVenta as $venta){ ?>
                        <?php $total = number_format($venta['Total']); ?>
                        <?php $fecha = $venta['Fecha']; ?>
                        <?php $newDate = date("F j, Y, g:i a", strtotime($fecha)); ?>
                        <div class="datosPedido">
                            <div class="texto-pedido">
                                <p>Estado:<span> <?php echo $venta['Nombre']; ?></span></p>
                                <p>Fecha del pedido:<span> <?php echo $newDate ?></span></p>
                                <p>Fecha de entrega:<span> ----------</span></p>
                                <p>Total:<span> <?php echo $total; ?> puntos</span></p>
                            </div>
                            <button>Cancelar compra</button>
                        </div>
                        <?php } ?>
                    </div>
                </div>

            </main>
                
        

            <footer class="footer">
                <div class="col_izq">
                    <p>Preguntas frecuentes</p>
                    <p>Términos y condiciones de la Tienda</p>
                    <p>Aviso de privacidad</p>
                </div>
                <div class="logo_footer">
                    <img src="./img/Logo APW blanco.png" alt="">
                </div>
                <div class="copyright">
                    <p>© 2022 NISSAN. All rights reserved.</p>
                </div>
            </footer>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

            <script src="https://kit.fontawesome.com/2c36e9b7b1.js"></script>
            <script src="JavaScript/Tienda_script.js"></script>
        </body>
</html>