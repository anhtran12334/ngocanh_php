<?php
    $username = "root";
    $password = "12345678";
    $host = "localhost";
    $database = "acc_smartphone";
    
    // Create connection
    $conn = mysqli_connect($host, $username, $password, $database);
    
    // Check connection
    
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
?>