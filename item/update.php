<?php
$itemsPage = '../dashboard.php?page=Items';
include '../utils.php';

if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $nama = $_POST['nama_barang'];
  $desc = $_POST['desc_barang'];
  $harga = $_POST['harga_barang'];
  $kategori = $_POST['kategori_barang'];

  $foto = mysqli_fetch_assoc(mysqli_query($conn, "SELECT foto_item FROM items WHERE id=$id"))['foto_item'];
  $upload = $_FILES['foto_barang'];
  if (
    $foto !== $upload['name'] &&
    (strlen($upload['name']) > 0)
  ) {
    if (file_exists("uploads/$foto")) unlink("uploads/$foto");
    // $foto = uploadFile($upload, '../index.php?page=Items');
    $foto = uploadFile($upload, $itemsPage);
  }

  $sql = "UPDATE items SET nama_item = '$nama', deskripsi_item = '$desc', harga_item = '$harga', foto_item = '$foto', item_kategori=$kategori WHERE id = $id";
  $result = mysqli_query($conn, $sql);

  if (mysqli_affected_rows($conn) >= 1) {
    setSuccess("Data berhasil diubah");
  } else {
    setError("Data tidak berubah");
  }
}

redirect($itemsPage);
