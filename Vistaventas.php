<?php include("modulos/ventas.php")?>
<?php include("cabecera.php"); ?>
<?php include("sideBar.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


      <div class="row">
          <div class="col-12 connectedSortable">
            <div class="card border-warning">
              <div class="card-header">
                <h3 class="card-title">Pedidos pendientes</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
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
                  <thead class="bg-warning">
                    <tr>
                      <th>ID Orden</th>
                      <th>Usuario</th>
                      <th>Estatus</th>
                      <th>Fecha</th>
                      <th>Total</th>
                      <th>Acción</th>
                    </tr>
                  </thead>
                  <?php foreach($ventas as $venta){ ?>
                  <?php $total = number_format($venta['Total']); ?>
                  <tbody>
                    <tr class="table-warning">
                      <td><?php echo $venta['ID_Venta'] ?></td>
                      <td><?php echo $venta['Nombre'] ?></td>
                      <td><?php echo $venta['NombreEstatus'] ?></td>
                      <td><?php echo $venta['Fecha'] ?></td>
                      <td><?php echo $total ?> puntos</td>
                      <td><a href="./vistaPedidoEdit.php?ID_Venta=<?php echo $venta['ID_Venta']; ?>&token=<?php echo hash_hmac('sha1',$venta['ID_Venta'],KEY_TOKEN); ?>"><button type="button" class="btn bg-warning ion-eye"></button></a></td>
                    </tr>
                  </tbody>
                  <?php } ?>
                </table>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          
        </div>

        <!-- Main row -->
        <div class="row">

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

      <div class="row">
          <div class="col-12 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pedidos listos para entrega</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
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
                  <thead class="bg-success">
                    <tr>
                      <th>ID Orden</th>
                      <th>Usuario</th>
                      <th>Estatus</th>
                      <th>Fecha</th>
                      <th>Total</th>
                      <th>Acción</th>
                    </tr>
                  </thead>
                  <?php foreach($pEntrega as $ppEntrega){ ?>
                  <?php $total = number_format($ppEntrega['Total']); ?>
                  <tbody>
                    <tr class="table-success">
                      <td><?php echo $ppEntrega['ID_Venta'] ?></td>
                      <td><?php echo $ppEntrega['Nombre'] ?></td>
                      <td><?php echo $ppEntrega['NombreEstatus'] ?></td>
                      <td><?php echo $ppEntrega['Fecha'] ?></td>
                      <td><?php echo $total ?> puntos</td>
                      <td><a href="./vistaPedidoEntregar.php?ID_Venta=<?php echo $ppEntrega['ID_Venta']; ?>&token=<?php echo hash_hmac('sha1',$ppEntrega['ID_Venta'],KEY_TOKEN); ?>"><button type="button" class="btn bg-success ion-eye"></button></a></td>
                    </tr>
                  </tbody>
                  <?php } ?>
                </table>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>          
      </div>

      <div class="row">
      <div class="col-12 connectedSortable">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pedidos cancelados</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
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
                  <thead class="bg-danger">
                    <tr>
                      <th>ID Orden</th>
                      <th>Usuario</th>
                      <th>Estatus</th>
                      <th>Fecha</th>
                      <th>Total</th>
                      <th>Acción</th>
                    </tr>
                  </thead>
                  <?php foreach($pCancelados as $pCancelado){ ?>
                  <?php $total = number_format($pCancelado['Total']); ?>
                  <tbody>
                    <tr class="table-danger">
                      <td><?php echo $pCancelado['ID_Venta'] ?></td>
                      <td><?php echo $pCancelado['Nombre'] ?></td>
                      <td><?php echo $pCancelado['NombreEstatus'] ?></td>
                      <td><?php echo $pCancelado['Fecha'] ?></td>
                      <td><?php echo $total ?> puntos</td>
                      <td><a href="./vistaPedidoCancelado.php?ID_Venta=<?php echo $pCancelado['ID_Venta']; ?>&token=<?php echo hash_hmac('sha1',$pCancelado['ID_Venta'],KEY_TOKEN); ?>"><button type="button" class="btn bg-danger ion-eye"></button></a></td>
                    </tr>
                  </tbody>
                  <?php } ?>
                </table>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
      </div>
        
        <div class="row">
          <div class="col-12 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pedidos entregados</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
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
                  <thead class="bg-primary">
                    <tr>
                      <th>ID Orden</th>
                      <th>Usuario</th>
                      <th>Estatus</th>
                      <th>Fecha</th>
                      <th>Total</th>
                      <th>Acción</th>
                    </tr>
                  </thead>
                  <?php foreach($pEntregados as $pEntregado){ ?>
                  <?php $total = number_format($pEntregado['Total']); ?>
                  <tbody>
                    <tr class="table-primary">
                      <td><?php echo $pEntregado['ID_Venta'] ?></td>
                      <td><?php echo $pEntregado['Nombre'] ?></td>
                      <td><?php echo $pEntregado['NombreEstatus'] ?></td>
                      <td><?php echo $pEntregado['Fecha'] ?></td>
                      <td><?php echo $total ?> puntos</td>
                      <td><a href="./vistaPedidoEntregado.php?ID_Venta=<?php echo $pEntregado['ID_Venta']; ?>&token=<?php echo hash_hmac('sha1',$pEntregado['ID_Venta'],KEY_TOKEN); ?>"><button type="button" class="btn bg-primary ion-eye"></button></a></td>
                    </tr>
                  </tbody>
                  <?php } ?>
                </table>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          
        </div>

        <!-- Main row -->
        <div class="row">

        </div>
        <!-- /.row (main row) -->



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php include("footer.php"); ?>

