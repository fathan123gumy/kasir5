<?php

//koneksi

$host = "localhost";
$ussername = "root";
$password = "";
$database = "kasir_gummy_resto";

$koneksi = mysqli_connect($host, $ussername, $password, $database);

if($koneksi){
    echo("database terhubung");
}else {
    echo("database error");
}
