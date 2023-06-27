<?php

    $servername = "localhost";
    $database   = "db_vapestore";
    $username   = "root";
    $password   = "";

    $connection = mysqli_connect($servername, $username, $password, $database);
    if (!$connection) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    $id = $_GET['id'];
    $hapus = mysqli_query($connection,"DELETE FROM slider WHERE id = '$id'");
    echo '<script> location.replace("landing_page.php"); </script>';
?>