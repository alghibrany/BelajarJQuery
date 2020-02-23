<?php
include 'koneksi.php';

$id = $_POST['id'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$tahun_terbit = $_POST['tahun_terbit'];
$result['pesan'] = '';

if ($judul == "") {
    $result['pesan'] = 'Judul Harus Diisi';
} elseif ($pengarang == "") {
    $result['pesan'] = 'Pengarang harus diisi';
} elseif ($tahun_terbit == "") {
    $result['pesan'] = 'Tahun_terbit tidak boleh kosong';
} else {
    $queryResult = $connect->query("UPDATE tb_buku SET judul='" . $judul . "',
    pengarang='" . $pengarang . "',tahun_terbit='" . $tahun_terbit . "' where id='" . $id . "'");

    if ($queryResult) {
        $result['pesan'] = 'Data berhasil di ubah';
    } else {
        $result['pesan'] = 'Data Gagal di ubah';
    }
}

echo json_encode($result);
