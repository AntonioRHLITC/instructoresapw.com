<?php include("modulos/usuarios.php")?>
<?php include('cabecera.php'); ?>
<?php include('sideBar.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Nuevo Usuario</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="./VistaUsuarios.php">Usuarios</a></li>
                            <li class="breadcrumb-item active">Nuevo Usuario</li>
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
                                            <input type="text" class="form-control" name="inputID" id="inputID" placeholder="ID" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputNombre" class="col-sm-4 col-form-label">Nombre:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="inputNombre" id="inputNombre" placeholder="Nombre">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPrimerApell" class="col-sm-4 col-form-label">Primer Apellido:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="inputPrimerApell" id="inputPrimerApell" placeholder="Primer apellido">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSegundoApell" class="col-sm-4 col-form-label">Segundo Apellido:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="inputSegundoApell" id="inputSegundoApell" placeholder="Segundo apellido">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputCel" class="col-sm-4 col-form-label">Telefono Celular:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="inputCel"id="inputCel" placeholder="Celular">
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
                                            <input type="text" class="form-control" name="inputNomina" id="inputNomina" placeholder="No. de Nomina">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="selectPlanta" class="col-sm-4 col-form-label">Planta:</label>
                                        <div class="col-sm-8">
                                            <select name="selectPlanta" id="selectPlanta" class="form-control custom-select">
                                                <option selected="selected" disabled>Elige una Planta</option>
                                                <?php foreach($listaPlantas as $planta){ ?>
                                                    <option value="<?php echo $planta['ID_Planta']?>"><?php echo $planta['Nombre_Planta']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="selectProceso" class="col-sm-4 col-form-label">Proceso:</label>
                                        <div class="col-sm-8" id="selProceso"></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="selectFuncion" class="col-sm-4 col-form-label">Función:</label>
                                        <div class="col-sm-8">
                                            <select name="selectFuncion" id="selectFuncion" class="form-control custom-select">
                                                <option selected="selected" disabled>Elige una Función</option>
                                                <?php foreach($listaFunciones as $funcion){ ?>
                                                    <option value="<?php echo $funcion['ID_Funcion']?>"><?php echo $funcion['Nombre_Funcion']?></option>
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
                                            <input type="text" class="form-control" name="inputCorreoE" id="inputCorreoE" placeholder="Correo electrónico">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Contraseña:</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Contraseña">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="selectRol" class="col-sm-4 col-form-label">Rol:</label>
                                        <div class="col-sm-8">
                                            <select name="selectRol" id="selectRol" class="form-control custom-select">
                                                <option selected="selected" disabled>Elige un Rol</option>
                                                <?php foreach($listaRoles as $rol){ ?>
                                                    <option value="<?php echo $rol['ID_Rol']?>"><?php echo $rol['Rol']?></option>
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
                            <a href="./VistaUsuarios.php" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" value="Insertar" name="enviar" class="btn btn-success float-right">Crear Usuario</button>
                        </div>
                    </div>
            </form>
        </section>
        <!-- /.content -->
    

    </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
        $(document).ready(function(){
            $('#selectPlanta').val();
            recargarLista();

            $('#selectPlanta').change(function(){
                recargarLista();
            });
        });
        function recargarLista(){
            var planta =$('#selectPlanta').val()
            $.ajax({
                
                type:"POST",
                url:"modulos/llenarSelect.php",
                data:{planta:planta},
                success:function(r){
                    $('#selProceso').html(r);
                }
            });
        }
    </script>


<?php include("footer.php"); ?>

