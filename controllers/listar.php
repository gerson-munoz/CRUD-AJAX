<?php 

    include('../models/conexion.php');

    $con = conectar();

    $sql = 'SELECT * FROM Usuarios';
    $resultado = mysqli_query($con, $sql);

    if(!$resultado){
        die("No se pudo realizar la consulta: ".mysqli_error());
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

    $jsonstring = json_encode($json);
    echo $jsonstring;

    mysqli_close($con);

?>