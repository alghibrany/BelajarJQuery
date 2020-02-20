<?php
$connect = new mysqli("localhost","root","","demo_js");
if (!$connect) {
    echo "Koneksi Gagal";
    exit();
}
