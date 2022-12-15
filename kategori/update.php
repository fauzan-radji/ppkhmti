<?php
$adminPage = '../dashboard.php?page=Categories';
include '../utils.php';

if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $nama = $_POST['nama'];

  $sql = "UPDATE kategori SET nama = '$nama' WHERE id = $id";
  $result = mysqli_query($conn, $sql);

  if (mysqli_affected_rows($conn) >= 1) {
    setSuccess("Data berhasil diubah");
  } else {
    setError("Data tidak berubah");
  }
}

redirect($adminPage);
