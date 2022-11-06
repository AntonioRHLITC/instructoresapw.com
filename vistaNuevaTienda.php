<?php include("modulos/tiendas.php"); ?>
<?php include('cabecera.php'); ?>
<?php include('sideBar.php'); ?>
<?php include("modulos/panel.php")?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Nueva Tienda</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="./VistaTiendas.php">Tiendas</a></li>
                            <li class="breadcrumb-item active">Nueva Tienda</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <!-- Main content -->
        <section class="content">
            <form action="modulos/CRUDtienda.php" method="post" enctype="multipart/form-data">
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
                                    <label for="inputID" class="col-sm-4 col-form-label">ID de la Tienda:</label>
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
                                    <label for="inputTienda" class="col-sm-4 col-form-label">Nombre de la Tienda:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="inputTienda" id="inputTienda" placeholder="Nombre de la Tienda" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="selectEstado" class="col-sm-4 col-form-label">Estado:</label>
                                    <div class="col-sm-8">
                                        <select name="selectEstado" id="idEstado" class="form-control custom-select">
                                            <option selected="selected" disabled>Elige un estado</option>
                                            <?php foreach($listaEstados as $estado){ ?>
                                                <option value="<?php echo $estado['ID_Estado']?>"><?php echo $estado['Nombre_Estado']?></option>
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
                            <h3 class="card-title">Imagen de la Tienda</h3>

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
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
                <div class="row">
                    <div class="col-12">
                        <a href="./VistaTiendas.php" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" value="Insertar" name="enviar" class="btn btn-success float-right">Crear Tienda</button>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    

    </div>
  <!-- /.content-wrapper -->


<?php include("footer.php"); ?>

