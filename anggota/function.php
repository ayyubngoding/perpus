<?php
require '../koneksi.php';
function tambah($id)
{
    global $conn;
    $npm = htmlspecialchars($id['npm']);
    $nama_anggota = htmlspecialchars($id['nama_anggota']);
    $alamat = htmlspecialchars($id['alamat']);
    $nohp = htmlspecialchars($id['nohp']);
    $keterangan = htmlspecialchars($id['keterangan']);

    mysqli_query(
        $conn,
        "INSERT INTO tbl_anggota VALUES ('','$npm','$nama_anggota','$alamat','$nohp','$keterangan')"
    );
    return mysqli_affected_rows($conn);
}
function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tbl_anggota WHERE id_anggota=$id");

    return mysqli_affected_rows($conn);
}
function ubah($id)
{
    global $conn;
    $idanggota = $id['id_anggota'];
    $npm = htmlspecialchars($id['npm']);
    $nama_anggota = htmlspecialchars($id['nama_anggota']);
    $alamat = htmlspecialchars($id['alamat']);
    $nohp = htmlspecialchars($id['nohp']);

    mysqli_query(
        $conn,
        "UPDATE tbl_anggota SET 
    npm='$npm',
    nama_anggota='$nama_anggota',
    alamat='$alamat',
    nohp='$nohp'
    WHERE id_anggota=$idanggota"
    );
    return mysqli_affected_rows($conn);
}
?>
