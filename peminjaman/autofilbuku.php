<?php

require '../koneksi.php';
//variabel namaobat yang dikirimkan tambah.php
$kodebuku = $_GET['namabuku'];
// echo $nama;
//mengambil data
$query = mysqli_query(
    $conn,
    "select * from tbl_buku where kode_buku LIKE '" . $kodebuku . "%'"
);
$userid = mysqli_fetch_array($query);
// echo print_r($userid);
$data = [
    // 'nama_obat' => @$userid['namaobat'],
    'nama_buku' => $userid['nama_buku'],
    'id_buku' => $userid['id_buku'],
];

//tampil data
echo json_encode($data);
?>
