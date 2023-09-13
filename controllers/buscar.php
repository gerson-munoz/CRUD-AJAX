<?php

    include("../models/conexion.php");
    $con = conectar();

    $search = $_POST["search"];

    if(!empty($search)) {
        $sql = "SELECT * FROM Usuarios WHERE nombre LIKE '%$search%'";
        $resultado = mysqli_query($con, $sql);

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
                "telefono"=>$row["telefono"],
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

    mysqli_close($con);

?>