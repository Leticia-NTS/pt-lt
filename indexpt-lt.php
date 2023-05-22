<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Panatlla | Mantenimiento</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="../../pt-lt/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="../../pt-lt/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../../pt-lt/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="../../pt-lt/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin blue">
        <div class="wrapper">
            <section class="content">
              <div class="container-fluid">  
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                        <div class="card">
                            <div class="row justify-content-center">
                                <div class="col-md-6">   
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#añadir">Añadir</button>
                                </div>
                            </div>
                        </div>
                            <div class="card-header">
                                <h3 class="card-title">Tabla de mantenimiento</h3>
                            </div>
                            <div class="card-body">
                              <div class="form group">
                                <div class="row">
                                 <div class="col-12">
                                    <div class="card">
                                     <div class="card-body table-responsive p-0">
                                        <table id="example1" class="table tbale table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">N° modelo</th>
                                                    <th scope="col">Precio compra</th>
                                                    <th scope="col">Precio venta</th>
                                                    <th scope="col">Editar</th>
                                                    <th scope="col">Borrar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $conexion=mysqli_connect('localhost','root','','pt');
                                                $query = mysqli_query($conexion, "SELECT id_producto, nombre, n_modelo, p_compra, p_venta FROM ropa;");
                                                $result = mysqli_num_rows($query);
                                                if ($result > 0) {
                                                    while ($data = mysqli_fetch_assoc($query)) {
                                                        
                                                ?>
                                                    <tr>
                                                        <td><?php echo $data['id_producto']; ?></td>
                                                        <td><?php echo $data['nombre']; ?></td>
                                                        <td><?php echo $data['n_modelo']; ?></td>
                                                        <td><?php echo $data['p_compra']; ?></td>
                                                        <td><?php echo $data['p_venta']; ?></td>
                                                        <td>
                                                            <?php  ?>
                                                                <a href="editar.php?id=<?php echo $data['id_producto']; ?>" class="btn btn-warning"><i class='fa fa-edit'></i></a>
                                                            <?php  ?>
                                                        </td>
                                                        <td>
                                                        <?php  ?>
                                                                <a href="#.php?id=<?php echo $data['id_producto']; ?>" class="btn btn-danger"><i class='fa fa-times'></i></a>
                                                                <a type="button" class="btn btn-danger" class="fa fa-times" data-toggle="modal" data-target="#eliminar"></a>
                                                            <?php  ?>
                                                        </td>
                                                    </tr>
                                            <?php }
                                                } ?>
                                            </tbody>
                                            <tfoot>

                                            </tfoot>  
                                        </table>
                                     </div> <!--card-body-->
                                     <div class="card-body table-responsive p-0">
                                        <div class="modal fade" id="añadir" tabindex="-1" role="dialog" aria-labelledby="añadirm" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                <form id="fajax" name="fajax" method="POST">  
                                                <div class="modal-header">
                                                    <h1 class="modal-title" id="añadirm">Ingrese el registro</h1>
                                                </div>
                                                <div class="modal-body">
                                                        <div class="container-fluid">
                                                            <div class="row justify-content-md-center">
                                                            <div class="col-md-12">
                                                            <div class="card card-outline card-success">
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                    <label>Nombre</label>
                                                                                    <input type="text" name="nombre" id="nombre" class="form-control form-control-border"  placeholder="Ingrese el nombre">
                                                                            </div>
                                                                        <div class="col-md-6">
                                                                                    <label>Número de modelo</label>
                                                                                    <input type="text" name="nmodelo" id="nmodelo" class="form-control form-control-border" placeholder="Ingrese el número de modelo">
                                                                        </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                    <label>Precio de compra</label>
                                                                                    <input type="number" name="pcompra" id="pcompra" class="form-control form-control-border"  placeholder="Ingrese el precio unitario de compra">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                    <label>Precio de venta</label>
                                                                                    <input type="number" name="pventa" id="pventa" class="form-control form-control-border"  placeholder="Ingrese el precio unitario de venta">
                                                                            </div>
                                                                        </div>    
                                                                    </div> 
                                                                </div><!-- /.card-body -->
                                                            </div><!-- /.card -->                       
                                                            </div><!-- /.col --> 
                                                            </div><!-- /.row -->
                                                        </div><!-- /.container-fluid -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" id="btnguardar" class="btn btn-block btn-outline-success">Guardar</button>
                                                    <button type="button" id="btncerrar" class="btn btn-block btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                                                </div>
                                                </form>    
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                     <!--Aqui se puede agregar mas modal-->
                                   </div> <!--card-->
                                </div> <!--col-12-->
                                </div> <!--row-->
                              </div> <!--form group--> 
                            </div> <!--card-body-->
                        </div><!--card-->
                    </div> <!--col-md-12-->
                </div> <!--row-->
              </div>
            </section><!--section-->

            <footer>

            </footer>
        </div> <!--wrapper-->
                <!-- jQuery 2.1.3 -->
        <script src="../../pt-lt/plugins/jQuery/jQuery-2.1.3.min.js"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="../../pt-lt/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="../../pt-lt/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../../pt-lt/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- SlimScroll -->
        <script src="../../pt-lt/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src='../../pt-lt/plugins/fastclick/fastclick.min.js'></script>

        <!-- page script -->
        <script type="text/javascript">
            $(function () {
              $("#example1").dataTable();
              $('#example2').dataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": false,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": false
              });
            });
          </script>
          <script type="text/javascript">
                $(document).ready(function(){
                    $('#btnguardar').click(function(){
                        var datos=$('#fajax').serialize();
                        $.ajax({
                            type:"POST",
                            url:"../pt-lt/agregar.php",
                            data:datos,
                            success:function(){
                                
                            }					
                        });
                        window.location.reload(true);
                        document.forms['#fajax'].reset();
                    });
                });
         </script>

    </body>
</html>