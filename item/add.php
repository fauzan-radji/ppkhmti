<?php
include "../koneksi.php";

if(isset($_POST['submit'])){
    include '../utils.php';

    // insert into
    $foto = uploadFile($_FILES['foto_barang']);
    $nama = $_POST['nama_barang'];
    $desc = $_POST['desc_barang'];
    $harga = $_POST['harga_barang'];
    $kategori = $_POST['kategori_barang'];

    $sql = "INSERT INTO items VALUES('','$nama','$desc','$harga','$foto','$kategori')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['flashSucc'] = "Data berhasil dimasukkan";
    }else{
        $_SESSION['flashErr'] = "Data tidak berhasil dimasukkan";
    }

    header('Location: ../index.php?page=Items');
}
?>