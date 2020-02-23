<?php
include 'koneksi.php';
$id = $_POST['id'];
$result = array();

$queryResult = $connect->query("select * from tb_buku where id=" . $id);
$fetchData = $queryResult->fetch_assoc();
$result = $fetchData;

echo json_encode($result);
