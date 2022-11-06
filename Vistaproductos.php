<?php include("modulos/productos.php"); ?>
<?php include("cabecera.php"); ?>
<?php include("sideBar.php"); ?>

  <style>
      .horizontal{
          display: flex;
          gap: 1rem;
          align-items: center;
      }
  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 horizontal">
            <h1 class="m-0">Productos</h1>
            <h4 class="fas fas fa-cube fa-5x"></h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Productos</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <style>
          .botonprodu{
            float: right!important;
          }
        </style>
        <!-- /.row -->
        <div class="row">
          <div class="col-12 mb-3 botonprodu">
              <a href="./vistaNuevoProducto.php"><button type="button" class="btn btn-primary btn-lg btn-block ion-plus"> Nuevo producto</button></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de productos</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 400px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Imagen</th>
                      <th>Nombre de Producto</th>
                      <th>Precio</th>
                      <th>Stock</th>
                      <th>Estado</th>
                      <th>Tienda</th>
                      <th>Acción</th>
                    </tr>
                  </thead>
                  <style>
                        .img-fluid{
                          max-width: 25%;
                        }
                  </style>

                  <tbody>
                    <?php foreach($listaProductos as $Producto){ ?>
                      <tr>
                        <td><?php echo $Producto['ID_Producto']; ?></td>
                        <td><img class="img-fluid" src="<?php echo $Producto['Dir_Imagen1'];?>"></td>
                        <td><?php echo $Producto['Nombre_Producto']; ?></td>
                        <td><?php echo $Producto['Precio_producto']; ?> puntos</td>
                        <td><?php echo $Producto['Stock']; ?> piezas</td>
                        <td><?php echo $Producto['Nombre_Estado']; ?></td>
                        <td><?php echo $Producto['Nombre_Tienda']; ?></td>
                        <td><a href="./vistaMostrarProducto.php?ID_Producto=<?php echo $Producto['ID_Producto']; ?>&token=<?php echo hash_hmac('sha1',$Producto['ID_Producto'],KEY_TOKEN); ?>"><button type="button" class="btn bg-primary fas fa fa-eye"></button></a> <a href="./vistaEditProducto.php?ID_Producto=<?php echo $Producto['ID_Producto']; ?>&token=<?php echo hash_hmac('sha1',$Producto['ID_Producto'],KEY_TOKEN); ?>"><button type="button" class="btn bg-success ion-edit"></button></a> <button type="button" class="openModal btn bg-danger fas fa-trash-alt" data-toggle="modal" data-target="#modalEliminar" rel="<?php echo $Producto['ID_Producto']; ?>"></button></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
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
                        <h4 class="modal-title modalBorrar">Eliminar Producto</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Estas seguro que quieres eliminar este Producto?</p>
                        <h4 id="id_producto"></h4>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class=" cancelar btn btn-outline-light" data-dismiss="modal">Cancelar</button>
                        <button type="button" class=" delete borrar btn btn-outline-light" rel="id_producto">Eliminar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- FIN DANGER MODAL -->
        <!-- Main row -->
        <div class="row">

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
      jQuery(document).ready(function(){
          jQuery('.openModal').on('click',function(){
              var id_producto =$(this).attr('rel');
              jQuery('#id_producto').text(id_producto);
              jQuery('#modalEliminar').modal({
                  show:true
              });

          });
      });
      jQuery(document).ready(function(){
          jQuery('.delete').on('click', function(){
              var ProductoId= $("#id_producto").text();
              //alert(rutaImg);
              $.ajax({
                  type: "POST",
                  url: "modulos/Borrar_Producto.php",
                  data:{ProductoId:ProductoId},
                  success: function(){
                      Swal.fire({
                          position: 'center',
                          icon: 'success',
                          title: 'Correcto',
                          text: 'El Producto ha sido borrado correctamente',
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

<?php include("footer.php"); ?>

