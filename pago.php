<?php include("modulos/moduloTienda.php"); ?>
<?php include('modulos/moduloPago.php'); ?>
<?php include("modulos/cartStore.php"); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!--normalize.css-->
        <link rel="stylesheet" href="Estilos/normalize.css? 1" type="text/css">
        <!--preload-->
        <link rel=”preload” href="./Estilos/Tienda_Styles.css? 5" type="text/css">
        <!--Hoja de estilos principal-->
        <link rel="stylesheet" href="./Estilos/Tienda_Styles.css? 5" type="text/css">

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

        <title>Tienda</title>
    </head>
    <body>
            <nav class="menu" id="menu">
                <div class="start">
                    <header class="contenedor header">
                        Proceso de pago
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
        
            <main class="contenedor">
                <div class="contenedor ruta">
                    <ol>
                        <li><a href="./VistaTienda.php">Home </a>></li>
                        <li><a href="./Carrito.php">Carrito de compras </a>></li>
                    </ol>
                </div>
                <div class="raya"></div>

                <div class="cart_layout_pago">                    
                    <div class="containertbl">
                        <ul class="responsive-table">
                            <li class="table-header">
                                <div class="col col-2">Producto</div>
                                <div class="col col-3">Total</div>
                            </li>
                            <?php if($lista_carrito == null){
                                echo "<div class=vacio>Carrito vacio</div>";
                                }else{
                                    $total = 0;
                                    foreach($lista_carrito as $producto){
                                        $_id_producto = $producto['ID_Producto'];
                                        $nombre_producto = $producto['Nombre_Producto'];
                                        $precio_producto = $producto['Precio_producto'];
                                        $imagen1 = $producto['Dir_Imagen1'];
                                        $cantidad = $producto['cantidad'];
                                        $subtotalWF = $cantidad * $precio_producto;
                                        $subtotal = number_format($subtotalWF);
                                        $totalWF += $subtotalWF;
                                        $total = number_format($totalWF);
                            ?>
                            <li class="table-row">
                                <div class="col col-2" data-label="Producto"><?php echo $nombre_producto; ?></div>
                                <div class="col col-3 subtotal_pago" data-label="Total"><?php echo $subtotal; ?> puntos</div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="puntos_layout">
                        <?php foreach($DatosUsuario as $Usuario){ ?>
                        <div class="cart_total_points">
                            <div class="res_h3">
                                <h3>Tus puntos</h3>
                            </div>
                            <div class="division"></div>
                            <div class="total_conten">
                                <?php $puntosFormat = number_format($Usuario['Puntos']); ?>
                                <p id=""><?php echo $puntosFormat;?> puntos</p>
                            </div>
                        </div>
                        <?php } ?>

                        <div class="cart_total_pago">
                            <div class="res_h3">
                                <h3>Total de tu pedido</h3>
                            </div>
                            <div class="division"></div>

                            <div class="total_conten">
                                <h4>Total:</h4>
                                <p><?php echo $total; ?> puntos</p>
                            </div>
                            <div class="division"></div>
                            <div class="confirm">
                                <a class="compra"><button onclick="addVenta(<?php echo $Usuario['Puntos']; ?>, '<?php echo $totalWF ?>')">Confirmar compra</button></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
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

            <style>
                .bodyText{
                    color: #373737;
                    font-size: 2.5rem;
                }
            </style>

            <script>
                

                function addVenta(puntos, total){
                    let url = 'modulos/procesoVenta.php';
                    let formData = new FormData();
                    formData.append('puntos', puntos);
                    formData.append('total', total);

                    fetch(url, {
                        method: 'POST',
                        body: formData,
                        mode: 'cors'
                    }).then(response => response.json())
                    .then(data => {
                        if(data.ok){
                            Swal.fire({
                                customClass:{
                                    title: 'bodyText'
                                },
                                position: 'center',
                                background: '#f7f7f7',
                                showCloseButton: true,
                                width: 400,
                                icon: 'success',
                                title: 'CORRECTO: Compra realizada correctamente. Espere un momento por favor.',
                                showConfirmButton: false,
                                timer: 5000,
                                timerProgressBar: true
                            })
                            setTimeout(function(){window.location.replace("VistaPedidos.php");},5000);
                        }else if (data.ok === false){
                            
                            Swal.fire({
                                customClass:{
                                    title: 'bodyText'
                                },
                                position: 'center',
                                background: '#f7f7f7',
                                showCloseButton: true,
                                width: 400,
                                icon: 'error',
                                iconColor: '#d60f0f',
                                title: 'ERROR: No se pudo procesar la compra, no cuentas con suficientes puntos.',
                                showConfirmButton: false,
                                timer: 10000
                            })
                        }
                    })
                }
            </script>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script src="https://kit.fontawesome.com/2c36e9b7b1.js"></script>
            <script src="./JavaScript/Tienda_script.js"></script>
        </body>
</html>