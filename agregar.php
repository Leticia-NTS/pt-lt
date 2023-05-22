<?php 
    $conexion=mysqli_connect('localhost','root','','pt');

        $nombre=$_POST['nombre'];
        $nmodelo=$_POST['nmodelo'];
        $pcompra=$_POST['pcompra'];
        $pventa=$_POST['pventa'];

        $sql="INSERT INTO ropa (nombre,n_modelo,p_compra,p_venta)VALUES ('$nombre','$nmodelo','$pcompra','$pventa')";

        echo mysqli_query($conexion,$sql);

?>