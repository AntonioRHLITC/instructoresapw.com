<?php include("modulos/moduloPedidoAdmin.php")?>
<?php include("modulos/ventas.php")?>
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
        
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pedido Pendiente</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="./Vistaventas.php">Ventas</a></li>
                            <li class="breadcrumb-item active">Pedido pendiente</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <style>
                    .info-cards{
                        margin-bottom: 1rem;
                        align-items: center;
                        justify-content: center;
                    }
                    .card-total{
                        margin-bottom: 1rem;
                        align-items:flex-end;
                        justify-content:end;
                    }
                    .info-total{
                        min-width: 15rem;
                        min-height: 2rem;
                        align-items: center;
                        justify-content: center;
                        text-align: center;
                        padding: 0.2rem 1rem;
                        background-color: #ffc107;
                        border: .1rem solid #ffc107;
                        margin-top: 1rem;
                        margin-right: 1rem; 
                    }
                    .info-pedido{
                        min-width: 15rem;
                        min-height: 2rem;
                        align-items: center;
                        justify-content: center;
                        text-align: center;
                        padding: 0.2rem 1rem;
                        border-radius: .6rem;
                        background-color: #d8d8d8;
                        border: .1rem solid #ffc107;
                        margin-right: 2rem;
                        margin-bottom: .5rem;
                    }
                    .info-pedido h5{
                        font-size: 1.4rem !important;
                        font-weight: 400;
                        margin: 0rem;
                    }
                    .info-pedido span{
                        font-size: 1.3rem !important;
                        font-weight: 200;
                        margin: 0rem;
                    }
                    .img-pedido{
                        max-width: 30%;
                        margin: 0;
                        padding: 0;
                    }
                </style>
                
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <?php foreach($datosVenta as $venta){ ?>
            <?php $idVenta = $venta['ID_Venta']; ?>
            <?php $nombrep = $venta['Nombre']; ?>
            <?php $fechaV = $venta['Fecha']; ?>
            <?php $comentarioC = $venta['Comentario']; ?>
            <?php $totalV = number_format($venta['Total']); ?>
        


        <!-- Main content -->
        <section class="content">
            <form action="modulos/Update_Pedido.php" method="post" enctype="multipart/form-data">
                <div class="row">
                        <div class="col-md-12">
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Información del pedido</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <input name="id_venta" id="id_venta" type="hidden" value="<?php echo $idVenta; ?>" >
                                <div class="card-body">
                                    <div class="row info-cards">
                                        <div class="info-pedido">
                                            <h5 class="">ID-Pedido:</h5>
                                            <span><?php echo $idVenta; ?></span>
                                        </div>
                                        <div class="info-pedido">
                                            <h5 class="">Cliente:</h5>
                                            <span><?php echo $nombrep; ?></span>
                                        </div>
                                        <div class="info-pedido">
                                            <h5 class="">Fecha:</h5>
                                            <span><?php echo $fechaV; ?></span>
                                        </div>
                                    </div>
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover text-nowrap">
                                            <thead class="bg-warning">
                                                <tr>
                                                <th class="col-sm-2">Imagen</th>
                                                <th class="col-sm-2">Producto</th>
                                                <th class="col-sm-2">Cantidad</th>
                                                <th class="col-sm-2">Costo Unit.</th>
                                                <th class="col-sm-2">Total</th>
                                                </tr>
                                            </thead>
                                            <?php foreach($detalleVenta as $pedido){ ?>
                                            <?php $costoUnit = number_format($pedido['PrecioUnit']); ?>
                                            <?php $total = number_format($pedido['Total']); ?>
                                            <tbody>
                                                <tr class="table-warning">
                                                <td><img class="img-pedido" src="<?php echo $pedido['Dir_Imagen1']; ?>" alt=""></td>
                                                <td><?php echo $pedido['Nombre_Producto'] ?></td>
                                                <td><?php echo $pedido['Cantidad'] ?></td>
                                                <td><?php echo $costoUnit ?></td>
                                                <td><?php echo $total ?> puntos</td>
                                                </tr>
                                            </tbody>
                                            <?php } ?>
                                        </table>
                                        <div class="row card-total">
                                            <div class="info-total">
                                                <h5 class="">Total de pedido: <span><?php echo $totalV; ?></span></h5>
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
                    <div class="col-md-12">
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Estatus del pedido</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label for="selectEstatus" class="col-sm-4 col-form-label">Estatus del pedido:</label>
                                        <div class="col-sm-8">
                                            <select name="selectEstatus" id="selectEstatus" class="form-control custom-select">
                                                <option selected="selected" disabled>Elige un Estatus</option>

                                                <?php foreach($estatusPedido as $estatus){ ?>
                                                    <?php if($venta['ID_Estatus']== $estatus['ID_Estatus']){ ?>
                                                        <option selected value="<?php echo $venta['ID_Estatus']?>"><?php echo $venta['NombreEstatus']?></option>
                                                    <?php }else{ ?>
                                                        <option value="<?php echo $estatus['ID_Estatus']?>"><?php echo $estatus['NombreEstatus']?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputComent" class="col-sm-4 col-form-label">Comentario:</label>
                                        <div class="col-sm-8">
                                            <textarea name="inputComent" id="inputComent" class="form-control" rows="4"><?php echo $comentarioC; ?></textarea>
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
                                <a href="./Vistaventas.php" class="btn btn-secondary">Cancelar cambios</a>
                                <button type="submit" value="Actualizar" name="enviar" class="btn btn-success float-right">Actualizar pedido</button>
                            </div>
                        </div>
                    
            </form>
        </section>
        <!-- /.content -->
        

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
    <?php } ?>
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

