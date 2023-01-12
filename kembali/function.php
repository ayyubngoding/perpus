<?php
require '../koneksi.php';
$pinjam = 1;
$keterangansekarang = 'Tidak Meminjam';
function tambah($data)
{
    global $pinjam;
    global $keterangansekarang;
    global $conn;
    $nama_anggota = htmlspecialchars($data['nama_anggota']);
    $nama_buku = htmlspecialchars($data['nama_buku']);
    $tgl_pinjam = htmlspecialchars($data['tgl_pinjam']);
    $batas_pinjam = htmlspecialchars($data['batas_pinjam']);
    $tgl_kembali = htmlspecialchars($data['tgl_kembali']);
    $id_pinjam = htmlspecialchars($data['id_pinjam']);
    $id_buku = htmlspecialchars($data['id_buku']);
    $id_anggota = htmlspecialchars($data['id_anggota']);

    $cekstockobat = mysqli_query(
        $conn,
        "SELECT * FROM tbl_buku WHERE id_buku='$id_buku'"
    );
    $ambildatanya = mysqli_fetch_assoc($cekstockobat);

    $stocksekarang = $ambildatanya['stok'];
    $tambahstocksekarangdgnqty = $stocksekarang + $pinjam;
    var_dump($tambahstocksekarangdgnqty);
    die();

    // query insert data
    $addmasuk = mysqli_query(
        $conn,
        "INSERT INTO tbl_kembali VALUES('','$nama_anggota','$nama_buku','$tgl_pinjam','$batas_pinjam','$tgl_kembali','$id_pinjam')"
    );
    $updatebuku = mysqli_query(
        $conn,
        "UPDATE tbl_buku SET stok='$tambahstocksekarangdgnqty' WHERE id_buku='$id_buku'"
    );
    $updateanggota = mysqli_query(
        $conn,
        "UPDATE tbl_anggota SET keterangan='$keterangansekarang' WHERE id_anggota='$id_anggota'"
    );
    $hapuspinjam = mysqli_query(
        $conn,
        "DELETE FROM tbl_pinjam WHERE id_pinjam='$id_pinjam'"
    );

    return mysqli_affected_rows($conn);
}
