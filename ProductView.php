<?php include("modulos/moduloProductView.php"); ?>
<?php include("modulos/cartStore.php"); ?>
<?php include("modulos/moduloTienda.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--normalize.css-->
        <link rel="stylesheet" href="./Estilos/normalize.css? " type="text/css">
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
                <div class="mensaje">
                    <?php //echo $mensaje;?>
                </div>
            </nav>
        
            <main class="contenedor">
            <?php foreach($infoProducto as $producto){?>
                <div class="contenedor ruta">
                    <ol>
                        <li><a href="vistaTienda.php">Home</a>></li>
                        <li><a href="">Tecnología</a>></li>
                        <li class="actual"><a href="#"><?php echo $producto['Nombre_Producto'];?></a></li>
                    </ol>
                </div>
                <div class="raya"></div>

                <div class="layout_detailP">
                    <section id="services" class="services section-bg">
                        <div class="container-fluid">
                            <div class="row row-sm">
                                <div class="col-md-6 _boxzoom">
                                    <div class="zoom-thumb">
                                        <ul class="piclist">
                                            <li><img src="<?php echo $producto['Dir_Imagen1']; ?>"></li>
                                            <li><img src="<?php echo $producto['Dir_Imagen2']; ?>"></li>
                                            <li><img src="<?php echo $producto['Dir_Imagen3']; ?>"></li>
                                            <li><img src="<?php echo $producto['Dir_Imagen4']; ?>"></li>
                                        </ul>
                                    </div>
                                    <div class="_product-images">
                                        <div class="picZoomer">
                                            <img class="my_img" src="<?php echo $producto['Dir_Imagen1']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
    
                    <div class="ProductDetail">

                        <div class="detailP">
                            <h2><?php echo $producto['Nombre_Producto'];?></h2>
                            <p>Marca: <a href="#"><?php echo $producto['Marca'];?></a></p>
                            <p class="preciofinal"><?php echo $producto['Precio_producto'];?> puntos</p>
                        </div>
                        <?php } ?>
                        <div class="text__center">
                            <div class="estado">
                                <h4>Estado:</h4>
                                <p>Activo</p>
                            </div>
                            <div class="stock">
                                <h4>Stock:</h4>
                                <p id="stock"><?php echo $producto['Stock'];?> piezas disponibles</p>
                            </div>
                        </div>

                        <div class="add_cart">
                            <div class="councounter">
                                    <div class="col col-qty layout-inline">
                                        <a href="#" class="qty qty-minus">-</a>
                                        <input type="numeric" value="1" min="1" max="<?php echo $producto['Stock']; ?>" step="1" size="5" id="cantidadu">
                                        <a href="#" class="qty qty-plus">+</a>
                                        <script>
                                            let cantidad;
                                        </script>
                                    </div>
                            </div>
                                
                            <div class="btn_add">
                                <button type="button" onclick="variable(), addProducto(<?php echo $id_producto; ?>, '<?php echo $token_tmp; ?>', cantidad, '<?php echo $producto['Stock'] ?>')">Añadir al carrito</button>
                            </div>       
                            <script>
                                function variable(){
                                    if(document.getElementById('cantidadu').value > document.getElementById('stock')){
                                        alert('No hay suficiente Stock de este producto!')
                                    }else{
                                        cantidad = parseInt(document.getElementById('cantidadu').value)
                                    }
                                }
                            </script>                                            
                        </div>
                        <div class="go-kart">
                            <a href="./Carrito.php"><button>Ir al carrito</button></a>
                        </div> 
                    </div>
                </div>

                <section>
                    <input type="radio" name="accordeon" id="close">
                    <ul class="accordeon">

                    <li class="accordeon__element">
                        <input type="radio" name="accordeon" id="open1" class="input-radio-open">
                        <header class="element__header">
                        <label class="header__title header__title--open" for="open1">
                            <div class="layout">
                                <p class="ptitle">Descripción del producto</p><i class="fa fa-plus"></i>
                            </div>
                        </label>
                        <label class="header__title header__title--close" for="close">
                            <div class="layout">
                                <p class="ptitle">Descripción del producto</p><i class="fa fa-minus"></i>
                            </div>
                        </label>
                        </header>
                        <div class="element__content">
                            <div class="content__wrapper">
                                <ul>
                                    <p>
                                        <?php echo $producto['Descr_Producto'];?>
                                    </p>
                                </ul>
                            </div>
                        </div>
                    </li>
                    
                    <li class="accordeon__element">
                        <input type="radio" name="accordeon" id="open2" class="input-radio-open">
                        <header class="element__header">
                        <label class="header__title header__title--open" for="open2">
                            <div class="layout">
                                <p class="ptitle">Características destacadas</p><i class="fa fa-plus"></i>
                            </div>
                        </label>
                        <label class="header__title header__title--close" for="close">
                            <div class="layout">
                                <p class="ptitle">Características destacadas</p><i class="fa fa-minus"></i>
                            </div>
                        </label>
                        </header>
                        <div class="element__content">
                            <div class="content__wrapper">
                                <ul>
                                    <li><?php echo $producto['Carac_Destacadas'];?></li>
                                    <li>Sistema operativo iOS 14.</li>
                                    <li>Tecnología inalámbrica Bluetooth 5.0.</li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="accordeon__element">
                        <input type="radio" name="accordeon" id="open3" class="input-radio-open">
                        <header class="element__header">
                        <label class="header__title header__title--open" for="open3">
                            <div class="layout">
                                <p class="ptitle">Detalle del producto</p><i class="fa fa-plus"></i>
                            </div>
                        </label>
                        <label class="header__title header__title--close" for="close">
                            <div class="layout">
                                <p class="ptitle">Detalle del producto</p><i class="fa fa-minus"></i>
                            </div>
                        </label>
                        </header>
                        <div class="element__content">
                        <div class="content__wrapper layout_detailproduct">
                            <div>
                                <h3>ID (SKU)</h3>
                                <P><?php echo $producto['ID_Producto'];?></P>
                                <h3>Modelo</h3>
                                <P><?php echo $producto['Modelo'];?></P>
                                <h3>Peso</h3>
                                <P><?php echo $producto['Peso'];?></P>
                            </div>

                            <div>
                                <h3>Condición del producto</h3>
                                <P><?php echo $producto['Condicion'];?></P>
                                <h3>Material</h3>
                                <P><?php echo $producto['Material'];?></P>
                            </div>

                            <div>
                                <h3>Qué hay en la caja</h3>
                                <ul>
                                    <li><?php echo $producto['Conten_Caja'];?></li>
                                </ul>
                            </div>

                        </div>
                        </div>
                    </li>
                    </ul>
                </section>


                <section class="product"> 
                    <h2 class="product-category">Productos similares</h2>
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

                    </div>
                </section>

            </main>
            
            <footer class="footer">
                <div class="col_izq">
                    <a href="#"><p>Preguntas frecuentes</p></a>
                    <a href="#"><p>Términos y condiciones de la Tienda</p></a>
                    <a href="#"><p>Aviso de privacidad</p></a>
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
            <script src="./JavaScript/Tienda_script.js"></script>
            <style>
                .bodyText{
                    color: #373737;
                    font-size: 1.3rem;
                }
            </style>

            <script>
                

                function addProducto(id_producto, token, cantidad, stock){
                    let url = './addCart.php';
                    let formData = new FormData();
                    formData.append('id_producto', id_producto);
                    formData.append('token', token);
                    formData.append('cantidad', cantidad);
                    formData.append('stock', stock);

                    fetch(url, {
                        method: 'POST',
                        body: formData,
                        mode: 'cors'
                    }).then(response => response.json())
                    .then(data => {
                        if(data.ok){
                            let elemento = document.getElementById("num_cart");
                            elemento.innerHTML = data.numero;
                        }else if (data.ok === false){
                            let elemento = document.getElementById("num_cart");
                            elemento.innerHTML = data.numero;
                            Swal.fire({
                                customClass:{
                                    title: 'bodyText'
                                },
                                position: 'top-end',
                                background: '#e3e3e3',
                                backdrop: false,
                                showCloseButton: true,
                                width: 400,
                                icon: 'error',
                                iconColor: '#d60f0f',
                                title: 'No está disponible la cantidad deseada para este producto, se agregará unicamente el maximo stock disponible!',
                                showConfirmButton: false,
                                timer: 10000
                            })
                        }
                    })
                }
            </script>
        </body>
</html>