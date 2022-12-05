<?php
$itemsPage = '../dashboard.php?page=Items';
include '../utils.php';

if (isset($_POST['submit'])) {
  $foto = $_FILES['foto_barang']['error'] === 0 ? uploadFile($_FILES['foto_barang'], $itemsPage) : '';
  $nama = $_POST['nama_barang'];
  $desc = $_POST['desc_barang'];
  $harga = $_POST['harga_barang'];
  $kategori = $_POST['kategori_barang'];

  $result = mysqli_query($conn, "INSERT INTO items (nama_item, deskripsi_item, harga_item, foto_item, item_kategori) VALUES('$nama','$desc','$harga','$foto','$kategori')");

  if ($result) {
    setSuccess("Data berhasil dimasukkan");
  } else {
    setError("Data gagal dimasukkan");
  }
}

redirect($itemsPage);
