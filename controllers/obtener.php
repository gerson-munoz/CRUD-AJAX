<?php

    include("../models/conexion.php");
    $con = conectar();

    if(isset($_POST["cedula"])) {

        $cedula = $_POST["cedula"];

        $sql = "SELECT * FROM Usuarios WHERE cedula = {$cedula} ";
        $resultado =  mysqli_query($con, $sql);

        if(!$resultado) {
            die("Hubo un error en la consulta". mysqli_error($con));
        }

        $json = array();

        while($row = mysqli_fetch_array($resultado)){
            $json[] = array(
                "cedula"=>$row["cedula"],
                "nombre"=>$row["nombre"],
                "apellidos"=>$row["apellidos"],
                "correo"=>$row["correo"],
                "telefono"=>$row["telefono"]
            );
        }
        $jsonstring = json_encode($json[0]);
        echo $jsonstring;

        mysqli_close($con);
    }

    if(isset($_POST["correo"])) {

        $correo = $_POST["correo"];

        $sql = "SELECT * FROM Usuarios WHERE correo = {$correo} ";
        $resultado =  mysqli_query($con, $sql);

        if(!$resultado) {
            die("Hubo un error en la consulta". mysqli_error($con));
        }

        $json = array();

        while($row = mysqli_fetch_array($resultado)){
            $json[] = array(
                "cedula"=>$row["cedula"],
                "nombre"=>$row["nombre"],
                "apellidos"=>$row["apellidos"],
                "correo"=>$row["correo"],
                "telefono"=>$row["telefono"]
            );
        }
        $jsonstring = json_encode($json[0]);
        echo $jsonstring;

        mysqli_close($con);
    }

?>