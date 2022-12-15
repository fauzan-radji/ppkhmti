<?php
$timPage = '../dashboard.php?page=Teams';
include '../utils.php';

if (isset($_POST['submit'])) {
  $foto = uploadFile($_FILES['foto'], $timPage);
  $nama = $_POST['nama'];
  $jabatan = $_POST['jabatan'];
  $twitter = $_POST['twitter'];
  $facebook = $_POST['facebook'];
  $instagram = $_POST['instagram'];
  $linkedin = $_POST['linkedin'];

  $sql = "INSERT INTO tim (nama, jabatan, twitter, facebook, instagram, linkedin, foto) VALUES('$nama', '$jabatan', '$twitter', '$facebook', '$instagram', '$linkedin', '$foto')";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    setSuccess("Data berhasil dimasukkan");
  } else {
    setError("Data gagal dimasukkan");
  }
}
redirect($timPage);
