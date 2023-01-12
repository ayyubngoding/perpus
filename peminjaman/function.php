<?php
require '../koneksi.php';
$pinjam = 1;
$keterangansekarang = 'meminjam';
function tambah($data)
{
    global $pinjam;
    global $keterangansekarang;
    global $conn;
    $kode_pinjam = htmlspecialchars($data['kode_pinjam']);
    $id_anggota = htmlspecialchars($data['id_anggota']);
    $id_buku = htmlspecialchars($data['id_buku']);
    $tgl_pinjam = htmlspecialchars($data['tgl_pinjam']);
    $tgl_kembali = htmlspecialchars($data['tgl_kembali']);

    $cekstockbuku = mysqli_query(
        $conn,
        "SELECT * FROM tbl_buku WHERE id_buku='$id_buku'"
    );

    $ambildatanya = mysqli_fetch_assoc($cekstockbuku);
    // var_dump($cekstockobat);
    $stocksekarang = $ambildatanya['stok'];
    if ($stocksekarang >= $pinjam) {
        $stokbukusekarang = $stocksekarang - $pinjam;
        // query insert data
        $addmasuk = mysqli_query(
            $conn,
            "INSERT INTO tbl_pinjam VALUES ('','$id_anggota','$id_buku','$tgl_pinjam','$tgl_kembali')"
        );
        $updatebuku = mysqli_query(
            $conn,
            "UPDATE tbl_buku SET stok='$stokbukusekarang' WHERE id_buku=$id_buku"
        );
        $updateanggota = mysqli_query(
            $conn,
            "UPDATE tbl_anggota SET keterangan='$keterangansekarang' WHERE id_anggota=$id_anggota"
        );
        if ($addmasuk && $updatebuku && $updateanggota) {
            echo "<script>
        alert('Data Berhasil Disimpan);
        document.location.href='pinjam.php';
        </script>";
        } else {
            echo "<script>
        alert('Gagal');
        document.location.href='pinjam.php';
        </script>";
        }
    } else {
        echo "<script>
        alert('Stock Obat Tidak Cukup');
        document.location.href='pinjam.php';
        </script>";
        die();
    }

    return mysqli_affected_rows($conn);
}

// mysqli_query(
//     $conn,
//     "INSERT INTO tbl_pinjam VALUES ('',' $kode_pinjam','$id_anggota','$id_buku','$tgl_pinjam','$tgl_kembali')"
// );
// return mysqli_affected_rows($conn);
