<?php
$conexion=mysqli_connect('localhost','root','','pt');

if (empty($_GET['id'])) {
    header("Location: indexpt-lt.php");
} else {
    $id_productoc = $_GET['id'];
    if (!is_numeric($id_productoc)) {
        header("Location: http://localhost/pt-lt/indexpt-lt.php");
    }
    $consulta = mysqli_query($conexion, "SELECT id_producto, nombre, n_modelo, p_compra, p_venta FROM ropa WHERE id_producto = $id_productoc");
    $data_producto = mysqli_fetch_assoc($consulta);
}
if (!empty($_POST)) {
    $alert = "";
    if (!empty($_POST['nombre']) ||  !empty($_POST['nmodelo'])  ||  !empty($_POST['pcompra'])  ||  !empty($_POST['pventa']) || !empty($_POST['producto_id'])) {
        $nombre = $_POST['nombre'];
        $nmodelo = $_POST['nmodelo'];
        $pcompra = $_POST['pcompra'];
        $pventa = $_POST['pventa'];
        $producto_id = $_GET['id'];

        $query_update = mysqli_query($conexion, "UPDATE ropa SET nombre = $nombre, n_modelo = $nmodelo, p_compra = $pcompra, p_venta = $pventa WHERE id_producto = $id_productoc");
        if ($query_update) {
            $alert = '<div class="alert alert-success" role="alert">
                        Guardado
                    </div>';
        } else {
            $alert = '<div class="alert alert-danger" role="alert">
                        Error
                    </div>';
        }

    } else {
        $alert = '<div class="alert alert-danger" role="alert">
                        Todo los campos son obligatorios
                    </div>';
    }
}
if(!empty($_POST)){
        $nombre = $_POST['nombre'];
        $nmodelo = $_POST['nmodelo'];
        $pcompra = $_POST['pcompra'];
        $pventa = $_POST['pventa'];
        $producto_id = $_GET['id'];

        $query_insert = mysqli_query($conexion, "INSERT INTO ropa (id_producto, nombre, n_modelo, p_compra, p_venta) VALUES ($producto_id, $nombre, $nmodelo, $pcompra, $pventa)"); 
}

    mysqli_close($conexion);
?>
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
        <div class="row justify-content-md-center">
            <div class="col-12">
                <div class="card card-outline card-danger">
                    <div class="card-body">
                            <form action="" id="fajax" method="post">                                                   

                                    <?php echo isset($alert) ? $alert : ''; ?>
                                <div class="row justify-content-center">
                                    <div class="col-md-2">
                                            <label for="id">Id</label>
                                            <input type="text" id="id_producto" name="id_producto" class="form-control form-control-border" value="<?php echo $data_producto['id_producto']; ?>" disabled>
                                    </div>
                                    <div class="col-md-2">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" id="nombre" name="nombre" class="form-control form-control-border" value="<?php echo $data_producto['nombre']; ?>">
                                    </div>
                                    <div class="col-md-4">
                                            <label for="nmodelo">Número de modelo</label>
                                            <input type="text" id="nmodelo" name="nmodelo" class="form-control form-control-border" value="<?php echo $data_producto['n_modelo']; ?>">
                                    </div>     
                                </div>   
                                <div class="row justify-content-center">
                                    <div class="col-md-2">
                                        <label for="pcompra">Precio de compra</label>
                                        <input type="text" id="pcompra" name="pcompra" class="form-control form-control-border" value="<?php echo $data_producto['p_compra']; ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="pventa">Precio de venta</label>
                                        <input type="text" id="pventa" name="pventa" class="form-control form-control-border" value="<?php echo $data_producto['p_venta']; ?>">
                                    </div>
                                </div>
                                    <br>
                                <div class="card-footer clearfix">
                                    <div class="row justify-content-center">
                                        <input type="submit" id="btnguardar" value="Guardar" class="btn btn-success">
                                        <a href="indexpt-lt.php" class="btn btn-danger">Regresar</a>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
    </section>

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

        <script>
            try {function calculate() {
                var myBox1 = document.getElementById('nombre').value; 
                var myBox2 = document.getElementById('nmodelo').value; 
                var myBox2 = document.getElementById('pcompra').value;
                var result = document.getElementById('pventa'); 
                var myResult = myBox1 * myBox2;
                result.setAttribute('value',myResult);

                }
            } catch (error) { throw error; }

        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#btnguardar').click(function(){
                    var datos=$('#fajax').serialize();
                    $.ajax({
                        type:"POST",
                        url:"../pt-lt/editar.php",
                        data:datos,
                        success:function(){
                            $('#main-contact-form').trigger("reset");
                        }                   
                    });
                    
                });
            });
        </script>

    </body>
</html>