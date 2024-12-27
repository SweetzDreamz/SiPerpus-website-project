<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_siperpus");
if($koneksi->connect_errno){
    echo "Failed to connect to MySQL: " . $koneksi -> connect_error;
    exit();
}