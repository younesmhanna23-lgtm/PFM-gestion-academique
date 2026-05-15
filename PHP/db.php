<?php

    // Database connection parameters

    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'pfm_gestion_academique';
    $conn = "";

    try {
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    } catch(mysqli_sql_exception) {
        echo "Could not connect to database: " . mysqli_connect_error();
    }
?>