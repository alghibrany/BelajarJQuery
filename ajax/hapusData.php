<?php
include 'koneksi.php';
$id = $_POST['id'];
$connect->query("DELETE from tb_buku where id=" . $id);
