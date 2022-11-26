<?php
$adminPage = '../index.php?page=Admins';

if (isset($_POST['submit'])) {
  include "../koneksi.php";
  include "../utils.php";
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm-password'];

  // check duplicate email
  if (mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'"))) {
    setError("Email sudah terdaftar.");
    redirect($adminPage);
  }

  // check equal password and confirmPassword
  if ($password !== $confirmPassword) {
    setError("Password yang Anda masukkan tidak sesuai dengan konfirmasi password.");
    redirect($adminPage);
  }

  // check password length
  if (strlen($password) < 8) {
    setError("Password harus memiliki setidaknya 8 karakter");
    redirect($adminPage);
  }

  // lolos pengecekan
  $result = mysqli_query($conn, "INSERT INTO user (nama, email, password) VALUES('$nama', '$email', '$password')");

  if ($result) {
    setSuccess("Data berhasil dimasukkan");
  } else {
    setError("Data gagal dimasukkan");
  }
}

redirect($adminPage);
