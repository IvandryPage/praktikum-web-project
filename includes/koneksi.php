<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "terahub_db";

$koneksi = new mysqli($host, $user, $pass, $db);

if ($koneksi->connect_error) {
  die("❌ Koneksi ke database gagal: " . $koneksi->connect_error);
}
