<?php
$adminPage = '../dashboard.php?page=Admins';
include '../utils.php';

if (isset($_POST['submit'])) {
  include '../koneksi.php';

  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];

  $sql = "UPDATE user SET nama = '$nama', email = '$email' WHERE id = $id";
  $result = mysqli_query($conn, $sql);

  if (mysqli_affected_rows($conn) >= 1) {
    setSuccess("Data berhasil diubah");
  } else {
    setError("Data tidak berubah");
  }
}

redirect($adminPage);
