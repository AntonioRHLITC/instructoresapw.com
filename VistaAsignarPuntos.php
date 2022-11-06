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
                        <h1 class="m-0">Otorgar puntos</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="./VistaUsuarios.php">Usuarios</a></li>
                            <li class="breadcrumb-item active">Otorgar puntos</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
            <style>
                .margin{
                    margin-left: 15%;
                    margin-right: 15%;
                }
            </style>

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
                .imageninstructor{
                    max-width:40%;
                    margin-left: 30%;
                }
                .titulo-Usuario{
                    text-align: center;
                }
                .pad{
                    padding-bottom: 1rem;
                }
            </style>

<!-- Main content -->
        <section class="content">
            <form action="modulos/Update_Usuarios.php" method="post" enctype="multipart/form-data">
                <div class="row align-items-center margin">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Foto del Instructor</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <div class="form-group">
                                        <?php 
                                            $CadenaImg1 = $Usuario['Foto'];
                                            if(file_exists($CadenaImg1)){
                                                $img1 = substr($CadenaImg1, 17);
                                                echo"<img class='img-fluid img-del imageninstructor' src='$Usuario[Foto]'>";
                                                echo"<h4 class='titulo-Usuario'>Instructor: $Usuario[Nombre] $Usuario[Primer_Apellido] $Usuario[Segundo_Apellido]</h4>";
                                            }else{
                                                echo"
                                                    <div class=' error alert alert-danger d-flex align-items-center fas fa-exclamation-triangle' role='alert'>&nbsp;&nbsp;
                                                        <div class='textoalert'>
                                                            La imagen no se encuentra en la dirección almacenada en la Base de Datos
                                                        </div>
                                                    </div>";
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

                <div class="row margin">
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
                                    <label for="inputID" class="col-sm-4 col-form-label">ID del Instructor:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="inputID" id="inputID" placeholder="ID" value="<?php echo $Usuario['ID_Usuario']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputNombre" class="col-sm-4 col-form-label">Nombre de Instructor:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="inputNombre" id="inputNombre" placeholder="Nombre" value="<?php echo $Usuario['Nombre']; ?> <?php echo $Usuario['Primer_Apellido']; ?> <?php echo $Usuario['Segundo_Apellido']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputCel" class="col-sm-4 col-form-label">Telefono Celular:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="inputCel"id="inputCel" placeholder="Celular" value="<?php echo $Usuario['Num_Cel']; ?>" readonly>
                                    </div>
                                </div>
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

                <div class="row margin">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header bg-warning">
                                <h3 class="card-title">Asignar Puntos</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputPuntos" class="col-sm-4 col-form-label">Puntos a asignar:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="inputPuntos" id="inputPuntos" placeholder="Puntos Pj: 10" required>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

                <div class="row margin pad">
                    <div class="col-md-12">
                        <a href="./VistaUsuarios.php" class="btn btn-secondary">Cancelar</a>
                        <button type='button' class='openModal btn btn-warning float-right' data-toggle='modal' data-target='#modalPuntos' rel='$img1'>Asignar puntos</button>
                    </div>
                </div>

            </form>
        </section>
        <!-- /.content -->
        <?php } ?>

        <!-- INICIO DANGER MODAL -->
        <style>
                    .modal-header{
                        background-color:#e7cd0c;
                    }
                    .modalBorrar{
                        text-transform: uppercase;
                        color: #534d64;
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
                        background-color:  #e7cd0c;
                        color:#534d64;
                    }
                    .modal-footer .borrar:hover{
                        background-color: whitesmoke;
                        border: solid .1rem  #e7cd0c;
                        font-weight: bold;
                        color: #534d64;
                    }

                </style>                   
                <div class="modal fade" id="modalPuntos">
                    <div class="modal-dialog">
                        <div class="modal-content bg-danger">
                            <div class="modal-header">
                                <h4 class="modal-title modalBorrar">Asignar puntos</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-align">
                                <p>Estas seguro que quieres asignar <span><h4 id="puntos"></h4></span> puntos a este Instructor?</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class=" cancelar btn btn-outline-light" data-dismiss="modal">Cancelar</button>
                                <button type="button" class=" delete borrar btn btn-outline-light" rel="puntos">Asignar puntos</button>
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
        jQuery(document).ready(function(){
            jQuery('.openModal').on('click',function(){
                var Points= $("#inputPuntos").val();
                if(Points==''){
                    jQuery('#modalPuntos').modal({
                        show:false
                    });
                    Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            title: 'ADVERTENCIA',
                            text: 'No haz ingresado una cantidad de puntos valida',
                            showConfirmButton: false,
                            timer: 3000
                        })
                }else{
                    jQuery('#puntos').text(Points);
                    jQuery('#modalPuntos').modal({
                        show:true
                    });
                }
            });
        });
        jQuery(document).ready(function(){
            jQuery('.delete').on('click', function(){
                var PuntosUsuario= $("#puntos").text();
                var Usuario='<?php echo $Usuario['ID_Usuario'];?>';
                //alert(rutaImg);
                $.ajax({
                    type: "POST",
                    url: "modulos/asignarPuntos.php",
                    data:{PuntosUsuario:PuntosUsuario, Usuario:Usuario},
                    success: function(){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Correcto',
                            text: 'Los puntos se asignaron correctamente',
                            footer: '(La pagína lo redijirá)',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        setTimeout('window.location.replace("./VistaUsuarios.php")',2500);
                        //setTimeout('document.location.reload()',3500);
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

