<?php
$adminPage = '../dashboard.php?page=Categories';
include "../utils.php";

if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];

  // check duplicate email
  if (mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kategori WHERE nama = '$nama'"))) {
    setError("Kategori sudah terdaftar.");
    redirect($adminPage);
  }

  // lolos pengecekan
  $result = mysqli_query($conn, "INSERT INTO kategori (nama) VALUES('$nama')");

  if ($result) {
    setSuccess("Data berhasil dimasukkan");
  } else {
    setError("Data gagal dimasukkan");
  }
}

redirect($adminPage);
