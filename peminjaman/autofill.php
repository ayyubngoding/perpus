<?php

require '../koneksi.php';
//variabel namaobat yang dikirimkan tambah.php
$npm = $_GET['nama1'];
// echo $nama;
//mengambil data
$query = mysqli_query(
    $conn,
    "select * from tbl_anggota where npm LIKE '" . $npm . "%'"
);
$userid = mysqli_fetch_array($query);
// echo print_r($userid);
$data = [
    // 'nama_obat' => @$userid['namaobat'],
    'nama_anggota' => $userid['nama_anggota'],
    'id_anggota' => $userid['id_anggota'],
];

//tampil data
echo json_encode($data);
?>
