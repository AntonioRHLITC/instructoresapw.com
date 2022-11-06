<?php include('cabecera.php'); ?>
<?php include('sideBar.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Nueva categoría</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="./VistaCategorias.php">Categorías</a></li>
                            <li class="breadcrumb-item active">Nueva Categoría</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <!-- Main content -->
        <section class="content">
            <form action="modulos/CRUDcategoria.php" method="post" enctype="multipart/form-data">
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
                                    <label for="inputID" class="col-sm-4 col-form-label">ID de la categoría:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="" id="inputID" placeholder="ID" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputCategoria" class="col-sm-4 col-form-label">Nombre de la categoría:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="inputCategoria" id="inputCategoria" placeholder="Nombre de la categoría" required>
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
                            <div class="form-group">
                                <label for="inputImagen5">Imagen #5:</label>
                                <input type="file" id="inputImagen5" name="inputImagen5" class="admin form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="inputImagen6">Imagen #6:</label>
                                <input type="file" id="inputImagen6" name="inputImagen6" class="admin form-control" required>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
                <div class="row">
                    <div class="col-12">
                        <a href="./VistaCategorias.php" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" value="Insertar" name="enviar" class="btn btn-success float-right">Crear Categoría</button>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    

    </div>
  <!-- /.content-wrapper -->


<?php include("footer.php"); ?>

