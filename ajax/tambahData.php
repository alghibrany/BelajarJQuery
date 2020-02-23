<?php

include 'koneksi.php';
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
    $queryResult = $connect->query("insert into tb_buku(judul,pengarang,tahun_terbit)
    values ('" . $judul . "','" . $pengarang . "','" . $tahun_terbit . "')");

    if ($queryResult) {
        $result['pesan'] = 'Data berhasil ditambahkan';
    } else {
        $result['pesan'] = 'Data Gagal di tambah';
    }
}

echo json_encode($result);
