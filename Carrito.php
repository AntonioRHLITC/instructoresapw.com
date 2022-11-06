<?php



?>
<?php include("modulos/modulCarrito.php"); ?>
<?php include("modulos/cartStore.php"); ?>
<?php include("modulos/moduloTienda.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!--normalize.css-->
        <link rel="stylesheet" href="./Estilos/normalize.css? " type="text/css">
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
                    <header class="contenedor header">
                        Tu carrito de compras
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
                            <li><a  href="./VistaTienda.php">Home </a>></li>
                            <li><a  href="./Carrito.php">Carrito de compras </a>></li>
                        </ol>
                    </div>
                <div class="raya"></div>
                
                <div class="cart_layout">
                    <div class="cart_container">

                        <div class="layout_content">
                            <div class="table_content row_apoyo">
                                <div class="producto_cart">
                                    <h3>Producto</h3>
                                </div>
                                <div class="precio_cart">
                                    <h3>Precio</h3>
                                </div>
                                <div class="cantidad_cart">
                                    <h3>Cantidad</h3>
                                </div>
                                <div class="total">
                                    <h3>Total</h3>
                                </div>
                            </div>

                            <?php if($lista_carrito == null){
                                echo "<div class=vacio>
                                        <h2>Carrito vacio</h2>
                                        <img src='./img/cartEmpty.png'>
                                      </div>";
                                echo "<style>
                                    .cart_layout{
                                        display: grid;
                                        grid-template-columns: 99%;
                                        gap: .5rem;
                                    }
                                </style>";
                                }else{
                                $total = 0;
                                foreach($lista_carrito as $producto){
                                    $_id_producto = $producto['ID_Producto'];
                                    $nombre_producto = $producto['Nombre_Producto'];
                                    $precio_producto = $producto['Precio_producto'];
                                    $cantidad = $producto['cantidad'];
                                    $subtotalWF = $cantidad * $precio_producto;
                                    $subtotal = number_format($subtotalWF);
                                    $stock = $producto['Stock'];
                                    $totalWF += $subtotalWF;
                                    $total = number_format($totalWF);
                                    ?>
                            
                            <div class="table_content row_1">
                                <tr>
                                    <div class="producto_content">
                                        <img src="<?php echo $producto['Dir_Imagen1'];?>">
                                        <h4><?php echo $nombre_producto; ?></h4>
                                        <p class="opc_content"></p>
                                        <a class="eli_a" href="#" id="eliminar" data-bs-id="<?php echo $_id_producto; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal">Eliminar</a>
                                    </div>
                                    <div class="precio_content">
                                        <p><?php echo $precio_producto; ?> puntos</p>
                                    </div>
                                    <div class="cantidad_content">
                                        
                                        <input type="number" min="1" max="<?php echo $stock ?>" step="1" value="<?php echo $cantidad ?>" size="5" id="cantidad_<?php echo $_id_producto; ?>" onchange="actualizarCantidad(this.value, <?php echo $_id_producto; ?>, <?php echo $stock; ?>)">
                                    </div>
                                    <div class="total_content">
                                        <p id="subtotal_<?php echo $_id_producto; ?>" name="subtotal[]"><?php echo $subtotal; ?> puntos</p>
                                    </div>
                                </tr>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="cart_total">
                        <div class="res_h3">
                            <h3>Resumén de tu pedido</h3>
                        </div>
                        <div class="division"></div>

                        <div class="total_conten">
                            <h4>Total:</h4>
                            <p id="total"><?php echo $total; ?> puntos</p>
                        </div>
                        <div class="division"></div>
                        <?php if($lista_carrito != null){ ?>
                            <div class="pago">
                                <a href="pago.php"><button>Continuar al pago</button></a>
                            </div>
                        <?php } ?>
                    </div>
                    
                    <div class="b_comprando">
                        <a href="./Tienda.php"><button>Seguir comprando</button></a>
                    </div>
                    <div class="promo_cart">
                        <img src="./img/macbookpro.png" alt="">
                        <p>Checa lo nuevo de Apple</p>
                    </div>
                </div>
                <?php } ?>
            </main>
            
            <!-- Modal -->
            <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminaModalLabel">Alerta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Desea eliminar el producto de la lista?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button id="btn-elimina" type="button" class="btn btn-danger" onclick="eliminar()">Eliminar</button>
                </div>
                </div>
            </div>
            </div>




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

            <script>
                let eliminaModal = document.getElementById('eliminaModal')
                eliminaModal.addEventListener('show.bs.modal', function(event){
                    let button = event.relatedTarget
                    let id_producto = button.getAttribute('data-bs-id')
                    let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina')
                    buttonElimina.value= id_producto
                })

                function actualizarCantidad(cantidad, id_producto, stock){
                    let url = 'actualizarCart.php'
                    let formData = new FormData()
                    formData.append('action', 'agregar')
                    formData.append('cantidad', cantidad)
                    formData.append('id_producto', id_producto)
                    formData.append('stock', stock)

                    fetch(url,{
                        method: 'POST',
                        body: formData,
                        mode: 'cors'
                    }).then(response => response.json())
                    .then(data => {
                        if(data.ok){
                            let divsubtotal = document.getElementById('subtotal_' + id_producto)
                            divsubtotal.innerHTML = data.sub+' puntos';
                            
                            let total = 0
                            //total = total+data.sub
                            let list = document.getElementsByName('subtotal[]')

                            for(let i = 0; i < list.length; i++){
                                total += parseInt(list[i].innerHTML.replace(/[$,]/g,''))
                            }

                            total = new Intl.NumberFormat('en-US',{
                                minimumFractionDigits: 2
                            }).format(total)

                            
                            document.getElementById('total').innerHTML = total
                        }
                    })
                }


                function eliminar(){

                    let botonElimina = document.getElementById('btn-elimina')
                    let id_producto = botonElimina.value

                    let url = './actualizarCart.php'
                    let formData = new FormData()
                    formData.append('action', 'eliminar')
                    formData.append('id_producto', id_producto)

                    fetch(url, {
                        method: 'POST',
                        body: formData,
                        mode: 'cors'
                    }).then(response => response.json())
                    .then(data => {
                        if(data.ok){
                            location.reload()
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