<?php 
    include('../models/conexion.php');
    $con = conectar();

    if(isset($_POST["cedula"])){
        $cedula = $_POST["cedula"];
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];

        $sqlCedula = "SELECT * FROM Usuarios WHERE cedula = '$cedula'";
        $resultadoCedula = mysqli_query($con,$sqlCedula);
        $rowCedula = mysqli_fetch_array($resultadoCedula,MYSQLI_ASSOC);

        $sqlCorreo = "SELECT * FROM Usuarios WHERE correo = '$correo'";
        $resultadoCorreo = mysqli_query($con,$sqlCorreo);
        $rowCorreo = mysqli_fetch_array($resultadoCorreo,MYSQLI_ASSOC);

        if(count($rowCedula) > 0){
            echo "La cedula '$cedula' ya esta registrada";
        }else{
            if(count($rowCorreo) > 0){
                echo "El correo '$correo' ya esta registrado";
            }else{
                $sql = "INSERT INTO Usuarios(cedula, nombre, apellidos, correo, telefono) VALUES ('$cedula', '$nombre', '$apellidos', '$correo', '$telefono')";
                $resultado = mysqli_query($con,$sql);

                if(!$resultado){
                    echo 'Ocurrio un error';
                }else{
                    echo 'Usuario registrado';
                }
            }
        }        
    }

    mysqli_close($con);

?>