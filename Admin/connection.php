<?php
    $connection = mysqli_connect('localhost', 'root', 'yes', 'princess_mobile');

    if (mysqli_connect_errno()){
        die('database connection failed' .mysqli_connect_error());
    }else{
        //echo "connection succesfull";
    }
?>