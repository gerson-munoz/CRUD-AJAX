<?php

    $user = "root";
    $password = "";
    $host = "localhost";
    $bd = "bd_ajax";

    $con = mysqli_connect($host,$user,$password,$bd);

    if(!$con){
        die("Error al conectarse");
    }