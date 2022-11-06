<?php include("modulos/categorias.php"); ?>
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
            <h1 class="m-0">Categorías</h1>
            <h4 class="fas fas fa-boxes fa-5x"></h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Categorías</li>
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
              <a href="./vistaNuevaCategoria.php"><button type="button" class="btn btn-primary btn-lg btn-block ion-plus"> Nueva Categoría</button></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Categorías</h3>

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
                      <th>Nombre de Categoría</th>
                      <th>Acción</th>
                    </tr>
                  </thead>
                  <style>
                        .img-fluid{
                          max-width: 50%;
                        }
                  </style>

                  <tbody>
                    <?php foreach($listaCategorias as $Categoria){ ?>
                      <tr>
                        <td><?php echo $Categoria['ID_Categoria']; ?></td>
                        <td><img class="img-fluid" src="<?php echo $Categoria['Dir_Imagen1']; ?>"></td>
                        <td><?php echo $Categoria['Nombre_Categ']; ?></td>
                        <td><a href="./vistaMostrarCategoria.php?ID_Categoria=<?php echo $Categoria['ID_Categoria']; ?>&token=<?php echo hash_hmac('sha1',$Categoria['ID_Categoria'],KEY_TOKEN); ?>"><button type="button" class="btn bg-primary fas fa fa-eye"></button></a> <a href="./vistaEditCategoria.php?ID_Categoria=<?php echo $Categoria['ID_Categoria']; ?>&token=<?php echo hash_hmac('sha1',$Categoria['ID_Categoria'],KEY_TOKEN); ?>"><button type="button" class="btn bg-success ion-edit"></button></a> <button type="button" class="openModal btn bg-danger fas fa-trash-alt" data-toggle="modal" data-target="#modalEliminar" rel="<?php echo $Categoria['ID_Categoria']; ?>"></button></td>
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
                        <h4 class="modal-title modalBorrar">Eliminar categoría</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Estas seguro que quieres eliminar esta Categoría?</p>
                        <h4 id="id_categoria"></h4>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class=" cancelar btn btn-outline-light" data-dismiss="modal">Cancelar</button>
                        <button type="button" class=" delete borrar btn btn-outline-light" rel="id_categoria">Eliminar</button>
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
              var id_categoria =$(this).attr('rel');
              jQuery('#id_categoria').text(id_categoria);
              jQuery('#modalEliminar').modal({
                  show:true
              });

          });
      });
      jQuery(document).ready(function(){
          jQuery('.delete').on('click', function(){
              var CategoriaId= $("#id_categoria").text();
              //alert(rutaImg);
              $.ajax({
                  type: "POST",
                  url: "modulos/Borrar_Categoria.php",
                  data:{CategoriaId:CategoriaId},
                  success: function(){
                      Swal.fire({
                          position: 'center',
                          icon: 'success',
                          title: 'Correcto',
                          text: 'La categoría ha sido borrada correctamente',
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

