<?php include("modulos/usuario.php")?>
<?php include('cabecera.php'); ?>
<?php include('sideBar.php'); ?>

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
                        <h1 class="m-0">Modificar Usuario</h1>
                        <h4 class="bg-success pt-2 pb-2 pl-2 mt-2"><?php echo $Usuario['Nombre']; ?></h4>
                    </div><!-- /.col -->
                    <div class="col-sm-3">
                        <img class="img-fluid" src="<?php echo $Usuario['Foto'];?>">
                    </div>
                    <div class="col-sm-3">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="./VistaUsuarios.php">Usuarios</a></li>
                            <li class="breadcrumb-item active">Modificar Usuario</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <!-- Main content -->
        <section class="content">
            <form action="modulos/Update_Usuarios.php" method="post" enctype="multipart/form-data">
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
                                            <input type="text" class="form-control" name="inputNombre" id="inputNombre" placeholder="Nombre" value="<?php echo $Usuario['Nombre']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPrimerApell" class="col-sm-4 col-form-label">Primer Apellido:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="inputPrimerApell" id="inputPrimerApell" placeholder="Primer apellido" value="<?php echo $Usuario['Primer_Apellido']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSegundoApell" class="col-sm-4 col-form-label">Segundo Apellido:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="inputSegundoApell" id="inputSegundoApell" placeholder="Segundo apellido" value="<?php echo $Usuario['Segundo_Apellido']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputCel" class="col-sm-4 col-form-label">Telefono Celular:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="inputCel"id="inputCel" placeholder="Celular" value="<?php echo $Usuario['Num_Cel']; ?>" required>
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
                                            <input type="text" class="form-control" name="inputNomina" id="inputNomina" placeholder="No. de Nomina" value="<?php echo $Usuario['Num_Nomina']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="selectPlanta" class="col-sm-4 col-form-label">Planta:</label>
                                        <div class="col-sm-8">
                                            <select name="selectPlanta" id="selectPlanta" class="form-control custom-select">
                                                <option selected="selected" disabled>Elige una Planta</option>
                                                <?php foreach($listaPlantas as $planta){ ?>
                                                    <?php if($Usuario['ID_Planta']== $planta['ID_Planta']){ ?>
                                                        <option selected value="<?php echo $planta['ID_Planta']?>"><?php echo $planta['Nombre_Planta']?></option>
                                                    <?php }else{ ?>
                                                        <option value="<?php echo $planta['ID_Planta']?>"><?php echo $planta['Nombre_Planta']?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="selectProceso" class="col-sm-4 col-form-label">Proceso:</label>
                                        <div class="col-sm-8" id="selProceso">
                                            <select name="selectProceso" id="selectProceso" class="form-control custom-select">
                                                <option selected="selected" value="<?php echo $Usuario['ID_Proceso']; ?>"><?php echo $Usuario['Nombre_Proceso']; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="selectFuncion" class="col-sm-4 col-form-label">Función:</label>
                                        <div class="col-sm-8">
                                            <select name="selectFuncion" id="selectFuncion" class="form-control custom-select">
                                                <option selected="selected" disabled>Elige una Funcion</option>
                                                <?php foreach($listaFunciones as $funcion){ ?>
                                                    <?php if($Usuario['ID_Funcion']== $funcion['ID_Funcion']){ ?>
                                                        <option selected value="<?php echo $funcion['ID_Funcion']?>"><?php echo $funcion['Nombre_Funcion']?></option>
                                                    <?php }else{ ?>
                                                        <option value="<?php echo $funcion['ID_Funcion']?>"><?php echo $funcion['Nombre_Funcion']?></option>
                                                    <?php } ?>
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
                                            <input type="text" class="form-control" name="inputCorreoE" id="inputCorreoE" placeholder="Correo electrónico" value="<?php echo $Usuario['Correo']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Contraseña:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="inputPassword" id="inputPassword" placeholder="Contraseña" value="<?php echo $Usuario['Password']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="selectRol" class="col-sm-4 col-form-label">Rol:</label>
                                        <div class="col-sm-8">
                                            <select name="selectRol" id="selectRol" class="form-control custom-select">
                                                <option selected="selected" disabled>Elige un Rol</option>
                                                <?php foreach($listaRoles as $rol){ ?>
                                                    <?php if($Usuario['ID_Rol']== $rol['ID_Rol']){ ?>
                                                        <option selected value="<?php echo $rol['ID_Rol']?>"><?php echo $rol['Rol']?></option>
                                                    <?php }else{ ?>
                                                        <option value="<?php echo $rol['ID_Rol']?>"><?php echo $rol['Rol']?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="selectEstado" class="col-sm-4 col-form-label">Estado:</label>
                                        <div class="col-sm-8">
                                            <select name="selectEstado" id="selectEstado" class="form-control custom-select">
                                                <option selected="selected" disabled>Elige un Estado</option>
                                                <?php foreach($listaEstados as $estado){ ?>
                                                    <?php if($Usuario['ID_Estado']== $estado['ID_Estado']){ ?>
                                                        <option selected value="<?php echo $estado['ID_Estado']?>"><?php echo $estado['Nombre_Estado']?></option>
                                                    <?php }else{ ?>
                                                        <option value="<?php echo $estado['ID_Estado']?>"><?php echo $estado['Nombre_Estado']?></option>
                                                    <?php } ?>
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
                                <div class=' advertencia alert alert-danger d-flex align-items-center fas fa-bullhorn' role='alert'>&nbsp;&nbsp;
                                    <div class='textoalert'>
                                        Para cambiar una imágen, primero tendrás que eliminar la actual.
                                    </div>
                                </div>
                                <style>
                                    .advertencia{
                                        margin-top: .3rem;
                                        background-color: #efef36;
                                        border: none;
                                        color: black;
                                    }
                                    .img-del{
                                        max-width: 25%;
                                        margin: .5rem 1rem 2rem 0rem;
                                        border-radius: .7rem;
                                        border: solid .1rem;
                                    }
                                    .textoalert{
                                        font-family:sans-serif;
                                        font-weight: 300;
                                        font-size: 1.3rem;
                                    }
                                    .error{
                                        margin-top: .3rem;
                                        background-color: #e7182e;
                                    }
                                    .exito{
                                        background-color: #30F16C;
                                    }
                                </style>
                                <div class="container">
                                    <div class="form-group">
                                        <label for="inputImagen1">Imagen #1:</label>
                                        <?php 
                                            $CadenaImg1 = $Usuario['Foto'];
                                            if(file_exists($CadenaImg1)){
                                                $img1 = substr($CadenaImg1, 17);
                                                echo"<img class='img-fluid img-del' src='$Usuario[Foto]'>";
                                                echo"<span id='img1'>$img1&nbsp&nbsp</span>";
                                                echo "<button type='button' class='openModal btn btn-danger fas fa-trash-alt' data-toggle='modal' data-target='#modalEliminar' rel='$img1'>";
                                            }else{
                                                echo"
                                                <div class=' error alert alert-danger d-flex align-items-center fas fa-exclamation-triangle' role='alert'>&nbsp;&nbsp;
                                                    <div class='textoalert'>
                                                        La imagen no se encuentra en la dirección almacenada en la Base de Datos
                                                    </div>
                                                </div>";
                                                echo"<input type='file' id='inputImagen1' name='inputImagen1' class='admin form-control' required>";
                                            }
                                        ?>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="./VistaUsuarios.php" class="btn btn-secondary">Cancelar cambios</a>
                                <button type="submit" value="Actualizar" name="enviar" class="btn btn-success float-right">Guardar cambios</button>
                            </div>
                        </div>
                    </div> 
            </form>
        </section>
        <!-- /.content -->
        <?php } ?>

        <!-- INICIO DANGER MODAL -->
        <style>
                    .modal-header{
                        background-color: #e7182e;
                    }
                    .modalBorrar{
                        text-transform: uppercase;
                    }
                    .modal-body{
                        background-color: whitesmoke;
                        color: #534d64;
                        font-size: 1.3rem;
                        font-weight: 400;
                    }
                    .modal-footer{
                        background-color: whitesmoke;
                    }
                    .modal-footer .cancelar{
                        background-color: #534d64;
                        color: white;
                    }
                    .modal-footer .cancelar:hover{
                        background-color: whitesmoke;
                        border: solid .1rem #534d64;
                        font-weight: bold;
                        color: #534d64;
                    }
                    .modal-footer .borrar{
                        background-color: #e7182e;
                        color: white;
                    }
                    .modal-footer .borrar:hover{
                        background-color: whitesmoke;
                        border: solid .1rem #e7182e;
                        font-weight: bold;
                        color: #e7182e;
                    }
                </style>                   
                <div class="modal fade" id="modalEliminar">
                    <div class="modal-dialog">
                        <div class="modal-content bg-danger">
                            <div class="modal-header">
                                <h4 class="modal-title modalBorrar">Eliminar imágen</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Estas seguro que quieres eliminar esta imágen?</p>
                                <h4 id="dirImg"></h4>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class=" cancelar btn btn-outline-light" data-dismiss="modal">Cancelar</button>
                                <button type="button" class=" delete borrar btn btn-outline-light" rel="dirImg">Eliminar imágen</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- FIN DANGER MODAL -->

    </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
        $(document).ready(function(){
            $('#selectPlanta').val();
                //recargarLista();

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

    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('.openModal').on('click',function(){
                var dir =$(this).attr('rel');
                jQuery('#dirImg').text(dir);
                jQuery('#modalEliminar').modal({
                    show:true
                });

            });
        });
        jQuery(document).ready(function(){
            jQuery('.delete').on('click', function(){
                var rutaImg= $("#dirImg").text();
                var Dir = 'imagenesUsuarios/';
                //alert(rutaImg);
                $.ajax({
                    type: "POST",
                    url: "modulos/eliminarimg.php",
                    data:{rutaImg:rutaImg, Dir:Dir},
                    success: function(){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Correcto',
                            text: 'La imágen ha sido borrada correctamente',
                            footer: '(La pagína se recargara automaticamente)',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        setTimeout('document.location.reload()',3500);
                    }
                });
            });
        });

        var img1 = "<?php echo $img1;?>";
        var img2 = "<?php echo $img2;?>";
        var img3 = "<?php echo $img3;?>";
        var img4 = "<?php echo $img4;?>";

    </script>

<?php include("footer.php"); ?>

