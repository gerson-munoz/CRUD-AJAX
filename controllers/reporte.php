<?php
    require('../fpdf/fpdf.php');
    include('../models/conexion.php');
    $con = conectar();

    if(isset($_GET['cedula'])){

        $cedula = $_GET["cedula"];

        $sql = "SELECT * FROM Usuarios WHERE cedula = {$cedula} ";
        $resultado =  mysqli_query($con, $sql);

        if(!$resultado) {
            die("Hubo un error en la consulta". mysqli_error($con));
        }

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,15,'Datos Del Usuario',0,1,'C');

        while($row = mysqli_fetch_array($resultado)){    
            $cedula = $row['cedula'];
            $nombre = $row['nombre'];
            $apellidos = $row['apellidos'];
            $correo = $row['correo'];
            $telefono = $row['telefono'];     
        }

        $pdf->Cell(0,15,utf8_decode("Cedula: $cedula"),0,1);
        $pdf->Cell(0,15,utf8_decode("Nombre: $nombre"),0,1);
        $pdf->Cell(0,15,utf8_decode("Apellidos: $apellidos"),0,1);
        $pdf->Cell(0,15,utf8_decode("Correo: $correo"),0,1);
        $pdf->Cell(0,15,utf8_decode("Telefono: $telefono"),0,1);
        $pdf->Output();
    }
    

    
?>