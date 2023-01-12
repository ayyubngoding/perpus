<?php

require '../koneksi.php';
//variabel namaobat yang dikirimkan tambah.php
$kodepinjam = $_GET['id_pinjam'];
// echo $nama;
//mengambil data
$query = mysqli_query(
    $conn,
    "SELECT id_pinjam,tbl_buku.id_buku,tbl_anggota.id_anggota, nama_anggota,nama_buku,tgl_pinjam,tgl_kembali FROM tbl_pinjam INNER JOIN tbl_buku ON tbl_pinjam.id_buku=tbl_buku.id_buku JOIN tbl_anggota ON tbl_pinjam.id_anggota=tbl_anggota.id_anggota where id_pinjam LIKE '" .
        $kodepinjam .
        "%'"
);
$pinjam = mysqli_fetch_array($query);
// echo print_r($pinjam);
$data = [
    // 'nama_obat' => @$pinjam['namaobat'],
    'nama_anggota' => $pinjam['nama_anggota'],
    'nama_buku' => $pinjam['nama_buku'],
    'tgl_pinjam' => $pinjam['tgl_pinjam'],
    'tgl_kembali' => $pinjam['tgl_kembali'],
    'id_buku' => $pinjam['id_buku'],
    'id_anggota' => $pinjam['id_anggota'],
];

//tampil data
echo json_encode($data);
?>
