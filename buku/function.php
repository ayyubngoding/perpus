<?php
require '../koneksi.php';
function tambah($data){
    global $conn;
    $namabuku=htmlspecialchars($data['namabuku']);
    $penulis=htmlspecialchars($data['pengarang']);
    $penerbit=htmlspecialchars($data['penerbit']);
    $tahunterbit=htmlspecialchars($data['tahunterbit']);
    $stok=htmlspecialchars($data['stok']);

    mysqli_query($conn,"INSERT INTO tbl_buku VALUES ('','$namabuku','$penulis','$penerbit','$tahunterbit','$stok')");
    return mysqli_affected_rows($conn);
}
function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM tbl_buku WHERE id_buku=$id");

    return mysqli_affected_rows($conn);
}
function ubah($id){
    global $conn;
    $id_buku = $id['id_buku'];
    $nama_buku = htmlspecialchars($id['nama_buku']);
    $penulis=htmlspecialchars($id['penulis']);
    $penerbit=htmlspecialchars($id['penerbit']);
    $tahun_terbit=htmlspecialchars($id['tahun_terbit']);
    $stok=htmlspecialchars($id['stok']);


    mysqli_query($conn,"UPDATE tbl_buku SET 
    nama_buku='$nama_buku',
    penulis='$penulis',
    penerbit='$penerbit',
    tahun_terbit='$tahun_terbit',
    stok='$stok'
    WHERE id_buku=$id_buku"
    );
    return mysqli_affected_rows($conn);
}

?>