<?php include("modulos/tienda.php")?>
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
    <?php foreach($infoTienda as $Tienda){ ?>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Ver Tienda</h1>
                        <h4 class="bg-success pt-2 pb-2 pl-2 mt-2"><?php echo $Tienda['Nombre_Tienda']; ?></h4>
                    </div><!-- /.col -->
                    <div class="col-sm-3">
                        <img class="img-fluid" src="<?php echo $Tienda['Foto'];?>">
                    </div>
                    <div class="col-sm-3">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="./VistaTiendas.php">Tiendas</a></li>
                            <li class="breadcrumb-item active">Ver Tienda</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

    
        <!-- Main content -->
        <section class="content">
        
        <div class="row">
                <div class="col-md-12">
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
                                    <input type="text" class="form-control" id="inputID" value="<?php echo $Tienda['ID_Tienda']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputNombre" class="col-sm-4 col-form-label">Nombre de la Tienda:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputNombre" value="<?php echo $Tienda['Nombre_Tienda']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="selectEstado" class="col-sm-4 col-form-label">Estado:</label>
                                    <div class="col-sm-8">
                                        <select name="selectEstado" id="idEstado" class="form-control custom-select" readonly>
                                                <option selected="selected" value="<?php echo $Tienda['ID_Estado']; ?>"><?php echo $Tienda['Nombre_Estado']; ?></option>
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
                            <div class="container">
                                <div class="row row-cols-3">
                                    <div class="col">
                                        <label for="inputImagen1">Imagen #1:</label>
                                        <img class="img-fluid" src="<?php echo $Tienda['Foto'];?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                
                            </div>
                            <div class="form-group">
                                
                            </div>
                            <div class="form-group">
                                
                            </div>
                            <div class="form-group">

                            </div>
                            <div class="form-group">
                                
                            </div>
                            <div class="form-group">
                                
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="./VistaTiendas.php" class=" col-12 btn bg-primary">Regresar</a>
                </div>
            </div>
        
        </section>
        <!-- /.content -->
    <?php } ?>
    

    </div>
  <!-- /.content-wrapper -->


<?php include("footer.php"); ?>

