<?php
    include("../models/conexion.php");
    $con = conectar();

    if (isset($_POST['cedula'])) {
        
        $cedula = $_POST['cedula'];

        $sql = "DELETE FROM Usuarios WHERE cedula='$cedula'";
        $resultado = mysqli_query($con,$sql);

        if(!$resultado) {
            die("Hubo un error en la consulta". mysqli_error($con));
        }
    }
    
    mysqli_close($con);
?>