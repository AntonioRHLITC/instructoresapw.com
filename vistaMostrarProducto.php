<?php error_reporting(E_ALL);
include("modulos/producto.php")?>
<?php include("cabecera.php"); ?>
<?php include("sideBar.php"); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <style>
            .img-fluid{
                max-width: 70%;
            }
        </style>
    <?php foreach($infoProducto as $Producto){ ?>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Ver producto</h1>
                        <h4 class="bg-success pt-2 pb-2 pl-2 mt-2"><?php echo $Producto['Nombre_Producto']; ?></h4>
                    </div><!-- /.col -->
                    <div class="col-sm-3">
                        <img class="img-fluid" src="<?php echo $Producto['Dir_Imagen1'];?>">
                    </div>
                    <div class="col-sm-3">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="./Vistaproductos.php">Productos</a></li>
                            <li class="breadcrumb-item active">Ver producto</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

    
        <!-- Main content -->
        <section class="content">
        
        <div class="row">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Información principal</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputID" class="col-sm-4 col-form-label">ID del producto:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputID" value="<?php echo $Producto['ID_Producto']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputNombre" class="col-sm-4 col-form-label">Nombre del producto:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputNombre" value="<?php echo $Producto['Nombre_Producto']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPrecio" class="col-sm-4 col-form-label">Precio:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputPrecio" value="<?php echo $Producto['Precio_producto']; ?> puntos" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputStock" class="col-sm-4 col-form-label">Stock:</label>
                                <div class="col-sm-8">
                                    <input type="number" id="inputStock" class="form-control" step="1" value="<?php echo $Producto['Stock']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    
                </div>

                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Información secundaria</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputMarca" class="col-sm-4 col-form-label">Marca:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputMarca" value="<?php echo $Producto['Marca']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="selectCategoria" class="col-sm-4 col-form-label">Categoria:</label>
                                <div class="col-sm-8">
                                    <select name="selectCategoria" id="selectCategoria" class="form-control custom-select" readonly>
                                            <option selected="selected" value="<?php echo $Producto['ID_Categoria']; ?>"><?php echo $Producto['Nombre_Categ']; ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="selectEstado" class="col-sm-4 col-form-label">Estado:</label>
                                    <div class="col-sm-8">
                                        <select name="selectEstado" id="idEstado" class="form-control custom-select" readonly>
                                                <option selected="selected" value="<?php echo $Producto['ID_Estado']; ?>"><?php echo $Producto['Nombre_Estado']; ?></option>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="selectTienda" class="col-sm-4 col-form-label">Tienda:</label>
                                <div class="col-sm-8">
                                    <select name="selectTienda" id="selectTienda" class="form-control custom-select" readonly>
                                            <option selected="selected" value="<?php echo $Producto['ID_Tienda']; ?>"><?php echo $Producto['Nombre_Tienda']; ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputDescripcion">Descripción</label>
                                <textarea id="inputDescripcion" class="form-control" rows="4" readonly><?php echo $Producto['Descr_Producto']; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="inputCaracteristicas">Caracteristicas destacadas</label>
                                <textarea id="inputCaracteristicas" class="form-control" rows="4" readonly><?php echo $Producto['Carac_Destacadas']; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="inputDetalle">Detalle del producto</label>
                                <textarea id="inputDetalle" class="form-control" rows="4" readonly><?php echo $Producto['Detalle_Producto']; ?></textarea>
                            </div>

                            <div class="form-group row">
                                <label for="inputModelo" class="col-sm-4 col-form-label">Modelo:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputModelo" value="<?php echo $Producto['Modelo']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPeso" class="col-sm-4 col-form-label">Peso:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputPeso" value="<?php echo $Producto['Peso']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputCondicion" class="col-sm-4 col-form-label">Condición:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputCondicion" value="<?php echo $Producto['Condicion']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputMaterial" class="col-sm-4 col-form-label">Material:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputMaterial" value="<?php echo $Producto['Material']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputContenido">Contenido de la Caja</label>
                                <textarea id="inputContenido" class="form-control" rows="4" readonly><?php echo $Producto['Conten_Caja']; ?></textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Imagenes del producto</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row row-cols-2">
                                    <div class="col">
                                        <label for="inputImagen1">Imagen #1:</label>
                                        <img class="img-fluid" src="<?php echo $Producto['Dir_Imagen1'];?>">
                                    </div>
                                    <div class="col">
                                        <label for="inputImagen1">Imagen #2:</label>
                                        <img class="img-fluid" src="<?php echo $Producto['Dir_Imagen2'];?>">
                                    </div>
                                    <div class="col">
                                        <label for="inputImagen1">Imagen #3:</label>
                                        <img class="img-fluid" src="<?php echo $Producto['Dir_Imagen3'];?>">
                                    </div>
                                    <div class="col">
                                        <label for="inputImagen1">Imagen #4:</label>
                                        <img class="img-fluid" src="<?php echo $Producto['Dir_Imagen4'];?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="./Vistaproductos.php" class=" col-12 btn bg-primary">Regresar</a>
                </div>
            </div>
        
        </section>
        <!-- /.content -->
    <?php } ?>
    

    </div>
  <!-- /.content-wrapper -->


<?php include("footer.php"); ?>

