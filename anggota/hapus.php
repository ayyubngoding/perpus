<?php 

require_once 'function.php';
$id = $_GET['hapus'];
if (hapus($id)>0){
    echo
    "<script> 
    alert('Berhasil');
    document.location.href='anggota.php';
    </script>";
} else{
    echo
    "<script> 
    alert('Gagal');
    document.location.href='anggota.php';
    </script>";
    echo mysqli_error($conn);
}