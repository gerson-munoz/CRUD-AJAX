<?php
    include("../models/conexion.php");
    $con = conectar();

    if (isset($_POST['cedula'])) {

        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];

        $sql = "UPDATE Usuarios SET nombre='$nombre', apellidos='$apellidos', correo ='$correo', telefono='$telefono' WHERE cedula = '$cedula'";
        $resultado = mysqli_query($con,$sql);

        if (!$resultado) {
            die("Hubo un error en la consulta").$sql.mysqli_error($con);
        }
    }    
    mysqli_close($con);
?>