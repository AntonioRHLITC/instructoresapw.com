<?php include("modulos/usuario.php")?>
<?php include('CabeceraInstructor.php'); ?>
<?php include('sideBarInstructor.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <style>
            .img-fluid{
                max-width: 70%;
            }
        </style>
        <?php foreach($infoUsuario as $Usuario){ ?>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Ver Usuario</h1>
                        <h4 class="bg-success pt-2 pb-2 pl-2 mt-2"><?php echo $Usuario['Nombre']; ?></h4>
                    </div><!-- /.col -->
                    <div class="col-sm-3">
                        <img class="img-fluid" src="<?php echo $Usuario['Foto'];?>">
                    </div>
                    <div class="col-sm-3">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="./VistaUsuarios.php">Usuarios</a></li>
                            <li class="breadcrumb-item active">Ver Usuario</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <!-- Main content -->
        <section class="content">
            <form action="modulos/CRUDusuarios.php" method="post" enctype="multipart/form-data">
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
                                        <label for="inputID" class="col-sm-4 col-form-label">ID del Usuario:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="inputID" id="inputID" placeholder="ID" value="<?php echo $Usuario['ID_Usuario']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputNombre" class="col-sm-4 col-form-label">Nombre:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="inputNombre" id="inputNombre" placeholder="Nombre" value="<?php echo $Usuario['Nombre']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPrimerApell" class="col-sm-4 col-form-label">Primer Apellido:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="inputPrimerApell" id="inputPrimerApell" placeholder="Primer apellido" value="<?php echo $Usuario['Primer_Apellido']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSegundoApell" class="col-sm-4 col-form-label">Segundo Apellido:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="inputSegundoApell" id="inputSegundoApell" placeholder="Segundo apellido" value="<?php echo $Usuario['Segundo_Apellido']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputCel" class="col-sm-4 col-form-label">Telefono Celular:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="inputCel"id="inputCel" placeholder="Celular" value="<?php echo $Usuario['Num_Cel']; ?>" readonly>
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
                                    <h3 class="card-title">Información laboral</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputNomina" class="col-sm-4 col-form-label">Numero de Nomina:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="inputNomina" id="inputNomina" placeholder="No. de Nomina" value="<?php echo $Usuario['Num_Nomina']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="selectPlanta" class="col-sm-4 col-form-label">Planta:</label>
                                        <div class="col-sm-8">
                                            <select name="selectPlanta" id="selectPlanta" class="form-control custom-select" readonly>
                                                <option selected="selected" value="<?php echo $Usuario['ID_Planta']; ?>"><?php echo $Usuario['Nombre_Planta']; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="selectProceso" class="col-sm-4 col-form-label">Proceso:</label>
                                        <div class="col-sm-8" id="selProceso">
                                            <select name="selectProceso" id="selectProceso" class="form-control custom-select" readonly>
                                                <option selected="selected" value="<?php echo $Usuario['ID_Proceso']; ?>"><?php echo $Usuario['Nombre_Proceso']; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="selectFuncion" class="col-sm-4 col-form-label">Función:</label>
                                        <div class="col-sm-8">
                                            <select name="selectFuncion" id="selectFuncion" class="form-control custom-select" readonly>
                                                <option selected="selected" value="<?php echo $Usuario['ID_Funcion']; ?>"><?php echo $Usuario['Nombre_Funcion']; ?></option>
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
                                    <h3 class="card-title">Información de Usuario</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputCorreoE" class="col-sm-4 col-form-label">Correo electronico:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="inputCorreoE" id="inputCorreoE" placeholder="Correo electrónico" value="<?php echo $Usuario['Correo']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Contraseña:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="inputPassword" id="inputPassword" placeholder="Contraseña" value="<?php echo $Usuario['Password']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="selectRol" class="col-sm-4 col-form-label">Rol:</label>
                                        <div class="col-sm-8">
                                            <select name="selectRol" id="selectRol" class="form-control custom-select" readonly>
                                                <option selected="selected" value="<?php echo $Usuario['ID_Rol']; ?>"><?php echo $Usuario['Rol']; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="selectEstado" class="col-sm-4 col-form-label">Estado:</label>
                                        <div class="col-sm-8">
                                            <select name="selectEstado" id="selectEstado" class="form-control custom-select" readonly>
                                                <option selected="selected" value="<?php echo $Usuario['ID_Estado']; ?>"><?php echo $Usuario['Nombre_Estado']; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputFecha" class="col-sm-4 col-form-label">Fecha de registro:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="inputFecha" id="inputFecha" placeholder="Fecha de registro" value="<?php echo $Usuario['fecha_Ingreso']; ?>" readonly>
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
                                    <h3 class="card-title">Foto de Perfil</h3>

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
                                                <img class="img-fluid" src="<?php echo $Usuario['Foto'];?>">
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
                            <a href="./VistaUsuarios.php" class=" col-12 btn bg-primary">Regresar</a>
                        </div>
                    </div>
            </form>
        </section>
        <!-- /.content -->
        <?php } ?>

    </div>
  <!-- /.content-wrapper -->

<?php include("footer.php"); ?>

