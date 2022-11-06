<?php include("modulos/productos.php")?>
<?php include('cabecera.php'); ?>
<?php include('sideBar.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Nuevo producto</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="./Vistaproductos.php">Productos</a></li>
                            <li class="breadcrumb-item active">Nuevo producto</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <!-- Main content -->
        <section class="content">
            <form action="modulos/CRUDproductos.php" method="post" enctype="multipart/form-data">
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
                                            <input type="text" class="form-control" name="" id="inputID" placeholder="ID" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label hidden for="inputIDUsuario" class="col-sm-4 col-form-label">ID del Usuario:</label>
                                        <div class="col-sm-8">
                                            <input hidden type="text" class="form-control" name="inputIDUsuario" id="inputIDUsuario" placeholder="ID-Usuario" value="<?php echo $idUsuario; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputNombre" class="col-sm-4 col-form-label">Nombre del producto:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="inputNombre" id="inputNombre" placeholder="Nombre del producto">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPrecio" class="col-sm-4 col-form-label">Precio:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="inputPrecio"id="inputPrecio" placeholder="Precio">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputStock" class="col-sm-4 col-form-label">Stock:</label>
                                        <div class="col-sm-8">
                                            <input type="number" name="inputStock" id="inputStock" class="form-control" min="0" value="1" step="1">
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
                                            <input type="text" class="form-control" name="inputMarca" id="inputMarca" placeholder="Marca">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="selectCategoria" class="col-sm-4 col-form-label">Categoria:</label>
                                        <div class="col-sm-8">
                                            <select name="selectCategoria" id="selectCategoria" class="form-control custom-select">
                                                <option selected="selected" disabled>Elige una categoría</option>
                                                <?php foreach($listaCategorias as $categoria){ ?>
                                                    <option value="<?php echo $categoria['ID_Categoria']?>"><?php echo $categoria['Nombre_Categ']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="selectEstado" class="col-sm-4 col-form-label">Estado:</label>
                                        <div class="col-sm-8">
                                            <select name="selectEstado" id="selectEstado" class="form-control custom-select">
                                                <option selected="selected" disabled>Elige un estado</option>
                                                <?php foreach($listaEstados as $estado){ ?>
                                                    <option value="<?php echo $estado['ID_Estado']?>"><?php echo $estado['Nombre_Estado']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="selectTienda" class="col-sm-4 col-form-label">Tienda:</label>
                                        <div class="col-sm-8">
                                            <select name="selectTienda" id="selectTienda" class="form-control custom-select">
                                                <option selected="selected" disabled>Elige una Tienda</option>
                                                <?php foreach($listaTiendas as $tienda){ ?>
                                                    <option value="<?php echo $tienda['ID_Tienda']?>"><?php echo $tienda['Nombre_Tienda']?></option>
                                                <?php } ?>
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
                                        <textarea name="inputDescripcion" id="inputDescripcion" class="form-control" rows="4"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputCaracteristicas">Caracteristicas destacadas</label>
                                        <textarea name="inputCaracteristicas"id="inputCaracteristicas" class="form-control" rows="4"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputDetalle">Detalle del producto</label>
                                        <textarea name="inputDetalle" id="inputDetalle" class="form-control" rows="4"></textarea>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputModelo" class="col-sm-4 col-form-label">Modelo:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="inputModelo" id="inputModelo" placeholder="Modelo">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPeso" class="col-sm-4 col-form-label">Peso:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="inputPeso" id="inputPeso" placeholder="Peso">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputCondicion" class="col-sm-4 col-form-label">Condición:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="inputCondicion" id="inputCondicion" value="Nuevo" placeholder="Condición">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputMaterial" class="col-sm-4 col-form-label">Material:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="inputMaterial" id="inputMaterial" placeholder="Material">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputContenido">Contenido de la Caja</label>
                                        <textarea name="inputContenido" id="inputContenido" class="form-control" rows="4"></textarea>
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
                                    <div class="form-group">
                                        <label for="inputImagen1">Imagen #1:</label>
                                        <input type="file" id="inputImagen1" name="inputImagen1" class="admin form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputImagen2">Imagen #2:</label>
                                        <input type="file" id="inputImagen2" name="inputImagen2" class="admin form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputImagen3">Imagen #3:</label>
                                        <input type="file" id="inputImagen3" name="inputImagen3" class="admin form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputImagen4">Imagen #4:</label>
                                        <input type="file" id="inputImagen4" name="inputImagen4" class="admin form-control" required>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="./Vistaproductos.php" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" value="Insertar" name="enviar" class="btn btn-success float-right">Crear Producto</button>
                        </div>
                    </div>
            </form>
        </section>
        <!-- /.content -->
    

    </div>
  <!-- /.content-wrapper -->


<?php include("footer.php"); ?>

