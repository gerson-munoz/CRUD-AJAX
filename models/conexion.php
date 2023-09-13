<?php 

    function conectar(){
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $db = 'bd_ajax';
    
        $con = mysqli_connect($host, $user, $password, $db);
    
        if(!$con){
            die('Error al conectarse '.mysqli_connect_error());
        }

        return $con;
    }

   