<?php
$adminPage = '../dashboard.php?page=Categories';
include '../utils.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  mysqli_query($conn, "DELETE FROM items WHERE item_kategori = $id");
  mysqli_query($conn, "DELETE FROM kategori WHERE id = $id");

  if (mysqli_affected_rows($conn) >= 1) {
    setSuccess("Data berhasil dihapus");
  } else {
    setError("Data gagal dihapus");
  }
}

redirect($adminPage);
