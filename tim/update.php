<?php
$timPage = '../dashboard.php?page=Teams';
include '../utils.php';

if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $jabatan = $_POST['jabatan'];
  $twitter = $_POST['twitter'];
  $facebook = $_POST['facebook'];
  $instagram = $_POST['instagram'];
  $linkedin = $_POST['linkedin'];

  $foto = mysqli_fetch_assoc(mysqli_query($conn, "SELECT foto FROM tim WHERE id = $id"))['foto'];
  $upload = $_FILES['foto'];
  if (
    $foto !== $upload['name'] &&
    (strlen($upload['name']) > 0)
  ) {
    if (file_exists("uploads/$foto")) unlink("uploads/$foto");
    $foto = uploadFile($upload, '../index.php?page=Teams');
  }

  $sql = "UPDATE tim SET nama = '$nama', jabatan = '$jabatan', twitter = '$twitter', facebook = '$facebook', instagram = '$instagram', linkedin = '$linkedin', foto = '$foto' WHERE id = $id";
  $result = mysqli_query($conn, $sql);

  if (mysqli_affected_rows($conn) >= 1) {
    setSuccess("Data berhasil diubah");
  } else {
    setError("Data tidak berubah");
  }
}

redirect($timPage);
