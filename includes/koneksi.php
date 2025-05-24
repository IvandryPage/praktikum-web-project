<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "terahub_db";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if ($koneksi->connect_error) {
  die("❌ Koneksi ke database gagal: " . $koneksi->connect_error);
}
