<?php include("modulos/tienda.php")?>
<?php include("cabecera.php"); ?>
<?php include("sideBar.php"); ?>
<?php include("modulos/tiendas.php"); ?>

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
                        <h1 class="m-0">Modificar Tienda</h1>
                        <h4 class="bg-success pt-2 pb-2 pl-2 mt-2"><?php echo $Tienda['Nombre_Tienda']; ?></h4>
                    </div><!-- /.col -->
                    <div class="col-sm-3">
                        <img class="img-fluid" src="<?php echo $Tienda['Foto'];?>">
                    </div>
                    <div class="col-sm-3">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="./VistaTiendas.php">Tiendas</a></li>
                            <li class="breadcrumb-item active">Modificar Tienda</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

    
        <!-- Main content -->
        <section class="content">
        
        <div class="row">
            <form action="modulos/Update_Tienda.php" method="post" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" name="inputID" id="inputID" value="<?php echo $Tienda['ID_Tienda']; ?>" readonly>
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
                                    <input type="text" class="form-control" name="inputTienda" id="inputTienda" value="<?php echo $Tienda['Nombre_Tienda']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="selectEstado" class="col-sm-4 col-form-label">Estado:</label>
                                <div class="col-sm-8">
                                    <select name="selectEstado" id="selectEstado" class="form-control custom-select">
                                        <option selected="selected" disabled>Elige un estado</option>
                                        <?php if($Tienda['ID_Estado']==1){ ?>
                                                <option selected value="<?php echo $Tienda['ID_Estado']?>"><?php echo $Tienda['Nombre_Estado']?></option>
                                                <option value="2">Inactivo</option>
                                            <?php }else if($Tienda['ID_Estado']==2){ ?>
                                                <option value="1">Activo</option> 
                                                <option selected value="<?php echo $Tienda['ID_Estado']?>"><?php echo $Tienda['Nombre_Estado']?></option>
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
                            <div class="form-group">
                                <label for="inputImagen1">Imagen #1:</label>
                                <?php 
                                    $CadenaImg1 = $Tienda['Foto'];
                                    if(file_exists($CadenaImg1)){
                                        $img1 = substr($CadenaImg1, 16);
                                        echo"<img class='img-fluid img-del' src='$Tienda[Foto]'>";
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
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="./VistaTiendas.php" class="btn btn-secondary">Cancelar cambios</a>
                    <button type="submit" value="Actualizar" name="enviar" class="btn btn-success float-right">Guardar cambios</button>
                </div>
            </div>
        </form>
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
                        var Dir = 'imagenesTiendas/';
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

            </script>

        </section>
        <!-- /.content -->
    
    
    </div>
  <!-- /.content-wrapper -->




    
<?php include("footer.php"); ?>

