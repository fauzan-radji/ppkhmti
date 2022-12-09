<?php
$adminPage = '../dashboard.php?page=Admins';
include '../utils.php';

if (isset($_GET['id'])) {
  include '../koneksi.php';
  $id = $_GET['id'];

  mysqli_query($conn, "DELETE FROM user WHERE id = $id");

  if (mysqli_affected_rows($conn) >= 1) {
    setSuccess("Data berhasil dihapus");
  } else {
    setError("Data gagal dihapus");
  }
}

redirect($adminPage);
