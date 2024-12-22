<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "cleanup";

    $conn = new mysqli($hostname,$username,$password,$database);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    } else {
       //echo "Koneksi berhasil!";
    }

    // echo "Versi MySQL: " . mysqli_get_server_info($conn);
?>