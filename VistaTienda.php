<?php include("modulos/moduloTienda.php"); ?>
<?php include("modulos/cartStore.php"); ?>
<?php include("modulos/panel.php")?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--normalize.css-->
        <link rel="stylesheet" href="./Estilos/normalize.css? 1" type="text/css">
        <!--preload-->
        <link rel=”preload” href="./Estilos/Tienda_Styles.css? 5" type="text/css">
        <!--Hoja de estilos principal-->
        <link rel="stylesheet" href="./Estilos/Tienda_Styles.css? 5" type="text/css">

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <title>Tienda</title>
    </head>
    <body>
            <nav class="menu" id="menu">
                <div class="start">
                <?php foreach($DatosUsuario as $Usuario){ ?>
                    <header class="contenedor header">
                        Bienvenido(a), Instructor(a) <?php echo $Usuario['Nombre']?> <?php echo $Usuario['Primer_Apellido']?>
                    </header>
                </div>
                <?php } ?>
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

                <section class="slider_princ">
                    <!--SLIDER-->
                    <div class="slider">
                        <div class="slide_viewer">
                            <div class="slide_group">
                                <div class="slide">
                                    <img src="./img/Banner 1.png" alt="">
                                </div>
                                <div class="slide">
                                    <img src="./img/Banner-2.jpg" alt="">
                                </div>
                                <div class="slide">
                                    <img src="./img/paisaje3.jpg" alt="">
                                </div>
                                <div class="slide">
                                    <img src="./img/paisaje4.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div><!-- End // .slider -->

                    <div class="slide_buttons">
                    </div>

                    <div class="directional_nav">
                        <div class="previous_btn" title="Previous">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="45px" height="45px" viewBox="-11 -11.5 65 66">
                            <g>
                            <g>
                            <path fill="#f16e1b" d="M-10.5,22.118C-10.5,4.132,4.133-10.5,22.118-10.5S54.736,4.132,54.736,22.118
                            c0,17.985-14.633,32.618-32.618,32.618S-10.5,40.103-10.5,22.118z M-8.288,22.118c0,16.766,13.639,30.406,30.406,30.406 c16.765,0,30.405-13.641,30.405-30.406c0-16.766-13.641-30.406-30.405-30.406C5.35-8.288-8.288,5.352-8.288,22.118z"/>
                            <path fill="#f16e1b" d="M25.43,33.243L14.628,22.429c-0.433-0.432-0.433-1.132,0-1.564L25.43,10.051c0.432-0.432,1.132-0.432,1.563,0	c0.431,0.431,0.431,1.132,0,1.564L16.972,21.647l10.021,10.035c0.432,0.433,0.432,1.134,0,1.564	c-0.215,0.218-0.498,0.323-0.78,0.323C25.929,33.569,25.646,33.464,25.43,33.243z"/>
                            </g>
                            </g>
                            </svg>
                        </div>
                        <div class="next_btn" title="Next">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="45px" height="45px" viewBox="-11 -11.5 65 66">
                            <g>
                            <g>
                            <path fill="#f16e1b" d="M22.118,54.736C4.132,54.736-10.5,40.103-10.5,22.118C-10.5,4.132,4.132-10.5,22.118-10.5	c17.985,0,32.618,14.632,32.618,32.618C54.736,40.103,40.103,54.736,22.118,54.736z M22.118-8.288	c-16.765,0-30.406,13.64-30.406,30.406c0,16.766,13.641,30.406,30.406,30.406c16.768,0,30.406-13.641,30.406-30.406 C52.524,5.352,38.885-8.288,22.118-8.288z"/>
                            <path fill="#f16e1b" d="M18.022,33.569c 0.282,0-0.566-0.105-0.781-0.323c-0.432-0.431-0.432-1.132,0-1.564l10.022-10.035 			L17.241,11.615c 0.431-0.432-0.431-1.133,0-1.564c0.432-0.432,1.132-0.432,1.564,0l10.803,10.814c0.433,0.432,0.433,1.132,0,1.564 L18.805,33.243C18.59,33.464,18.306,33.569,18.022,33.569z"/>
                            </g>
                            </g>
                            </svg>
                        </div>
                    </div><!-- End // .directional_nav -->
                </section>
                <!--SLIDER-->

                <div class="layout_banner">
                    <img class="element1" src="./img/element1.png" alt="">
                    <img class="element2"src="./img/element1.png" alt="">
                    <img class="element3"src="./img/element1.png" alt="">
                </div>

                <section class="product"> 
                    <h2 class="product-category">Lo más vendido</h2>
                    <button class="pre-btn"><img src="./img/arrow.png" alt=""></button>
                    <button class="nxt-btn"><img src="./img/arrow.png" alt=""></button>
                    <div class="product-container">
                        
                        <?php foreach($listaProductos as $producto){?>
                            <?php $precio = number_format($producto['Precio_producto']); ?>
                            <div class="product-card">
                                <p class="time">Nuevo</p> 
                                    <div class="img-box">
                                        <img src="<?php echo $producto['Dir_Imagen1']; ?>">
                                    </div>
                                <div class="detail">
                                    <h3 class="productTitle"><?php echo $producto['Nombre_Producto'];?></h3>
                                    <p class="precio"><?php echo $precio?> puntos</p>
                                </div>
                                <div class="cart">
                                    <a href="./ProductView.php?ID_Producto=<?php echo $producto['ID_Producto']; ?>&token=<?php echo hash_hmac('sha1',$producto['ID_Producto'],KEY_TOKEN); ?>"><button>Ver producto</button></a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </section>

                <div class="layout_banner2">
                    <h3>Renueva tu computadora por la nueva MacBook Pro con chip M1</h3>
                    <img class="element1_bn2" src="./img/macbookpro.png" alt="">
                </div>

                <div class="layout_banner3">
                    <div class="element_bn3">
                        <p>Tv, audio y video</p>
                        <img class="element1_bn3" src="./img/tv.png" alt="">
                    </div>
                    <div class="element_bn3">
                        <p>Perfumería</p>
                        <img class="element2_bn3" src="./img/perfume.png" alt="">
                    </div>
                    <div class="element_bn3">
                        <p>Deportes</p>
                        <img class="element3_bn3" src="./img/bicileta.png" alt="">
                    </div>
                    <div class="element_bn3">
                        <p>Computo</p>
                        <img class="element4_bn3" src="./img/macbookpro.png" alt="">
                    </div>
                    <div class="element_bn3">
                        <p>Moda y Accesorios</p>
                        <img class="element5_bn3" src="./img/reloj.png" alt="">
                    </div>
                    <div class="element_bn3">
                        <p>Electrodomésticos</p>
                        <img class="element6_bn3" src="./img/freidora.png" alt="">
                    </div>
                </div>

                <section class="product"> 
                    <h2 class="product-category">Renueva tu pantalla</h2>
                    <button class="pre-btn"><img src="./img/arrow.png" alt=""></button>
                    <button class="nxt-btn"><img src="./img/arrow.png" alt=""></button>
                    <div class="product-container">
                        <!--Producto #1-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>
                        
                        <!--Producto #2-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>

                        <!--Producto #3-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>

                        <!--Producto #4-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>

                        <!--Producto #5-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>

                        <!--Producto #6-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>

                        <!--Producto #7-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>

                        <!--Producto #8-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>

                        <!--Producto #9-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>

                        <!--Producto #10-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="product"> 
                    <h2 class="product-category">Lo que tu hogar necesita</h2>
                    <button class="pre-btn"><img src="/img/arrow.png" alt=""></button>
                    <button class="nxt-btn"><img src="/img/arrow.png" alt=""></button>
                    <div class="product-container">
                        <!--Producto #1-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>
                        
                        <!--Producto #2-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>

                        <!--Producto #3-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>

                        <!--Producto #4-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>

                        <!--Producto #5-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>

                        <!--Producto #6-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>

                        <!--Producto #7-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>

                        <!--Producto #8-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>

                        <!--Producto #9-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>

                        <!--Producto #10-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="product"> 
                    <h2 class="product-category">Para el trabajo</h2>
                    <button class="pre-btn"><img src="/img/arrow.png" alt=""></button>
                    <button class="nxt-btn"><img src="/img/arrow.png" alt=""></button>
                    <div class="product-container">
                        <!--Producto #1-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>
                        
                        <!--Producto #2-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>

                        <!--Producto #3-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>

                        <!--Producto #4-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>

                        <!--Producto #5-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>

                        <!--Producto #6-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>

                        <!--Producto #7-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>

                        <!--Producto #8-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>

                        <!--Producto #9-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>

                        <!--Producto #10-->
                        <div class="product-card">
                            <p class="time">New</p>
                            <div class="img-box">
                                <img src="/img/iphone13promax.png" alt="">
                            </div>
                            <div class="detail">
                                <h3 class="productTitle"> iPhone 13 Pro Max 128gb</h3>
                                <p class="precioant">53,000 puntos</p>
                                <p class="precio">40,000 puntos</p>
                            </div>
                            <div class="cart">
                                <a class="" href="/ProductView.html"><button>Ver producto</button></a>
                            </div>
                        </div>
                    </div>
                </section>

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